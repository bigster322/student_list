<?php

require_once 'StudentStruct.php';
require_once __DIR__ . '/../models/validators/StudentValidator.php';
require_once __DIR__ . '/../models/mappers/StudentMapper.php';
require_once __DIR__ . '/../models/DB/DB.php';

class StudentService {

    private $validator;
    private $mapper;

    public function __construct() {
        $this->validator = new StudentValidator();
        $this->mapper = new StudentMapper(new DB());
    }

    public function getStudentFromArr(array $arr) {
        $student = new StudentStruct();
        foreach ($arr as $name => $value) {
            $student->$name = $value;
        }
        return $student;
    }

    public function saveStudentFormArr(array $arr) {
        try {
            unset($_SESSION['reg']);
            $this->validate($arr);
        } catch (Exception $exception) {
            $field = explode(' - ', $exception);
            $field = str_replace('Exception: ', '', $field[0]);

            $_SESSION['reg'] = ['error' => 1, 'message' => $exception->getMessage(), 'field' => lcfirst($field)];
            return false;
        }
        $student = $this->getStudentFromArr($arr);

        if ($this->mapper->save($student)) {
            if (isset($arr['remember_me'])) {
                $student_params = ['remember' => 1, 'email' => $student->email];
                setcookie('student', json_encode($student_params), strtotime('+90 days'), '/');
            }

            return true;
        }

        return false;
    }

    public function signUp(array $arr) {
        try {
            $this->validator->isEmail($arr['email']);

            if ($student = $this->mapper->get($arr['email'], $arr['password'])) {
                $student_params = ['remember' => 1, 'email' => $student->email, 'password' => $student->password];
                setcookie('student', json_encode($student_params), strtotime('+90 days'), '/');

                return true;
            }

            return false;
        } catch (Exception $exception) {
            echo 'ERROR!!!! - '. $exception->getMessage();
        }
    }


    public function getStudentInfoFromCook() {
        if (isset($_COOKIE['student'])) {
            $arr = json_decode($_COOKIE['student'], true);
            return $arr;
        }

        return false;
    }

    public function getFullStudentInfo($email, $password) {
        try {
            $this->validator->isEmail($email);

            if ($student = $this->mapper->get($email, $password)) {
                $student_params = ['remember' => 1, 'email' => $student->email, 'password' => $student->password];
                setcookie('student', json_encode($student_params), strtotime('+90 days'), '/');

                return $student;
            }

            return false;
        } catch (Exception $exception) {
            echo 'ERROR!!!! - '. $exception->getMessage();
        }
    }

    public function updateStudentInfo(array $arr, $email, $password) {
        try {
            unset($_SESSION['reg']);
            $this->validate($arr);
        } catch (Exception $exception) {
            $field = explode(' - ', $exception);
            $field = str_replace('Exception: ', '', $field[0]);

            $_SESSION['reg'] = ['error' => 1, 'message' => $exception->getMessage(), 'field' => lcfirst($field)];

            return false;
        }
        $student = $this->getStudentFromArr($arr);

        if ($this->mapper->update($email, $password, $student)) {
            return true;
        }

        return false;
    }

    public function clearStudentFromCook() {
        setcookie("student", "", time() - 100, '/');

        return true;
    }

    private function validate(array $arr) {
        $this->validator->isName($arr['name']);
        $this->validator->isSurname($arr['surname']);
        $this->validator->isEmail($arr['email']);
        $this->validator->isRegional($arr['regional']);
        $this->validator->isScore($arr['score']);
        $this->validator->isGender($arr['gender']);
        $this->validator->isGroup($arr['group_id']);
        $this->validator->isPassword($arr['password']);

        $this->validator->isDay($arr['day']);
        $this->validator->isMonth($arr['month']);
        $this->validator->isYear($arr['year']);
    }
}
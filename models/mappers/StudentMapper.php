<?php
require_once __DIR__ . '/../StudentStruct.php';
require_once __DIR__ . '/Mapper.php';
require_once __DIR__ . '/../StudentService.php';


class StudentMapper extends Mapper {

    private $like = '';

    public function getAll() {
        $query = "SELECT * FROM ". $this->tableName;
        $res = $this->getByQuery($query);

        return $this->arrToObj($res);
    }


    protected function arrToObj(array $arr) {
        $students = [];
        $service = new StudentService();
        foreach ($arr as $student) {
            $obj = $service->getStudentFromArr($student);
            $students[] = $obj;
        }

        return $students;
    }

    protected function resToObj($res) {
        $service = new StudentService();

        return $service->getStudentFromArr($res);
    }

    protected function tableName() {
        return 'student';
    }

    public function getTotalRecords() {
        $query = 'SELECT count(*) FROM '. $this->tableName .' '. $this->like;
        $res = $this->getByQuery($query);

        return $res[0]['count(*)'];
    }

    public function orderBy($by, $sort) {
        $sort = $sort ? 'ASC' : 'DESC';
        $this->orderBy = "ORDER BY {$by} {$sort}";

        return $this;
    }

    public function getForPage($page, $count) {
        $startPoint = $page == '1' ? 0 : ($page - 1) * $count;

        $query = "SELECT name, surname, email, group_id, score FROM {$this->tableName} {$this->like} {$this->orderBy} LIMIT {$startPoint}, {$count}";
        $res = $this->getByQuery($query);

        return $this->arrToObj($res);
    }

    public function save(StudentStruct $student) {
        $query = "INSERT INTO {$this->tableName} 
                  (name, surname, password, email, score, birthday, regional, gender, group_id)
                  VALUES ('{$student->name}', '{$student->surname}', '{$student->password}', '{$student->email}', {$student->score}, '{$student->birthday}', {$student->regional}, {$student->gender}, '{$student->group_id}')";
        $res = $this->execQuery($query);

        return $res;
    }

    public function get($email, $password) {
        $query = "SELECT * FROM {$this->tableName} WHERE email='{$email}' AND password='{$password}' LIMIT 1";

        if ($res = $this->getByQuery($query)) {
            return $this->resToObj($res[0]);
        }

        return false;
    }

    public function update($email, $password, StudentStruct $student) {
        $query = "UPDATE  {$this->tableName} SET
                    name = '{$student->name}',
                    surname = '{$student->surname}',
                    email = '{$student->email}',
                    password = '{$student->password}',
                    score = {$student->score},
                    group_id = '{$student->group_id}'
                    WHERE email = '{$email}' AND password = '{$password}'";
        if ($res = $this->execQuery($query)) {
            return true;
        }

        return false;
    }

    public function like($like) {
        if ($like)
            $this->like = "WHERE name LIKE '%{$like}%' OR surname LIKE '%{$like}%' OR group_id LIKE '%{$like}%'";

        return $this;
    }

}
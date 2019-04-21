<?php

require_once 'controller.php';
require_once __DIR__ . '/../models/DB/DB.php';
require_once __DIR__ . '/../models/mappers/StudentMapper.php';
require_once __DIR__ . '/../models/StudentService.php';


class AccountController extends Controller {

    public function actionEdit() {
        $this->app->sessionStart();

        $service = new StudentService();
        $localInfo = $service->getStudentInfoFromCook();
        $student = $service->getFullStudentInfo($localInfo['email'], $localInfo['password']);

        if ($_POST) {
            $service->updateStudentInfo($_POST, $localInfo['email'], $localInfo['password']);
        }

        $error = false;

        if (isset($_SESSION['reg'])) {
            if ($_SESSION['reg']['error']) {
                $error = $_SESSION['reg'];
            }
        }


        $this->render('edit', ['error' => $error, 'student' => $student]);
    }

    protected function logined() {
        $service = new StudentService();
        $student = $service->getStudentInfoFromCook();

        if ($student) {
            return true;
        }

        return false;
    }

}
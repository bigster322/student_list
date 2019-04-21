<?php

require_once 'controller.php';
require_once __DIR__ . '/../models/DB/DB.php';
require_once __DIR__ . '/../models/mappers/StudentMapper.php';
require_once __DIR__ . '/../models/validators/StudentValidator.php';
require_once __DIR__ . '/../models/StudentService.php';

class SignController extends Controller {

    public function actionReg() {
        $this->app->sessionStart();
        $service = new StudentService();

        if($_POST) {
            $_POST['birthday'] = $_POST['year'] .'-'. $_POST['month'] .'-'. $_POST['day'];
            if ($service->saveStudentFormArr($_POST)) {
                $this->redirectToMain();
            }
            $this->redirectBack();
        }
    }

    public function actionSignup() {
        $service = new StudentService();

        if ($_POST) {
            if ($service->signUp($_POST)) {
                $this->redirectToMain();
            }
        }
        $this->redirectToMain();
    }

    public function actionLogout() {
        $service = new StudentService();
        $service->clearStudentFromCook();

        $this->redirectToMain();

    }

}
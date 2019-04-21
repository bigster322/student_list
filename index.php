<?php

require __DIR__ . '/Controllers/IndexController.php';
require __DIR__ . '/Controllers/SignController.php';
require __DIR__ . '/Controllers/AccountController.php';
require_once __DIR__ . '/Models/StudentService.php';


class FrontController {


    private  $controllerPos;
    private  $actionPos;

    public $currentController;
    public $currentAction;
    public $URIParts;
    public $currentUrl;
    public $rootUrl;
    public $rootFold;

    public function __construct() {
        $this->getRootFold();

        $index = $this->getPositionOfRootFold();
        $this->getPosOfContAndAct($index);

        $this->getRoute();
        $this->currentController = $this->getController();
        $this->currentAction = $this->getAction();
    }

    public function getRoute() {
        $uri = $_SERVER['REQUEST_URI'];

        if ($pos = stripos($uri, '?')) {
            $uri = mb_strimwidth($uri, 0, $pos);
        }
        $this->currentUrl = $uri;

        $parts = explode('/', $uri);
        $this->rootUrl = $this->getRootUrl($parts);
        $this->URIParts = $parts;
    }

    public function getController() {
        return
            (isset($this->URIParts[$this->controllerPos]) && $this->URIParts[$this->controllerPos] !== '') ?
                ucfirst($this->URIParts[$this->controllerPos]) .'Controller' :
                'IndexController';
    }

    public function getAction() {
        return
            (isset($this->URIParts[$this->actionPos]) && $this->URIParts[$this->actionPos] !== '')
            ? 'action'. $this->URIParts[$this->actionPos] :
            'ActionIndex';
    }

    private function getRootUrl(array $arrOfUrl) {
        $url = '';
        foreach ($arrOfUrl as $part) {
            $url .= $part . '/';

            if ($part == $this->rootFold) break;
        }
        return $url;
    }

    private function getRootFold() {
        $arr = explode('\\', __DIR__);
        $this->rootFold = end($arr);
    }

    private function getPositionOfRootFold() {
        $arr = explode('/', $_SERVER['REQUEST_URI']);
        $index = array_search($this->rootFold, $arr);

        return $index;
    }

    private function getPosOfContAndAct($index) {
        $this->controllerPos = $index + 1;
        $this->actionPos = $index + 2;
    }
}

class App {

    public $currentUrl;
    public $rootUrl;
    public $redirectUrl;
    public $logined;

    public function __construct($currentUrl, $rootUrl) {
        $this->currentUrl = $currentUrl;
        $this->rootUrl = $rootUrl;
        $this->redirectUrl = $_SERVER['HTTP_REFERER'] ?? $this->rootUrl;

        $stud = new StudentService();
        $this->logined = $stud->getStudentInfoFromCook();
    }

    public function sessionStart() {
        session_start();
    }
}



$frontController = new FrontController();
$app = new App($frontController->currentUrl, $frontController->rootUrl);
$currentAction = $frontController->currentAction;

$controller = new $frontController->currentController($app);
$controller->$currentAction();

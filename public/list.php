<?php

require __DIR__ . '/../bootstrap.php';

$posts = $postService->getAll();

$controller = new FrontController();

$route = $controller->getRoute();

$controllerStr = ucfirst($route) .'Controller';

//var_dump($posts);

$list = new $controllerStr($route, $posts);

$tt = 'test';
$list->$tt();

//require __DIR__ . "/../view/{$route}.php";


//class FrontController {
//
//    private static $routes = [
//        'index' => 'index',
//        'list' => 'list',
//    ];
//
//    public function getRoute() {
//        $parts = explode('/', $_SERVER['REQUEST_URI']);
//        $lastPath = array_pop ($parts);
//
//        if (isset(self::$routes[$lastPath])) {
//            return self::$routes[$lastPath];
//        }
//
//        return '404';
//    }
//}

//class Controller {
//
//    protected function render($fileName, $data = []) {
//        require __DIR__ . "/../view/test/{$fileName}.php";
//    }
//
//}

//class ListController extends Controller {
//
//    public function __construct($route, $data = []) {
//        $this->render($route, $data);
//    }
//
//    public function test() {
//        echo 'test';
//    }
//
//}
<?php

abstract class Controller {

    protected $app;

    public function __construct(App $app) {
        $this->app = $app;

        if (!$this->logined()) $this->redirectToMain();
    }

    protected function render($fileName, $data = []) {
        $app = $this->app;
        require __DIR__ . "/../view/layout/main.php";
    }

    protected function redirectToMain() {
        header("Location: {$this->app->rootUrl}");
    }

    protected function redirectBack() {
        header("Location: {$this->app->redirectUrl}");
    }

    //This function must be override
    protected function logined() {
        return true;
    }

    public function __call($name, $arguments) {
        $this->redirectToMain();
    }

}

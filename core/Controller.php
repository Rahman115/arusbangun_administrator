<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/layout/main.php';
    }

    protected function redirect($url) {
        header("Location: /" . ltrim($url, '/'));
        exit;
    }
}

<?php

class HomeController extends BaseController {
    public function index() {
        // Lógica del controlador
        return $this->view('home.php');
    }
}

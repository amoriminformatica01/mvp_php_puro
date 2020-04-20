<?php

class loginController extends Controller {
    private $model;
	
	public function __construct() {
		$this->model = $this->model('usuario');
    }
    
    public function index() {
		$dados =  $_POST ? (object) $_POST : json_decode(file_get_contents("php://input"));
		echo json_encode($this->model->login($dados)[0]);
	}
}
<?php

class usuarioController extends Controller {
	private $model;
	
	public function __construct() {
		$this->model = $this->model('usuario');
	}

    public function index() {

		$data = $this->model->getAll();

		echo json_encode($data);
	}
	
	public function store()
	{
		$dados =  $_POST ? (object) $_POST : json_decode(file_get_contents("php://input"));
		
		// $login  = $_POST['login'];
		// $senha = $_POST['senha'];
		// $ativo = $_POST['ativo'] ? $_POST['ativo'] : "";
		// $nome = $_POST['nome'];
		// echo $name;
		$this->model->store($dados);
		// $this->redirect('mahasiswa');
	}
}
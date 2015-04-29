<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$this->load->model('usuario');
		$this->load->model('disciplina');
		log_message('debug', 'Entrou no controler inicio');
	}
	public function index()
	{
		log_message('debug', 'Entrou na funçao login');
		$usuario = $_POST['nome'];
		$senha = $_POST['senha'];
		echo $retorno = $this->usuario->getUsuario($usuario, $senha);
		log_message('debug', 'testando - ' . $retorno);


	}

	public function dropdown_disciplina(){
		log_message('debug', 'entrou na funçao dropdown_disciplina');
		$data = $this->disciplina->getDisciplina();
		foreach ($data as $key) {
			$dados[] = array(
					'id' => $key->id,
					'descricao' => $key->descricao
				);
		}

		header('Content-type: application/json');
		echo json_encode($dados);
		
	}

	public function dropdown_serie(){
		$materia = $_POST['materia'];

		$data = $this->disciplina->getSerie($materia);
		foreach ($data as $key) {
			$dados[] = array(
					'id' => $key->id,
					'descricao' => $key->descricao
				);
		}

		header('Content-type: application/json');
		echo json_encode($dados);
	}

	public function dropdown_turma(){
		$turma = $_POST['turma'];

		$data = $this->disciplina->getTurma($turma);
		foreach ($data as $key) {
			$dados[] = array(
					'id' => $key->id,
					'descricao' => $key->descricao
				);
		}

		header('Content-type: application/json');
		echo json_encode($dados);
	}
}

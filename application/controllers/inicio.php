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
		$this->load->model('alunos');
		log_message('debug', 'Entrou no controler inicio');
	}

	public function salvaPresenca(){
		if ($_POST) {
			log_message("debug", "SALVA PRESENCA");
			$retorno = $this->alunos->salvaPresenca($_POST);
			log_message("debug", "SALVA PRESENCA - ". $retorno);
			echo $retorno;
		}
	}

	public function getalunos(){
		$data = $this->alunos->listaAlunos($this->session->userdata('turma'));
		foreach ($data as $key) {
			$dados[] = array(
					'nome' => ucwords($key->nome),
					'id' => ucwords($key->id),
				);
		}

		header('Content-type: application/json');
		log_message('debug', 'Alunos - '. json_encode($dados));
		echo json_encode($dados);
	}
	
	public function getSessions(){

		$disciplina = $this->disciplina->getDisciplina($this->session->userdata('disciplina'));
		$serie = $this->disciplina->getSerie("",$this->session->userdata('serie'));
		$turma = $this->disciplina->getTurma("",$this->session->userdata('turma'));

		$dados[] = array(
					'disciplina' => $disciplina[0]->descricao,
					'serie' => $serie[0]->descricao,
					'turma' => $turma[0]->descricao,

			);
		header('Content-type: application/json');
		echo json_encode($dados);
	}

	public function salva_sessions(){
		$this->load->library('session');

		$disciplina = $_POST['disciplina'];
		$serie      = $_POST['serie'];
		$turma      = $_POST['turma'];

		$this->session->set_userdata('disciplina', $disciplina);
		$this->session->set_userdata('serie', $serie);
		$this->session->set_userdata('turma', $turma);


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
		$serie = $_POST['serie'];

		$data = $this->disciplina->getTurma($serie);
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

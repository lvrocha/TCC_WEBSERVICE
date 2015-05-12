<? if (! defined('BASEPATH')) exit('No direct script access allowed');

class Disciplina extends CI_Model {

	public function getDisciplina($id=''){

		log_message('debug', 'Entrou na getDisciplinad');

		$query = "select * from disciplina";

		if ($id != '') {
			$query .= " where disciplina.id = {$id}";
		}

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function getTipoAtividade(){
		$query = "select * from tipo_atividade";

		$query = $this->db->query($query);

		if ($query->num_rows()>0) {
			return $query->result();
		}
	}

	public function getSerie($match="", $id=""){

		log_message('debug', 'Entrou na getDisciplinad');

		$query = "";

		$query .= "SELECT serie.id, ";
		$query .= "       serie.descricao ";
		$query .= "FROM   disciplina_serie ";
		$query .= "       JOIN disciplina ";
		$query .= "         ON( disciplina.id = disciplina_serie.id_disciplina ) ";
		$query .= "       JOIN serie ";
		$query .= "         ON( serie.id = disciplina_serie.id_serie ) ";
		if ($match != '') {
			$query .= "WHERE  disciplina.id = {$match} ";
		}elseif ($id != '') {
			$query .= "WHERE  serie.id = {$id} ";
		}

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}

	public function getTurma($match="", $id=""){

		log_message('debug', 'Entrou na getDisciplinad');

		$query = "";

		$query .= "SELECT * ";
		$query .= "FROM   turma ";
		if ($match != '') {
			$query .= "WHERE  id_serie = {$match} ";
		}elseif ($id != '') {
			$query .= "WHERE  turma.id = {$id} ";
		}
		

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}

}
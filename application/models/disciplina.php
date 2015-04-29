<? if (! defined('BASEPATH')) exit('No direct script access allowed');

class Disciplina extends CI_Model {

	public function getDisciplina(){

		log_message('debug', 'Entrou na getDisciplinad');

		$query = "select * from disciplina";

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}

	public function getSerie($match=""){

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
		}

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}

	public function getTurma($match=""){

		log_message('debug', 'Entrou na getDisciplinad');

		$query = "";

		$query .= "SELECT * ";
		$query .= "FROM   turma ";
		if ($match != '') {
			$query .= "WHERE  id_serie = {$match} ";
		}
		

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()>0){
			return $query->result();
		}
	}

}
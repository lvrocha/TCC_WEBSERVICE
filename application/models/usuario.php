<? if (! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model {

	public function getUsuario($login, $senha){

		log_message('debug', 'Entrou na get usuario');

		$query = "select * from usuarios where usuario = '{$login}' and senha = '{$senha}'";

		log_message('debug', 'SQL - '. $query);

		$query = $this->db->query($query);

		if ($query->num_rows()==1){
			return 'ok';
		}else{
			return 'nok';
		}
	}

}
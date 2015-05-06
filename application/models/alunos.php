<? if (! defined('BASEPATH')) exit('No direct script access allowed');

class Alunos extends CI_Model {

	function listaAlunos($turma = ""){
		$sql = "SELECT * FROM `aluno` ";
		if ($turma != "") {
			$sql .= "WHERE `id_turma` = {$turma}";
		}

		$sql = $this->db->query($sql);

		if ($sql->num_rows()>0){
			return $sql->result();
		}
		
	}

	function salvaPresenca($dados=""){
		log_message('debug', 'entrou no model alunos - salvapresenca');
		if ($dados['chk_presenca'] != '') {
			log_message('debug', 'entrou no if'. $dados['chk_presenca']);

			foreach ($dados['chk_presenca'] as $key) {
				$sql = "INSERT INTO `aluno_presente` "
						."(`id_aluno`, `data`, `presente`) "
						."VALUES "
						. "('{$key}','{$dados['datapresenca']}','1')";

				log_message('debug', "SALVA PRESENCA - SQL - ".$sql);

				$sql = $this->db->query($sql);

				if ($sql) {
					$return = 1;
				}else{
					$return = 0;
				}
			}

			return $return;

		}


		/*
		if ($dados != '') {
			$sql = "INSERT INTO `aluno_presente` "
			."(`id_aluno`, `data`, `presente`) "
			."VALUES ";
			foreach ($dados as $key => $value) {
				$sql .= "([value-2],[value-3],[value-4])";
			}
			."([value-2],[value-3],[value-4])";
			$i=0;
			while ($dados[$i] != '') {
				
			}
		}

		*/

		
	}

}
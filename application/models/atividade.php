<? if (! defined('BASEPATH')) exit('No direct script access allowed');

class Atividade extends CI_Model {

	function cadastra_atividade($dados=""){
		if($dados != ''){
			$disciplina = $dados['disciplina'];
			$serie = $dados['serie'];
			$turma = $dados['turma'];
			$tipoatividade = $dados['tipoatividade'];
			$descricao = $dados['descricao'];
			$valor = $dados['valor'];
			
			$sql = "";
			
			$sql .= "INSERT INTO `tcc_diario_escolar`.`atividade` " 
		            ." (`id`, "
		            ." `id_disciplina`, " 
		            ." `id_serie`, " 
		            ." `id_turma`, "
		            ." `id_tipoatividade`, " 
		            ." `descricao`, "
		            ." `valor`) "
					." VALUES      (NULL, " 
		            ." '{$disciplina}', "
		            ." '{$serie}', "
		            ." '{$turma}', "
		            ." '{$tipoatividade}', "
		            ." '{$descricao}', " 
		            ." '{$valor}') ";
			log_message('debug', "MODEL ATIVIDADE - CADASTRA_ATIVIDADE - ". $sql);
			
			$sql - $this->db->query($sql);
			
			if ($sql){
				return true;
			}else{
				return false;
			}
					
		}
	}

}
<?php
require_once './database/database.php';

class DatosNovedad extends Database
{

	public function createNovedadModel($datosModel, $tabla){
		$stmt = Database::getConnection()->prepare("
		INSERT INTO $tabla (Fe_Nov, T_Nov, Dic_Nov, Des_Nov, id_evi, id_em, ID_S) VALUES (:Fe_Nov, :T_Nov, :Dic_Nov, :Des_Nov, :id_evi, :id_em, :ID_S)");
		$stmt->bindParam(":Fe_Nov", $datosModel["Fe_Nov"], PDO::PARAM_STR);
        $stmt->bindParam(":T_Nov", $datosModel["T_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":Dic_Nov", $datosModel["Dic_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":Des_Nov", $datosModel["Des_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":id_evi", $datosModel["id_evi"], PDO::PARAM_STR);
		$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_STR);
		$stmt->bindParam(":ID_S", $datosModel["ID_S"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function updateNovedadModel($datosModel, $tabla){
		$stmt = Database::getConnection()->prepare(
			"UPDATE $tabla set 
			ID_Nov=:ID_Nov, 
			Fe_Nov=:Fe_Nov, 
			T_Nov=:T_Nov, 
			Dic_Nov=:Dic_Nov, 
			Des_Nov=:Des_Nov, 
			id_evi=:id_evi, 
			id_em=:id_em, 
			ID_S=:ID_S

			 WHERE ID_Nov = :ID_Nov");
		$stmt->bindParam(":ID_Nov", $datosModel["ID_Nov"], PDO::PARAM_INT);
		$stmt->bindParam(":Fe_Nov", $datosModel["Fe_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":T_Nov", $datosModel["T_Nov"], PDO::PARAM_INT);
		$stmt->bindParam(":Dic_Nov", $datosModel["Dic_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":Des_Nov", $datosModel["Des_Nov"], PDO::PARAM_STR);
		$stmt->bindParam(":id_evi", $datosModel["id_evi"], PDO::PARAM_INT);
		$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
		$stmt->bindParam(":ID_S", $datosModel["ID_S"], PDO::PARAM_INT);

		if($stmt->execute()){
			return false;
		}else{
			return true;
		}
	}

	public function readNovedadModel($tabla){
		$stmt = Database::getConnection()->prepare("SELECT ID_Nov, Fe_Nov, T_Nov, Dic_Nov, Des_Nov, id_evi, id_em, ID_S FROM $tabla");
		$stmt->execute();

		$novedad = array();

		while ($fila = $stmt->fetch(PDO::FETCH_OBJ)){
			$novedad[] = $fila;
		}
		return $novedad;
	}



	public function deleteNovedadModel($ID_Nov, $tabla){
		$stmt = Database::getConnection()->prepare("DELETE FROM $tabla WHERE ID_Nov = :ID_Nov");
		$stmt->bindParam(":ID_Nov", $ID_Nov, PDO::PARAM_INT);
		if($stmt->execute()){
			echo "Usuario eliminado correctamente";
		}else{
			echo "El Usuario no se pudo eliminar";
		}
	}	
}
?>
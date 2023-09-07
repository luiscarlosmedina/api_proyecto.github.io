<?php
require_once 'database.php';

class DatosNovedad extends Database
{
	//funcion CREATE novedad
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
	//Funcion READ Novedad (general y ampladda por id)
	public function readNovedadModel($id = null) {
		$query = "SELECT * FROM novedad";
	
		if($id !== null) {
			$query = "SELECT 
			n.ID_Nov AS ID_Novedad,
			n.Fe_Nov AS Fecha_Novedad,
			tn.Nombre_Tn AS Tipo_Novedad,
			tn.descrip_Tn AS Descripcion_Tipo,
			n.Dic_Nov AS Diccionario_Novedad,
			n.Des_Nov AS Descripcion_Novedad,
			e.adjunto AS Adjunto_Evidencia,
			CONCAT(em.n_em, ' ', em.a_em) AS Nombre_Completo_Empleado,
			s.Dic_S AS Direccion_Sede
		  FROM novedad AS n
		  JOIN tp_novedad AS tn ON n.T_Nov = tn.T_Nov
		  JOIN evidencia AS e ON n.id_evi = e.id_evi
		  JOIN empleado AS em ON n.id_em = em.id_em
		  JOIN sede AS s ON n.ID_S = s.ID_S
		  WHERE n.ID_Nov =:id;
		  ";
		}
		$stmt = Database::getConnection()->prepare($query);
	
		if ($id !== null) {
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		}
	
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			echo "Hubo un error al obtener las empresas.";
			return array(); // Devuelve un array vacío en caso de error
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
<?php
require_once 'database.php';

class DatosNovedad extends Database
{
	//Funcion CREATE tabla Novedad
	public function createNovedadModel($datosModel){
		$ahora = "CURRENT_TIMESTAMP()";
		$stmt = Database::getConnection()->prepare("INSERT INTO novedad (Fe_Nov, T_Nov, Dic_Nov, Des_Nov, id_evi, id_em, ID_S)
													VALUES ($ahora, :T_Nov, :Dic_Nov, :Des_Nov, :id_evi, :id_em, :ID_S);");
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
	//Funcion CREATE tabla tpNovedad
	public function createTpNovedadModel($datosModel){

		$stmt = Database::getConnection()->prepare("INSERT INTO tp_novedad (Nombre_Tn, descrip_Tn)
													VALUES (:Nombre_Tn, :descrip_Tn);");

		$stmt->bindParam(":Nombre_Tn", $datosModel["Nombre_Tn"], PDO::PARAM_STR);
		$stmt->bindParam(":descrip_Tn", $datosModel["descrip_Tn"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	//Funcion CREATE tabla evidenica
	public function createEvidenciaModel($datosModel){

		$stmt = Database::getConnection()->prepare("INSERT INTO evidencia (adjunto)
													VALUES (:adjunto);");

		$stmt->bindParam(":adjunto", $datosModel["adjunto"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}	
	//Funcion READ tabla Novedad
	public function readNovedadModel($id = null) {
		//Consulta General
		$query = "SELECT 
		n.ID_Nov AS ID_Novedad,
		n.Fe_Nov AS Fecha_Novedad,
		tn.Nombre_Tn AS Tipo_Novedad,
		COALESCE(n.Dic_Nov, s.Dic_S) AS Direccion,
		n.Des_Nov AS Descripcion_Novedad,
		CONCAT(em.n_em, ' ', em.a_em) AS Nombre_Completo_Empleado
	  FROM novedad AS n
	  JOIN empleado AS em ON n.id_em = em.id_em
	  JOIN sede AS s ON n.ID_S = s.ID_S
	  JOIN tp_novedad AS tn ON n.T_Nov = tn.T_Nov 
	  ORDER BY Fecha_Novedad DESC;";
	
		if($id !== null) {
			//Ampliada por id
			$query = "SELECT 
			n.ID_Nov AS ID_Novedad,
			n.Fe_Nov AS Fecha_Novedad,
			tn.Nombre_Tn AS Tipo_Novedad,
			CASE
			  WHEN n.ID_S IS NULL THEN n.Dic_Nov
			  ELSE s.Dic_S
			END AS Direccion,
			n.Des_Nov AS Descripcion_Novedad,
			CONCAT(em.n_em, ' ', em.a_em) AS Nombre_Completo_Empleado
		  FROM novedad AS n
		  JOIN tp_novedad AS tn ON n.T_Nov = tn.T_Nov
		  JOIN empleado AS em ON n.id_em = em.id_em
		  JOIN sede AS s ON n.ID_S = s.ID_S
		  WHERE n.ID_Nov = :id";
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
	//Funcion READ tabla tp_novedad
	public function readTpNovedadModel(){
		$stmt = Database::getConnection()->prepare(
			"SELECT T_Nov, Nombre_Tn AS Tipo_Novedad, descrip_Tn AS descripcion FROM tp_novedad;"
		);
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			return true;
		}
	}
	//Funcion READ tabla evidencia
	public function readEvidenciaModel(){
		$stmt = Database::getConnection()->prepare(
			"SELECT id_evi, adjunto FROM evidencia;"
		);
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			return true;
		}
	}
	//Funcion READ tabla empresa obtener id
	public function readNovedadEmpresaModel(){
		$stmt = Database::getConnection()->prepare(
			"SELECT `id_e`, `Nom_E` FROM `empresa` WHERE Est_E != 2;"
		);
	
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			return true;
		}
	}

	//Funcion READ tabla sede por id empresa
	public function readNovedadSedeModel($id){
		$stmt = Database::getConnection()->prepare(
			"SELECT
			sede.ID_S,
			sede.Dic_S
		FROM
			sede
		INNER JOIN empresa ON sede.id_e = empresa.id_e
		WHERE
			empresa.id_e = '$id' AND sede.est_sed = 0;"
		);
	
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			return true;
		}
	}

	//Funcion READ tabla empleado para novedad
	public function readNovedadEmpleadoModel(){
		$stmt = Database::getConnection()->prepare(
			"SELECT `id_em`, CONCAT(n_em, ' ', a_em) AS Nombre_Completo_Empleado FROM `empleado` WHERE estado = 0;"
		);
	
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			return true;
		}
	}
	
	//Funcion UPDATE tabla Novedad
	public function updateNovedadModel($datosModel){
		$stmt = Database::getConnection()->prepare(
			"UPDATE novedad set 
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
	//Funcion UPDATE tabla tp_novedad
	public function updateTpNovedadModel($datosModel){
		$stmt = Database::getConnection()->prepare(
			"UPDATE tp_novedad SET Nombre_Tn = :Nombre_Tn, descrip_Tn = :descrip_Tn WHERE T_Nov = :T_Nov;");

		$stmt->bindParam(":T_Nov", $datosModel["T_Nov"], PDO::PARAM_INT);
		$stmt->bindParam(":Nombre_Tn", $datosModel["Nombre_Tn"], PDO::PARAM_STR);
		$stmt->bindParam(":descrip_Tn", $datosModel["descrip_Tn"], PDO::PARAM_STR);

		if($stmt->execute()){
			return false;
		}else{
			return true;
		}
	}
	//Funcion UPDATE tabla evidencia
	public function updateEvidenciaModel($datosModel){
		$stmt = Database::getConnection()->prepare(
			"UPDATE evidencia SET adjunto = :adjunto WHERE id_evi = :id_evi;");

		$stmt->bindParam(":id_evi", $datosModel["id_evi"], PDO::PARAM_INT);
		$stmt->bindParam(":adjunto", $datosModel["adjunto"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return false;
		}else{
			return true;
		}
	}
}
?>
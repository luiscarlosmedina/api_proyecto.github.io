<?php
require_once 'database.php';

class DatosEmpleado extends Database
{
	
	//---------------------- maximo empleados    ------------------------

	public function createEmpleadoModel($datosModel) {
		$conn = Database::getConnection();
	
		try {
			$conn->beginTransaction();
			$stmt = $conn->prepare("INSERT INTO Empleado (id_doc, documento, n_em, a_em, eml_em, f_em, dir_em, lic_emp, lib_em, tel_em, contrato, barloc_em, id_pens, id_eps, id_arl, id_ces, id_rh, estado) VALUES (:id_doc, :documento, :n_em, :a_em, :eml_em, :f_em, :dir_em, :lic_emp, :lib_em, :tel_em, :contrato, :barloc_em, :id_pens, :id_eps, :id_arl, :id_ces, :id_rh, :estado)");
			$stmt->bindParam(":id_doc", $datosModel["id_doc"], PDO::PARAM_INT);
			$stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_STR);
			$stmt->bindParam(":n_em", $datosModel["n_em"], PDO::PARAM_STR);
			$stmt->bindParam(":a_em", $datosModel["a_em"], PDO::PARAM_STR);
			$stmt->bindParam(":eml_em", $datosModel["eml_em"], PDO::PARAM_STR);
			$stmt->bindParam(":f_em", $datosModel["f_em"], PDO::PARAM_STR);
			$stmt->bindParam(":dir_em", $datosModel["dir_em"], PDO::PARAM_STR);
			$stmt->bindParam(":lic_emp", $datosModel["lic_emp"], PDO::PARAM_STR);
			$stmt->bindParam(":lib_em", $datosModel["lib_em"], PDO::PARAM_STR);
			$stmt->bindParam(":tel_em", $datosModel["tel_em"], PDO::PARAM_STR);
			$stmt->bindParam(":contrato", $datosModel["contrato"], PDO::PARAM_STR);
			$stmt->bindParam(":barloc_em", $datosModel["barloc_em"], PDO::PARAM_STR);
			$stmt->bindParam(":id_pens", $datosModel["id_pens"], PDO::PARAM_INT);
			$stmt->bindParam(":id_eps", $datosModel["id_eps"], PDO::PARAM_INT);
			$stmt->bindParam(":id_arl", $datosModel["id_arl"], PDO::PARAM_INT);
			$stmt->bindParam(":id_ces", $datosModel["id_ces"], PDO::PARAM_INT);
			$stmt->bindParam(":id_rh", $datosModel["id_rh"], PDO::PARAM_INT);
			$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);

			$stmt->execute();

			$idem = $conn->lastInsertId();
			$stmt = $conn->prepare("INSERT INTO contacto_emergencia (n_coe, csag, id_em, t_cem) VALUES (:n_coe, :csag, :id_em, :t_cem)");
			$stmt->bindParam(":n_coe", $datosModel["n_coe"], PDO::PARAM_STR);
			$stmt->bindParam(":csag", $datosModel["csag"], PDO::PARAM_STR);
			$stmt->bindParam(":id_em", $idem, PDO::PARAM_INT);
			$stmt->bindParam(":t_cem", $datosModel["t_cem"], PDO::PARAM_STR);

			$stmt->execute();

			$stmt = $conn->prepare("INSERT INTO login (passw, id_em) VALUES (:passw, :id_em)");
			$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
			$stmt->bindParam(":id_em", $idem, PDO::PARAM_INT);

			$stmt->execute();

			$idlog = $conn->lastInsertId();
			$stmt = $conn->prepare("INSERT INTO user_rol (id_rol, id_log) VALUES (:id_rol, :id_log)");
			$stmt->bindParam(":id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
			$stmt->bindParam(":id_log", $idlog, PDO::PARAM_INT);
	
			$stmt->execute();
			$conn->commit();
	
			return true;
		} catch (PDOException $e) {

			$conn->rollBack();
			echo $e;
			return false;
		}
	}
	
	public function readEmpleadoModel($id = null) {
		$query = "SELECT id_em, documento, n_em, a_em, eml_em, f_em, dir_em, lic_emp, lib_em, tel_em, contrato, barloc_em, u.ID_Doc, td.N_TDoc, u.ID_pens, p.N_pens, u.ID_eps, e.N_eps, u.ID_arl, a.N_arl, u.ID_ces, c.N_ces, u.ID_RH, rh.T_RH, estado FROM empleado u JOIN eps e ON u.ID_eps = e.ID_eps JOIN pensiones p ON u.ID_pens = p.ID_pens JOIN arl a ON u.ID_arl = a.ID_arl JOIN cesantias c ON u.ID_ces = c.ID_ces JOIN tipo_doc td ON u.ID_Doc = td.ID_Doc JOIN rh rh ON u.ID_RH = rh.ID_RH";
	
		if($id !== null) {
			$query .= " WHERE id_em = :id";
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

	public function readeps($id = null){
		$query = "SELECT * FROM eps";

		if($id !== null) {
			$query .= " WHERE ID_eps = :id";
		}
		$stmt = Database::getConnection()->prepare($query);

		if ($id !== null) {
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		}
	
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			return array(); // Devuelve un array vacío en caso de error
		}
	}

	public function readpens($id = null){
		$query = "SELECT * FROM pensiones";

		if($id !== null) {
			$query .= " WHERE ID_pens = :id";
		}
		$stmt = Database::getConnection()->prepare($query);

		if ($id !== null) {
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		}
	
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			return array(); // Devuelve un array vacío en caso de error
		}
	}

	public function readarl($id = null){
		$query = "SELECT * FROM arl";

		if($id !== null) {
			$query .= " WHERE ID_arl = :id";
		}
		$stmt = Database::getConnection()->prepare($query);

		if ($id !== null) {
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		}
	
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			return array(); // Devuelve un array vacío en caso de error
		}
	}

	public function readcesantias($id = null){
		$query = "SELECT * FROM cesantias";

		if($id !== null) {
			$query .= " WHERE ID_ces = :id";
		}
		$stmt = Database::getConnection()->prepare($query);

		if ($id !== null) {
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		}
	
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			return array(); // Devuelve un array vacío en caso de error
		}
	}

	public function updateEmpleadoModel($datosModel, $tabla){
		$stmt = Database::getConnection()->prepare(
			"UPDATE $tabla SET  
			id_em=:id_em, 
			id_doc=:id_doc, 
			documento=:documento, 			
			n_em=:n_em , 
			a_em=:a_em, 
			eml_em=:eml_em, 
			f_em=:f_em, 
			dir_em=:dir_em, 
			lic_emp=:lic_emp, 
			lib_em=:lib_em, 
			tel_em=:tel_em, 
			contrato=:contrato,
			barloc_em=:barloc_em,
			id_pens=:id_pens, 
			id_eps=:id_eps, 
			id_arl=:id_arl, 
			id_ces=:id_ces, 
			id_rh=:id_rh,
			estado=:estado WHERE id_em = :id_em");
			 
		$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
		$stmt->bindParam(":id_doc", $datosModel["id_doc"], PDO::PARAM_INT);
		$stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":n_em", $datosModel["n_em"], PDO::PARAM_STR);
		$stmt->bindParam(":a_em", $datosModel["a_em"], PDO::PARAM_STR);
		$stmt->bindParam(":eml_em", $datosModel["eml_em"], PDO::PARAM_STR);
		$stmt->bindParam(":f_em", $datosModel["f_em"], PDO::PARAM_STR);
		$stmt->bindParam(":dir_em", $datosModel["dir_em"], PDO::PARAM_STR);
		$stmt->bindParam(":lic_emp", $datosModel["lic_emp"], PDO::PARAM_STR);
		$stmt->bindParam(":lib_em", $datosModel["lib_em"], PDO::PARAM_STR);
		$stmt->bindParam(":tel_em", $datosModel["tel_em"], PDO::PARAM_STR);
		$stmt->bindParam(":contrato", $datosModel["contrato"], PDO::PARAM_STR);
		$stmt->bindParam(":barloc_em", $datosModel["barloc_em"], PDO::PARAM_STR);
		$stmt->bindParam(":id_pens", $datosModel["id_pens"], PDO::PARAM_INT);
		$stmt->bindParam(":id_eps", $datosModel["id_eps"], PDO::PARAM_INT);
		$stmt->bindParam(":id_arl", $datosModel["id_arl"], PDO::PARAM_INT);
		$stmt->bindParam(":id_ces", $datosModel["id_ces"], PDO::PARAM_INT);
		$stmt->bindParam(":id_rh", $datosModel["id_rh"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);

		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
		}
	}
	
	public function readContEmgModel($id) {
		$stmt = Database::getConnection()->prepare("SELECT ID_CEm, N_CoE, Csag, T_CEm FROM contacto_emergencia WHERE id_em = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			echo "No se encontraron contactos";
			return array();
		}
	}

	public function createContEmgModel($datosModel) {
		$stmt = Database::getConnection()->prepare("INSERT INTO contacto_emergencia (N_CoE, Csag, id_em, T_CEm) VALUES (:N_CoE, :Csag, :id_em, :T_CEm)");
		$stmt->bindParam(":N_CoE", $datosModel["N_CoE"], PDO::PARAM_STR);
		$stmt->bindParam(":Csag", $datosModel["Csag"], PDO::PARAM_STR);
		$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
		$stmt->bindParam(":T_CEm", $datosModel["T_CEm"], PDO::PARAM_STR);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function updateContEmgModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE contacto_emergencia SET N_CoE = :N_CoE, Csag = :Csag, T_CEm = :T_CEm WHERE ID_CEm = :ID_CEm");
		$stmt->bindParam(":N_CoE", $datosModel["N_CoE"], PDO::PARAM_STR);
		$stmt->bindParam(":Csag", $datosModel["Csag"], PDO::PARAM_STR);
		$stmt->bindParam(":T_CEm", $datosModel["T_CEm"], PDO::PARAM_STR);
		$stmt->bindParam(":ID_CEm", $datosModel["ID_CEm"], PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	//---------------------- max empleados    ------------------------
	
	//---------------------- min empleados    ------------------------

    public function readminEmpleadoModel($tabla){
		$stmt = Database::getConnection()->prepare("SELECT id_em, documento, n_em, a_em, eml_em, tel_em, estado FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_em", $id_em);
		$stmt->bindColumn("documento", $documento);
		$stmt->bindColumn("n_em", $n_em);
		$stmt->bindColumn("a_em", $a_em);
		$stmt->bindColumn("eml_em", $eml_em);
		$stmt->bindColumn("tel_em", $tel_em);
		$stmt->bindColumn("estado", $estado);

		$usuarios = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){

			$user = array();


			$user["id_em"] = utf8_encode($id_em);
			$user["documento"] = utf8_encode($documento);	
			$user["n_em"] = utf8_encode($n_em);
			$user["a_em"] = utf8_encode($a_em);
			$user["eml_em"] = utf8_encode($eml_em);
			$user["tel_em"] = utf8_encode($tel_em);
			$user["estado"] = utf8_encode($estado);
			array_push($usuarios, $user);
		}
		return $usuarios;
	}

	
	//---------------------- min empleados    ------------------------

	
}
?>
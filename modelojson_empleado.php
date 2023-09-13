<?php
require_once 'database.php';

class DatosEmpleado extends Database
{
	
	//---------------------- max empleados    ------------------------

	public function createEmpleadoModel($datosModel, $tabla, $tabla2){
		$stmt = Database::getConnection()->prepare("
		INSERT INTO $tabla ( id_doc, documento, n_em, a_em, eml_em, f_em, dir_em, lic_emp, lib_em, tel_em, contrato, barloc_em, id_pens, id_eps, id_arl, id_ces, id_rh, id_rol, estado) VALUES (:id_doc, :documento, :n_em, :a_em, :eml_em, :f_em, :dir_em, :lic_emp, :lib_em, :tel_em, :contrato, :barloc_em, :id_pens, :id_eps, :id_arl, :id_ces, :id_rh, :id_rol, :estado); 
		INSERT INTO $tabla2 (passw, id_em) VALUES (:passw, LAST_INSERT_ID())");

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
		$stmt->bindParam(":id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function readEmpleadoModel($tabla){
		$stmt = Database::getConnection()->prepare("SELECT id_em, documento, n_em, a_em, eml_em, f_em, dir_em, lic_emp, lib_em, tel_em, contrato, barloc_em, id_doc, id_pens, id_eps, id_arl, id_ces, id_rh, id_rol, estado FROM $tabla");
		
		$stmt->execute();

		$stmt->bindColumn("id_em", $id_em);
		$stmt->bindColumn("documento", $documento);	
		$stmt->bindColumn("n_em", $n_em);
		$stmt->bindColumn("a_em", $a_em);
		$stmt->bindColumn("eml_em", $eml_em);
		$stmt->bindColumn("f_em", $f_em);
		$stmt->bindColumn("dir_em", $dir_em);
		$stmt->bindColumn("lic_emp", $lic_emp);
		$stmt->bindColumn("lib_em", $lib_em);
		$stmt->bindColumn("tel_em", $tel_em);
		$stmt->bindColumn("contrato", $contrato);
		$stmt->bindColumn("barloc_em", $barloc_em);
		$stmt->bindColumn("id_doc", $id_doc);
		$stmt->bindColumn("id_pens", $id_pens);
		$stmt->bindColumn("id_eps", $id_eps);
		$stmt->bindColumn("id_arl", $id_arl);
		$stmt->bindColumn("id_ces", $id_ces);
		$stmt->bindColumn("id_rh", $id_rh);
		$stmt->bindColumn("id_rol", $id_rol);
		$stmt->bindColumn("estado", $estado);

		
		$usuarios = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){

			$user = array();

			$user["id_em"] = utf8_encode($id_em);
			$user["documento"] = utf8_encode($documento);
			$user["n_em"] = utf8_encode($n_em);
			$user["a_em"] = utf8_encode($a_em);
			$user["eml_em"] = utf8_encode($eml_em);
			$user["f_em"] = utf8_encode($f_em);
			$user["dir_em"] = utf8_encode($dir_em);
			$user["lic_emp"] = utf8_encode($lic_emp);
			$user["lib_em"] = utf8_encode($lib_em);
			$user["tel_em"] = utf8_encode($tel_em);
			$user["contrato"] = utf8_encode($contrato);
			$user["barloc_em"] = utf8_encode($barloc_em);
			$user["id_doc"] = utf8_encode($id_doc);
			$user["id_pens"] = utf8_encode($id_pens);
			$user["id_eps"] = utf8_encode($id_eps);
			$user["id_arl"] = utf8_encode($id_arl);
			$user["id_ces"] = utf8_encode($id_ces);
			$user["id_rh"] = utf8_encode($id_rh);
			$user["id_rol"] = utf8_encode($id_rol);
			$user["estado"] = utf8_encode($estado);	

			array_push($usuarios, $user);
		}
		return $usuarios;
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
			id_rol=:id_rol,
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
		$stmt->bindParam(":id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);

		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
		}
	}
	
	
	

	public function deleteEmpleadoModel($id_em, $tabla){
		$stmt = Database::getConnection()->prepare("DELETE FROM $tabla WHERE id_em = :id_em");
		$stmt->bindParam(":id_em", $id_em, PDO::PARAM_INT);
		if($stmt->execute()){
			echo "Usuario eliminado correctamente";
		}else{
			echo "El Usuario no se pudo eliminar";
		}
	}
	
	//---------------------- max empleados    ------------------------
	
	//---------------------- min empleados    ------------------------

    public function readminEmpleadoModel($tabla){
		$stmt = Database::getConnection()->prepare("SELECT id_em, documento, id_doc, n_em, a_em, eml_em, tel_em FROM $tabla");
		$stmt->execute();

		$stmt->bindColumn("id_em", $id_em);
		$stmt->bindColumn("id_doc", $id_doc);
		$stmt->bindColumn("documento", $documento);
		$stmt->bindColumn("n_em", $n_em);
		$stmt->bindColumn("a_em", $a_em);
		$stmt->bindColumn("eml_em", $eml_em);
		$stmt->bindColumn("tel_em", $tel_em);

		$usuarios = array();

		while ($fila = $stmt->fetch(PDO::FETCH_BOUND)){

			$user = array();


			$user["id_em"] = utf8_encode($id_em);
			$user["id_doc"] = utf8_encode($id_doc);
			$user["documento"] = utf8_encode($documento);	
			$user["n_em"] = utf8_encode($n_em);
			$user["a_em"] = utf8_encode($a_em);
			$user["eml_em"] = utf8_encode($eml_em);
			$user["tel_em"] = utf8_encode($tel_em);
			array_push($usuarios, $user);
		}
		return $usuarios;
	}

	
	//---------------------- min empleados    ------------------------

	
}
?>
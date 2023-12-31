<?php
require_once 'database.php';

class DatosEmpleado extends Database
{

//  ------------------------ Start modeljson employee module --------------------------

  // ---------------------- Create employe -------------------------
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
  // ---------------------- Create employe -------------------------

  // ---------------------- Contact emergency ----------------------
	public function createContEmgModel($datosModel) {
		$stmt = Database::getConnection()->prepare("INSERT INTO contacto_emergencia (n_coe, csag, id_em, t_cem) VALUES (:n_coe, :csag, :id_em, :t_cem)");
		$stmt->bindParam(":n_coe", $datosModel["n_coe"], PDO::PARAM_STR);
		$stmt->bindParam(":csag", $datosModel["csag"], PDO::PARAM_STR);
		$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
		$stmt->bindParam(":t_cem", $datosModel["t_cem"], PDO::PARAM_STR);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function readContEmgModel($id) {
		$stmt = Database::getConnection()->prepare("SELECT id_cem, n_coe, csag, t_cem FROM contacto_emergencia WHERE id_em = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}else{
			echo "No se encontraron contactos";
			return array();
		}
	}

	public function updateContEmgModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE contacto_emergencia SET n_coe = :n_coe, csag = :csag, t_cem = :t_cem WHERE id_cem = :id_cem");
		$stmt->bindParam(":n_coe", $datosModel["n_coe"], PDO::PARAM_STR);
		$stmt->bindParam(":csag", $datosModel["csag"], PDO::PARAM_STR);
		$stmt->bindParam(":t_cem", $datosModel["t_cem"], PDO::PARAM_STR);
		$stmt->bindParam(":id_cem", $datosModel["id_cem"], PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function deleteContEmgModel($id) {
		$stmt = Database::getConnection()->prepare("DELETE FROM contacto_emergencia WHERE id_cem = :id_cem");
		$stmt->bindParam(":id_cem", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		} else {
			return false;
		}
	}

  // ---------------------- Contact emergency ----------------------


  // ------------------------ Update employe -----------------------

  public function updateInfoPrinModel($datosModel, $tabla)
  {
	  $stmt = Database::getConnection()->prepare(
		  "UPDATE $tabla SET  
		  id_doc=:id_doc, 
		  documento=:documento, 			
		  n_em=:n_em , 
		  a_em=:a_em, 
		  eml_em=:eml_em, 
		  dir_em=:dir_em, 
		  lic_emp=:lic_emp, 
		  lib_em=:lib_em, 
		  tel_em=:tel_em, 
		  barloc_em=:barloc_em,
		  id_rh=:id_rh,
		  contrato=:contrato, 
		  id_pens=:id_pens, 
		  id_eps=:id_eps, 
		  id_arl=:id_arl, 
		  id_ces=:id_ces
		  WHERE id_em = :id_em"
	  );
  
	  $stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
	  $stmt->bindParam(":id_doc", $datosModel["id_doc"], PDO::PARAM_INT);
	  $stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_STR);
	  $stmt->bindParam(":n_em", $datosModel["n_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":a_em", $datosModel["a_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":eml_em", $datosModel["eml_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":dir_em", $datosModel["dir_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":lic_emp", $datosModel["lic_emp"], PDO::PARAM_STR);
	  $stmt->bindParam(":lib_em", $datosModel["lib_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":tel_em", $datosModel["tel_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":barloc_em", $datosModel["barloc_em"], PDO::PARAM_STR);
	  $stmt->bindParam(":id_rh", $datosModel["id_rh"], PDO::PARAM_INT);
	  $stmt->bindParam(":contrato", $datosModel["contrato"], PDO::PARAM_STR);
	  $stmt->bindParam(":id_pens", $datosModel["id_pens"], PDO::PARAM_INT);
	  $stmt->bindParam(":id_eps", $datosModel["id_eps"], PDO::PARAM_INT);
	  $stmt->bindParam(":id_arl", $datosModel["id_arl"], PDO::PARAM_INT);
	  $stmt->bindParam(":id_ces", $datosModel["id_ces"], PDO::PARAM_INT);

	  if ($stmt->execute()) {
		  return true;
	  } else {
		  throw new Exception("No se pudo hacer la Actualización");
	  }
	  
  }

  public function updateEstadoEmpModel($datosModel, $tabla)
  {
	  $stmt = Database::getConnection()->prepare(
		  "UPDATE $tabla SET 
		  estado=:estado
		  WHERE id_em = :id_em"
	  );
  
	  $stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
	  $stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);

	  if ($stmt->execute()) {
		  return true;
	  } else {
		  throw new Exception("No se pudo hacer la Actualización");
	  }
	  
  }
  
		public function updatePerfilModel($datosModel, $tabla){
			$stmt = Database::getConnection()->prepare(
				"UPDATE $tabla SET		
				n_em=:n_em, 
				a_em=:a_em, 
				eml_em=:eml_em, 
				dir_em=:dir_em, 
				lic_emp=:lic_emp, 
				tel_em=:tel_em, 
				barloc_em=:barloc_em
				WHERE id_em = :id_em");
	
			$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
			$stmt->bindParam(":n_em", $datosModel["n_em"], PDO::PARAM_STR);
			$stmt->bindParam(":a_em", $datosModel["a_em"], PDO::PARAM_STR);
			$stmt->bindParam(":eml_em", $datosModel["eml_em"], PDO::PARAM_STR);
			$stmt->bindParam(":dir_em", $datosModel["dir_em"], PDO::PARAM_STR);
			$stmt->bindParam(":lic_emp", $datosModel["lic_emp"], PDO::PARAM_STR);
			$stmt->bindParam(":tel_em", $datosModel["tel_em"], PDO::PARAM_STR);
			$stmt->bindParam(":barloc_em", $datosModel["barloc_em"], PDO::PARAM_STR);
	
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}


		public function updateRolModel($datosModel) {
			$conn = Database::getConnection();
			try {
				$conn->beginTransaction(); // Inicia la transacción
		
				// Obtener el id_log asociado al id_empleado
				$stmt = $conn->prepare("SELECT id_log FROM login WHERE id_em = :id_em");
				$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
				$stmt->execute();
		
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
				if (is_array($row) && isset($row['id_log'])) {
					$id_log = $row['id_log'];
		
					// Actualizar el id_rol en la tabla user_rol
					$stmt = $conn->prepare("UPDATE user_rol SET id_rol = :nuevo_id_rol WHERE id_log = :id_log");
					$stmt->bindParam(":nuevo_id_rol", $datosModel["id_rol"], PDO::PARAM_INT);
					$stmt->bindParam(":id_log", $id_log, PDO::PARAM_INT);
					$stmt->execute();
		
					$conn->commit(); // Confirma la transacción
		
					return true;
				} else {
					$conn->rollBack(); // Deshace la transacción en caso de error
					return false; // No se encontró un id_log válido
				}
			} catch (PDOException $e) {
				$conn->rollBack(); // Deshace la transacción en caso de error
				echo $e->getMessage(); // Muestra el mensaje de error específico
				return false;
			}
		}
		
  // ------------------------ Update employe ------------------------

  // ------------------------ Read employes -------------------------

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
			echo "Hubo un error al obtener las empleados.";
			return array(); 
		}
	}

	public function readEmpleadoOneModel($id = null) {
		$query = "SELECT id_em, n_em, a_em, eml_em, id_rh, id_doc, documento, tel_em,
		barloc_em, dir_em, lib_em, lic_emp, contrato, id_eps, estado, id_ces, id_pens, id_arl FROM empleado";

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
			echo "Hubo un error al obtener los empleados.";
			return array(); 
		}
	}

	public function readEmpleadoestadoModel($id = null) {
		$query = "SELECT id_em, estado FROM empleado";

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
			echo "Hubo un error al obtener los empleados.";
			return array(); 
		}
	}


	public function readPerfilModel($id = null) {
		$query = "SELECT id_em, n_em, a_em, eml_em, dir_em, lic_emp, tel_em, barloc_em FROM empleado";

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


	public function readEmpleadorolModel($id_em) {
		$conn = Database::getConnection();
		try {
			// Obtener el id_rol asociado al id_empleado
			$stmt = $conn->prepare("SELECT id_rol FROM user_rol WHERE id_log IN (SELECT id_log FROM login WHERE id_em = :id_em)");
			$stmt->bindParam(":id_em", $id_em, PDO::PARAM_INT);
			$stmt->execute();
	
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
			if (is_array($row) && isset($row['id_rol'])) {
				$id_rol = $row['id_rol'];
				return $id_rol;
			} else {
				return false; // No se encontró un id_rol válido
			}
		} catch (PDOException $e) {
			echo $e->getMessage(); // Mostrar el mensaje de error específico
			return false;
		}
	}
  // ------------------------ Read employes -------------------------


// ------------------------ Checker unique------------------------

public function readverificarEmpleadoModel($tipoDocumento, $numeroDocumento) {
    $query = "SELECT * FROM empleado WHERE id_doc = :id_doc AND documento = :documento";
    $stmt = Database::getConnection()->prepare($query);
    $stmt->bindParam(":id_doc", $tipoDocumento, PDO::PARAM_INT);
    $stmt->bindParam(":documento", $numeroDocumento, PDO::PARAM_STR);

    try {
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return empty($result); 
        } else {
            return true; 
        }
    } catch (PDOException $e) {
        return true; 
    }
}


public function readveriemlEmpleadoModel($Email){
    $query = "SELECT * FROM empleado WHERE eml_em = :eml_em ";
    $stmt = Database::getConnection()->prepare($query);

    $stmt->bindParam(":eml_em", $Email, PDO::PARAM_STR);

    try {
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return empty($result); 
        } else {
            return true; 
        }
    } catch (PDOException $e) {
        return true; 
    }
}



public function readveritemlEmpleadoModel($telefono){
    $query = "SELECT * FROM contacto_emergencia WHERE t_cem = :t_cem ";
    $stmt = Database::getConnection()->prepare($query);

    $stmt->bindParam(":t_cem", $telefono, PDO::PARAM_STR);

    try {
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return empty($result); 
        } else {
            return true; 
        }
    } catch (PDOException $e) {
        return true; 
    }
}

public function readveritemlEmpleadoaggModel($telefono){
    $query = "SELECT * FROM empleado WHERE tel_em = :tel_em ";
    $stmt = Database::getConnection()->prepare($query);

    $stmt->bindParam(":tel_em", $telefono, PDO::PARAM_STR);

    try {
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return empty($result); 
        } else {
            return true; 
        }
    } catch (PDOException $e) {
        return true; 
    }
}


// ------------------------ Checker unique------------------------


// ------------------------ Selectors ------------------------

// Lee y retorna los roles disponibles.
public function readTprolModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_rol, N_rol AS Tipo_rol FROM rol;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de RH disponibles.
public function readTprhModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_rh, T_RH AS Tipo_rh FROM rh;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de documento disponibles.
public function readTpdocuModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_Doc, N_TDoc AS Nombre_documento FROM tipo_doc;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de EPS disponibles.
public function readTpepsModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_eps, N_eps AS Nombre_eps FROM eps;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de CES disponibles.
public function readTpcesModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_ces, N_ces AS Nombre_ces FROM cesantias;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de ARL disponibles.
public function readTparlModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_arl, N_arl AS Nombre_arl FROM arl;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// Lee y retorna los tipos de pensiones disponibles.
public function readTppensModel(){
	$stmt = Database::getConnection()->prepare(
		"SELECT ID_pens, N_pens AS Nombre_pens FROM pensiones;"
	);
	if($stmt->execute()){
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		return true;
	}
}

// ------------------------ Selectors ------------------------

}
?>	
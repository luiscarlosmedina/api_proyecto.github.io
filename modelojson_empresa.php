<?php
require_once 'database.php';

class DatosEmpresa extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------
	public function createFastEmpresaModel($datosModel) {
		$conn = Database::getConnection();
        try {
            $conn->beginTransaction();

            // Insertar en la tabla "empresa"
            $stmt = $conn->prepare("INSERT INTO empresa (Nit_E, Nom_E, Eml_E, Est_E, Fh_Afi, fechaFinalizacion, COD_SE, COD_AE) VALUES (:Nit_E, :Nom_E, :Eml_E, :Est_E, :Fh_Afi, :fechaFinalizacion, :COD_SE, :COD_AE)");
            $stmt->bindParam(":Nit_E", $datosModel["Nit_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Nom_E", $datosModel["Nom_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Eml_E", $datosModel["Eml_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Est_E", $datosModel["Est_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Fh_Afi", $datosModel["Fh_Afi"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaFinalizacion", $datosModel["fechaFinalizacion"], PDO::PARAM_STR);
            $stmt->bindParam(":COD_SE", $datosModel["COD_SE"], PDO::PARAM_STR);
            $stmt->bindParam(":COD_AE", $datosModel["COD_AE"], PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el último ID insertado en "empresa"
            $idEmpresa = $conn->lastInsertId();

            // Insertar sedes

            $stmt = $conn->prepare("INSERT INTO sede (Dic_S, Sec_V, est_sed, id_e) VALUES (:Dic_S, :Sec_V, '0', :id_e)");
            $stmt->bindParam(":Dic_S", $datosModel["Dic_S"], PDO::PARAM_STR);
            $stmt->bindParam(":Sec_V", $datosModel["Sec_V"], PDO::PARAM_INT);
            $stmt->bindParam(":id_e", $idEmpresa, PDO::PARAM_INT);
            $stmt->execute();

            // Obtener el último ID insertado en "sede"
            $idSede = $conn->lastInsertId();

            // Insertar encargados para esta sede

            $stmt = $conn->prepare("INSERT INTO encargado (N_En, tel1) VALUES (:N_En, :tel1)");
        	$stmt->bindParam(":N_En", $datosModel["N_En"], PDO::PARAM_STR);
            $stmt->bindParam(":tel1", $datosModel["tel1"], PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el último ID insertado en "encargado"
            $idEncargado = $conn->lastInsertId();

            // Insertar en la tabla "encargado_estado"
            $stmt = $conn->prepare("INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (:ID_En, :ID_S, '0')");
            $stmt->bindParam(":ID_En", $idEncargado, PDO::PARAM_INT);
            $stmt->bindParam(":ID_S", $idSede, PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (PDOException $e) {
            // En caso de error, deshacer la transacción
            $conn->rollBack();
			return false;
		}
	}
    public function createEmpresaModel($datosModel) {
		$conn = Database::getConnection();
        try {
            $conn->beginTransaction();

            // Insertar en la tabla "empresa"
            $stmt = $conn->prepare("INSERT INTO empresa (Nit_E, Nom_E, Eml_E, Nom_Rl, ID_Doc, CC_Rl, telefonoGeneral, Val_E, Est_E, Fh_Afi, fechaFinalizacion, COD_SE, COD_AE) VALUES (:Nit_E, :Nom_E, :Eml_E, :Nom_Rl, :ID_Doc, :CC_Rl, :telefonoGeneral, :Val_E, :Est_E, :Fh_Afi, :fechaFinalizacion, :COD_SE, :COD_AE)");
            $stmt->bindParam(":Nit_E", $datosModel["Nit_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Nom_E", $datosModel["Nom_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Eml_E", $datosModel["Eml_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Nom_Rl", $datosModel["Nom_Rl"], PDO::PARAM_STR);
            $stmt->bindParam(":ID_Doc", $datosModel["ID_Doc"], PDO::PARAM_INT);
            $stmt->bindParam(":CC_Rl", $datosModel["CC_Rl"], PDO::PARAM_STR);
            $stmt->bindParam(":telefonoGeneral", $datosModel["telefonoGeneral"], PDO::PARAM_STR);
            $stmt->bindParam(":Val_E", $datosModel["Val_E"], PDO::PARAM_INT);
            $stmt->bindParam(":Est_E", $datosModel["Est_E"], PDO::PARAM_STR);
            $stmt->bindParam(":Fh_Afi", $datosModel["Fh_Afi"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaFinalizacion", $datosModel["fechaFinalizacion"], PDO::PARAM_STR);
            $stmt->bindParam(":COD_SE", $datosModel["COD_SE"], PDO::PARAM_STR);
            $stmt->bindParam(":COD_AE", $datosModel["COD_AE"], PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el último ID insertado en "empresa"
            $idEmpresa = $conn->lastInsertId();

            // Insertar sedes
            foreach ($datosModel["sedes"] as $sede) {
                $stmt = $conn->prepare("INSERT INTO sede (Dic_S, Sec_V, est_sed, id_e) VALUES (:Dic_S, :Sec_V, '0', :id_e)");
                $stmt->bindParam(":Dic_S", $sede["Dic_S"], PDO::PARAM_STR);
                $stmt->bindParam(":Sec_V", $sede["Sec_V"], PDO::PARAM_INT);
                $stmt->bindParam(":id_e", $idEmpresa, PDO::PARAM_INT);
                $stmt->execute();

                // Obtener el último ID insertado en "sede"
                $idSede = $conn->lastInsertId();

                // Insertar encargados para esta sede
                foreach ($sede["encargados"] as $encargado) {
                    $stmt = $conn->prepare("INSERT INTO encargado (N_En, tel1, tel2, tel3) VALUES (:N_En, :tel1, :tel2, :tel3)");
                    $stmt->bindParam(":N_En", $encargado["N_En"], PDO::PARAM_STR);
                    $stmt->bindParam(":tel1", $encargado["tel1"], PDO::PARAM_STR);
                    $stmt->bindParam(":tel2", $encargado["tel2"], PDO::PARAM_STR);
                    $stmt->bindParam(":tel3", $encargado["tel3"], PDO::PARAM_STR);
                    $stmt->execute();

                    // Obtener el último ID insertado en "encargado"
                    $idEncargado = $conn->lastInsertId();

                    // Insertar en la tabla "encargado_estado"
                    $stmt = $conn->prepare("INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (:ID_En, :ID_S, :Est_en)");
                    $stmt->bindParam(":ID_En", $idEncargado, PDO::PARAM_INT);
                    $stmt->bindParam(":ID_S", $idSede, PDO::PARAM_INT);
                    $stmt->bindParam(":Est_en", $encargado["Est_en"], PDO::PARAM_STR);
                    $stmt->execute();
                }
            }

            $conn->commit();
            return true;
        } catch (PDOException $e) {
            // En caso de error, deshacer la transacción
            $conn->rollBack();
            return false;
        }
    }	

	public function createSedeModel($datosModel) {
		$conn = Database::getConnection();
	
		try {
			$conn->beginTransaction();
	
			// Insertar en la tabla "sede"
			$stmt = $conn->prepare("INSERT INTO sede (Dic_S, Sec_V, est_sed, id_e) VALUES (:Dic_S, :Sec_V, '0', :id_e)");
			$stmt->bindParam(":Dic_S", $datosModel["Dic_S"], PDO::PARAM_STR);
			$stmt->bindParam(":Sec_V", $datosModel["Sec_V"], PDO::PARAM_INT);
			$stmt->bindParam(":id_e", $datosModel["id_e"], PDO::PARAM_INT);
			$stmt->execute();
	
			// Obtener el último ID insertado en "sede"
			$idse = $conn->lastInsertId();
	
			// Insertar en la tabla "encargado"
			$stmt = $conn->prepare("INSERT INTO encargado (N_En, tel1, tel2, tel3) VALUES (:N_En, :tel1, :tel2, :tel3)");
			$stmt->bindParam(":N_En", $datosModel["N_En"], PDO::PARAM_STR);
			$stmt->bindParam(":tel1", $datosModel["tel1"], PDO::PARAM_STR);
			$stmt->bindParam(":tel2", $datosModel["tel2"], PDO::PARAM_STR);
			$stmt->bindParam(":tel3", $datosModel["tel3"], PDO::PARAM_STR);
			$stmt->execute();
	
			// Obtener el último ID insertado en "encargado"
			$iden = $conn->lastInsertId();
	
			// Insertar en la tabla "encargado_estado"
			$stmt = $conn->prepare("INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (:ID_En, :ID_S, :Est_en)");
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":ID_S", $idse, PDO::PARAM_INT);
			$stmt->bindParam(":Est_en", $datosModel["Est_en"], PDO::PARAM_STR);
			$stmt->execute();

			$conn->commit();
			return true;
		} catch (PDOException $e) {
			// En caso de error, deshacer la transacción
			$conn->rollBack();
			return false;
		}
	}

	public function createEncargadoModel($datosModel){
		$conn = Database::getConnection();

		try {
			$conn->beginTransaction();

			// Insertar en la tabla "encargado"
			$stmt = $conn->prepare("INSERT INTO encargado (N_En, tel1, tel2, tel3) VALUES (:N_En, :tel1, :tel2, :tel3)");
			$stmt->bindParam(":N_En", $datosModel["N_En"], PDO::PARAM_STR);
			$stmt->bindParam(":tel1", $datosModel["tel1"], PDO::PARAM_STR);
			$stmt->bindParam(":tel2", $datosModel["tel2"], PDO::PARAM_STR);
			$stmt->bindParam(":tel3", $datosModel["tel3"], PDO::PARAM_STR);
			$stmt->execute();
	
			// Obtener el último ID insertado en "encargado"
			$iden = $conn->lastInsertId();
	
			// Insertar en la tabla "encargado_estado"
			$stmt = $conn->prepare("INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (:ID_En, :ID_S, :Est_en)");
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":ID_S", $datosModel["ID_S"], PDO::PARAM_INT);
			$stmt->bindParam(":Est_en", $datosModel["Est_en"], PDO::PARAM_STR);
			$stmt->execute();
	
			$conn->commit();
			return true;
		} catch (PDOException $e) {
			// En caso de error, deshacer la transacción
			$conn->rollBack();
			return false;
		}
	}
	
	public function readTdocModel($id = null){
		$query = "SELECT ID_Doc, N_TDoc FROM tipo_doc";
		if($id !== null) {
			$query .= " WHERE ID_Doc = :id ";
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

	public function readEmpresaNitModel($nit) {
		$query = "SELECT id_e FROM empresa WHERE Nit_E = :nit";
		$stmt = Database::getConnection()->prepare($query);
		$stmt->bindParam(":nit", $nit, PDO::PARAM_STR);
		if ($stmt->execute()) {
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} else {
			return array(null); // Devuelve un array vacío en caso de error
		}
	}

	public function readEmpresaModel($id = null) {
		$query = "SELECT em.id_e, em.Nit_E, em.Nom_E, em.Eml_E, em.Nom_Rl, em.ID_Doc, em.CC_Rl, em.telefonoGeneral, em.Val_E, em.Est_E, em.Fh_Afi, em.fechaFinalizacion, em.COD_SE, em.COD_AE FROM empresa AS em";
	
		if($id !== null) {
			$query .= " WHERE em.id_e = :id";
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
	public function readSedeModel($id = null){
		$query = "SELECT ID_S, Dic_S, Sec_V, est_sed, id_e FROM sede";
		
		if ($id !== null) {
			$query .= " WHERE id_e = :id";
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
	public function readPhoneSedeModel($id = null){
		$query = "SELECT en.ID_En, en.N_En, es.Est_en, en.tel1, en.tel2, en.tel3 FROM encargado AS en
		JOIN encargado_estado AS es ON en.ID_En = es.ID_En
		JOIN sede AS s ON es.ID_S = s.ID_S";
		
		if ($id !== null) {
			$query .= " WHERE s.ID_S = :id ";
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
	
	public function updateEmpresaModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE empresa AS em SET em.Nit_E = :Nit_E, em.Nom_E = :Nom_E, em.Eml_E = :Eml_E, em.Nom_Rl = :Nom_Rl, em.ID_Doc = :ID_Doc, em.CC_Rl = :CC_Rl, em.telefonoGeneral = :telefonoGeneral, em.Val_E = :Val_E, em.Est_E = :Est_E, em.Fh_Afi = :Fh_Afi, em.fechaFinalizacion = :fechaFinalizacion, em.COD_SE = :COD_SE, em.COD_AE = :COD_AE WHERE em.id_e = :id_e");

		$stmt->bindParam(":Nit_E", $datosModel["Nit_E"], PDO::PARAM_STR);
		$stmt->bindParam(":Nom_E", $datosModel["Nom_E"], PDO::PARAM_STR);
		$stmt->bindParam(":Eml_E", $datosModel["Eml_E"], PDO::PARAM_STR);
		$stmt->bindParam(":Nom_Rl", $datosModel["Nom_Rl"], PDO::PARAM_STR);
		$stmt->bindParam(":ID_Doc", $datosModel["ID_Doc"], PDO::PARAM_INT);
		$stmt->bindParam(":CC_Rl", $datosModel["CC_Rl"], PDO::PARAM_STR);
		$stmt->bindParam(":telefonoGeneral", $datosModel["telefonoGeneral"], PDO::PARAM_STR);
		$stmt->bindParam(":Val_E", $datosModel["Val_E"], PDO::PARAM_INT);
		$stmt->bindParam(":Est_E", $datosModel["Est_E"], PDO::PARAM_STR);
		$stmt->bindParam(":Fh_Afi", $datosModel["Fh_Afi"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaFinalizacion", $datosModel["fechaFinalizacion"], PDO::PARAM_STR);
		$stmt->bindParam(":COD_SE", $datosModel["COD_SE"], PDO::PARAM_STR);
		$stmt->bindParam(":COD_AE", $datosModel["COD_AE"], PDO::PARAM_STR);
		$stmt->bindParam(":id_e", $datosModel["id_e"], PDO::PARAM_INT);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function updateSedeModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE sede AS se SET se.Dic_S = :Dic_S, se.Sec_V = :Sec_V WHERE se.ID_S = :ID_S");
		
		$stmt->bindParam(":ID_S", $datosModel["ID_S"], PDO::PARAM_INT);
		$stmt->bindParam(":Dic_S", $datosModel["Dic_S"], PDO::PARAM_STR);
		$stmt->bindParam(":Sec_V", $datosModel["Sec_V"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function updateEstSdModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE sede SET est_sed = :est_sed WHERE ID_S = :ID_S");

		$stmt->bindParam(":est_sed", $datosModel["est_sed"], PDO::PARAM_STR);
		$stmt->bindParam(":ID_S", $datosModel["ID_S"], PDO::PARAM_INT);

		if($stmt->execute()){
			return false;
		}else{
			return true;
		}
	}
	public function updateEncargadoModel($datosModel){
		$conn = Database::getConnection();
	
		try {
			// Iniciar una transacción
			$conn->beginTransaction();
	
			// Actualizar el nombre del encargado en la tabla "encargado"
			$stmt1 = $conn->prepare("UPDATE encargado SET N_En = :N_En, tel1 = :tel1, tel2 = :tel2, tel3 =:tel3 WHERE ID_En = :ID_En");
			$stmt1->bindParam(":N_En", $datosModel["N_En"], PDO::PARAM_STR);
			$stmt1->bindParam(":tel1", $datosModel["tel1"], PDO::PARAM_STR);
			$stmt1->bindParam(":tel2", $datosModel["tel2"], PDO::PARAM_STR);
			$stmt1->bindParam(":tel3", $datosModel["tel3"], PDO::PARAM_STR);
			$stmt1->bindParam(":ID_En", $datosModel["ID_En"], PDO::PARAM_INT);
			$stmt1->execute();
	
			// Confirmar la transacción
			$conn->commit();
			return true;
		} catch (PDOException $e) {
			// Si ocurre un error, hacer rollback de la transacción
			$conn->rollback();
			return false;
		}
		$conn = null;
	}	
	public function deleteEncargadoModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE encargado_estado SET Est_en = :Est_en WHERE ID_En = :ID_En");

		$stmt->bindParam(":Est_en", $datosModel["Est_en"], PDO::PARAM_STR);
		$stmt->bindParam(":ID_En", $datosModel["ID_En"], PDO::PARAM_INT);

		if($stmt->execute()){
			return false;
		}else{
			return true;
		}
	}
}
?>
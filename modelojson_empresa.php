<?php
require_once 'database.php';

class DatosEmpresa extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------

	public function createEmpresaModel($datosModel) {
		$stmt = Database::getConnection()->prepare("INSERT INTO empresa (Nit_E, Nom_E, Eml_E, Nom_Rl, ID_Doc, CC_Rl, telefonoGeneral, Val_E, Est_E, Fh_Afi, fechaFinalizacion, COD_SE, COD_AE) VALUES (:Nit_E, :Nom_E, :Eml_E, :Nom_Rl, :ID_Doc, :CC_Rl, :telefonoGeneral, :Val_E, :Est_E, :Fh_Afi, :fechaFinalizacion, :COD_SE, :COD_AE)");

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

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	public function createSedeModel($datosModel) {
		$conn = Database::getConnection();
	
		try {
			$conn->beginTransaction();
	
			// Insertar en la tabla "sede"
			$stmt = $conn->prepare("INSERT INTO sede (Dic_S, Sec_V, id_e) VALUES (:Dic_S, :Sec_V, :id_e)");
			$stmt->bindParam(":Dic_S", $datosModel["Dic_S"], PDO::PARAM_STR);
			$stmt->bindParam(":Sec_V", $datosModel["Sec_V"], PDO::PARAM_INT);
			$stmt->bindParam(":id_e", $datosModel["id_e"], PDO::PARAM_INT);
			$stmt->execute();
	
			// Obtener el último ID insertado en "sede"
			$idse = $conn->lastInsertId();
	
			// Insertar en la tabla "encargado"
			$stmt = $conn->prepare("INSERT INTO encargado (N_En) VALUES (:N_En)");
			$stmt->bindParam(":N_En", $datosModel["N_En"], PDO::PARAM_STR);
			$stmt->execute();
	
			// Obtener el último ID insertado en "encargado"
			$iden = $conn->lastInsertId();
	
			// Insertar en la tabla "encargado_estado"
			$stmt = $conn->prepare("INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (:ID_En, :ID_S, :Est_en)");
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":ID_S", $idse, PDO::PARAM_INT);
			$stmt->bindParam(":Est_en", $datosModel["Est_en"], PDO::PARAM_STR);
			$stmt->execute();
	
			// Insertar en la tabla "telefono_encargado"
			$stmt = $conn->prepare("INSERT INTO telefono_encargado (ID_En, tel) VALUES (:ID_En, :tel)");
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":tel", $datosModel["tel1"], PDO::PARAM_STR);
			$stmt->execute();
	
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":tel", $datosModel["tel2"], PDO::PARAM_STR);
			$stmt->execute();
	
			$stmt->bindParam(":ID_En", $iden, PDO::PARAM_INT);
			$stmt->bindParam(":tel", $datosModel["tel3"], PDO::PARAM_STR);
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
		$stmt = Database::getConnection()->prepare("INSERT INTO encargado (N_En) VALUES (:encargado); INSERT INTO encargado_estado (ID_En, ID_S, Est_en) VALUES (LAST_INSERT_ID(), :sedeId, :encargadoEst)");
		
		$stmt->bindParam(":encargado", $datosModel["encargado"], PDO::PARAM_STR);
		$stmt->bindParam(":sedeId", $datosModel["sedeId"], PDO::PARAM_INT);
		$stmt->bindParam(":encargadoEst", $datosModel["encargadoEst"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function createTelEncargadoIdModel($datosModel){
		$stmt = Database::getConnection()->prepare("INSERT INTO telefono_encargado (ID_En, tel) VALUES (:encargadoId, :encargadoTel)");

		$stmt->bindParam(":encargadoId", $datosModel["encargadoId"], PDO::PARAM_INT);
		$stmt->bindParam(":encargadoTel", $datosModel["encargadoTel"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
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
		$query = "SELECT ID_S, Dic_S, Sec_V, id_e FROM sede";
		
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
		$query = "SELECT en.ID_En, en.N_En, es.Est_en, TEL.tel AS telefono
		FROM encargado AS en
		JOIN (
			SELECT ID_En, GROUP_CONCAT(tel) AS tel
			FROM telefono_encargado
			GROUP BY ID_En
		) AS TEL ON en.ID_En = TEL.ID_En
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
		$stmt = Database::getConnection()->prepare("UPDATE sede AS se SET se.Dic_S = :direccion, se.Sec_V = :area WHERE se.ID_S = :sedeId");
		
		$stmt->bindParam(":sedeId", $datosModel["sedeId"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datosModel["area"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
		}
	}
	public function updateEncargadoModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE encargado SET N_En = :encargado WHERE ID_En = :encargadoId");
		
		$stmt->bindParam(":encargadoId", $datosModel["encargadoId"], PDO::PARAM_INT);
		$stmt->bindParam(":encargado", $datosModel["encargado"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
		}
	}
	public function updateEncargadoEstModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE encargado_estado SET Est_en = :estado WHERE ID_En = :encargadoId");
		
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":encargadoId", $datosModel["encargadoId"], PDO::PARAM_INT);

		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
		}
		
	}

	public function updateEncargadoTelModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE telefono_encargado SET tel = :encargadoTel WHERE ID_En = :encargadoId");
		
		$stmt->bindParam(":encargadoTel", $datosModel["encargadoTel"], PDO::PARAM_STR);
		$stmt->bindParam(":encargadoId", $datosModel["encargadoId"], PDO::PARAM_INT);

		if($stmt->execute()){
			
			return false;
		}else{
			
			return true;
		}
		
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
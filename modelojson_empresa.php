<?php
require_once 'database.php';

class DatosEmpresa extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------

	public function createEmpresaModel($datosModel) {
		$stmt = Database::getConnection()->prepare("INSERT INTO empresa (Nit_E, Nom_E, Eml_E, Nom_Rl, ID_Doc, CC_Rl, telefonoGeneral, Val_E, Est_E, fh_Afi, fechaFinalizacion, COD_SE, COD_AE) VALUES (:nit, :nombre, :correo, :rep, :tp_doc, :repDoc, :telefono, :valor, :estado, :fhInicio, :fhFin, :sector, :actividad)");

		$stmt->bindParam(":nit", $datosModel["nit"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":rep", $datosModel["rep"], PDO::PARAM_STR);
		$stmt->bindParam(":tp_doc", $datosModel["tp_doc"], PDO::PARAM_INT);
		$stmt->bindParam(":repDoc", $datosModel["repDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":valor", $datosModel["valor"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":fhInicio", $datosModel["fhInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fhFin", $datosModel["fhFin"], PDO::PARAM_STR);
		$stmt->bindParam(":sector", $datosModel["sector"], PDO::PARAM_STR);
		$stmt->bindParam(":actividad", $datosModel["actividad"], PDO::PARAM_STR);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	public function createSedeModel($datosModel){
		$stmt = Database::getConnection()->prepare("INSERT INTO sede (Dic_S,Sec_V, id_e) VALUES (:direccion, :area, :idEmpresa)");
		
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datosModel["area"], PDO::PARAM_INT);
		$stmt->bindParam(":idEmpresa", $datosModel["idEmpresa"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			return true;
		}else{
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
		$query = "SELECT em.id_e, em.Nit_E, em.Nom_E, em.Eml_E, em.Nom_Rl, td.N_TDoc, em.CC_Rl, em.telefonoGeneral, em.Val_E, em.Est_E, em.Fh_Afi, em.fechaFinalizacion, em.COD_SE, em.COD_AE 
				  FROM empresa AS em 
				  JOIN tipo_doc td ON em.ID_Doc = td.ID_Doc";
	
		if ($id !== null) {
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
		$Consulta = "SELECT ID_S, dIC_S, Sec_V, id_e FROM sede";
		
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
	public function readPhoneSedeIdModel($id) {
		$stmt = Database::getConnection()->prepare("SELECT en.N_En, TEL.tel FROM `telefono_encargado` AS TEL JOIN encargado AS en ON en.ID_En = TEL.ID_En JOIN encargado_estado AS es ON en.ID_En = es.ID_En JOIN sede AS s ON es.ID_S = s.ID_S WHERE s.ID_S = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			$telefonos = array();
        	while ($registro = $stmt->fetch(PDO::FETCH_OBJ)) {

            	$telefonos[] = $registro;
        	}
        	return $telefonos;
		}else{
			echo "No se encontraron telefonos asociados a esta sede";
		}
	}
	
	public function updateEmpresaModel($datosModel){
		$stmt = Database::getConnection()->prepare("UPDATE empresa AS em SET em.Nit_E = :nit, em.Nom_E = :nombre, em.Eml_E = :correo, em.Nom_Rl = :rep, em.ID_Doc = :tp_doc, em.CC_Rl = :repDoc, em.telefonoGeneral = :telefono, em.Val_E = :valor, em.Est_E = :estado, em.Fh_Afi = :fecha, em.COD_SE = :sector, em.COD_AE = :actividad WHERE em.id_e = :id");

		$stmt->bindParam(":nit", $datosModel["nit"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":rep", $datosModel["rep"], PDO::PARAM_STR);
		$stmt->bindParam(":tp_doc", $datosModel["tp_doc"], PDO::PARAM_INT);
		$stmt->bindParam(":repDoc", $datosModel["repDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":valor", $datosModel["valor"], PDO::PARAM_INT);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":sector", $datosModel["sector"], PDO::PARAM_STR);
		$stmt->bindParam(":actividad", $datosModel["actividad"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			echo "Actualizacion Exitosa";
		}else{
			echo "No se pudo hacer la Actualizacion";
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
}
?>
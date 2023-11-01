<?php
require_once 'database.php';

class DatosLogin extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------
	public function loginModel($datosModel){
		$stmt = Database::getConnection()->prepare('SELECT e.documento, l.passw
		FROM empleado e
		INNER JOIN login l ON e.id_em = l.id_em
		WHERE e.documento = :documento
		  AND l.passw = :passw
		  AND e.estado = 0;');
		
		$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_INT);
		
		if($stmt->execute()){
			$rowCount = $stmt->rowCount(); // Obtenemos el número de filas afectadas
	
			if ($rowCount > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
?>
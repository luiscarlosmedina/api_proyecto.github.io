<?php
require_once 'database.php';

class DatosLogin extends Database
{
	#Metodos
	//----------------------------------------------------------------------------------
	public function loginModel($datosModel) {
		try {
			$conn = Database::getConnection();
			$stmt = $conn->prepare('SELECT e.id_em, e.n_em, r.ID_rol, r.N_rol
				FROM empleado e
				INNER JOIN login l ON e.id_em = l.id_em
				JOIN user_rol ur ON l.ID_Log = ur.ID_Log
				JOIN rol r ON ur.ID_rol = r.ID_rol
				WHERE e.documento = :documento
				AND l.passw = :passw
				AND e.estado = 0');

			$stmt->bindParam(":documento", $datosModel["documento"], PDO::PARAM_INT);
			$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
	
			$stmt->execute();
	
			// Obtener el resultado como un conjunto de datos asociativos
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
			// Verificar si se encontró un usuario válido
			if ($result) {
				return $result;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}
	}
	public function VerifPassModel($datosModel) {
		try {
			$conn = Database::getConnection();
			$stmt = $conn->prepare('SELECT l.id_em
				FROM login l
				WHERE l.id_em = :id_em
				AND l.passw = :passw');

			$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
			$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
	
			$stmt->execute();
	
			// Obtener el resultado como un conjunto de datos asociativos
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
			// Verificar si se encontró un usuario válido
			if ($result) {
				return $result;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			return false;
		}
	}
	public function ChangePassModel($datosModel) {
		try {
			$conn = Database::getConnection();
			$stmt = $conn->prepare('UPDATE login SET passw = :passw WHERE id_em = :id_em');

			$stmt->bindParam(":id_em", $datosModel["id_em"], PDO::PARAM_INT);
			$stmt->bindParam(":passw", $datosModel["passw"], PDO::PARAM_STR);
	
			$result = $stmt->execute();
	
			// Verificar si se encontró un usuario válido
			if ($result) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo $e;
		}
	}
	
}
?>
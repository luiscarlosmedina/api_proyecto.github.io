<?php
require_once 'database.php';

class DatosReporte extends Database
{
    public function repNovModel() {
        $query = "SELECT tn.Nombre_Tn, COUNT(*) AS cantidad FROM novedad n JOIN tp_novedad tn ON n.T_Nov = tn.T_Nov GROUP BY n.T_Nov";
    
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extraer solo los datos y crear un nuevo array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => $result->Nombre_Tn,
                    'value' => $result->cantidad
                );
            }
    
            return $data;
        } catch (PDOException $e) {
            echo "Hubo un error al obtener las empresas: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }

    public function repNovSectorModel() {
        $query = "SELECT s.Sec_V, COUNT(*) AS cantidad
        FROM novedad n
        JOIN tp_novedad tn ON n.T_Nov = tn.T_Nov
        JOIN sede s ON n.ID_S = s.ID_S
        GROUP BY s.Sec_V;
        ";
    
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extraer solo los datos y crear un nuevo array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => 'Sector' .$result->Sec_V,
                    'value' => $result->cantidad
                );
            }
    
            return $data;
        } catch (PDOException $e) {
            echo "Hubo un error al obtener las empresas: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }
}
?>
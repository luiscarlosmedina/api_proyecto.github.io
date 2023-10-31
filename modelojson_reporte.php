<?php
require_once 'database.php';

class DatosReporte extends Database
{
    public function repNovModel($startdate = null, $enddate = null, $tipoNovedad = null) {
        $query = "SELECT tn.Nombre_Tn, COUNT(*) AS cantidad 
                  FROM novedad n 
                  JOIN tp_novedad tn ON n.T_Nov = tn.T_Nov";
    
        $whereClause = ''; // Initialize an empty WHERE clause
    
        if ($startdate !== null && $enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov BETWEEN :startdate AND :enddate";
        } elseif ($startdate !== null) {
            $whereClause = " WHERE n.Fe_Nov >= :startdate";
        } elseif ($enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov <= :enddate";
        }
    
        if ($tipoNovedad !== null) {
            if ($whereClause === '') {
                $whereClause = " WHERE n.T_Nov = :tipoNovedad";
            } else {
                $whereClause .= " AND n.T_Nov = :tipoNovedad";
            }
        }
    
        $query .= $whereClause; // Append the WHERE clause to the main query
    
        $query .= " GROUP BY tn.Nombre_Tn"; // Group by the name of the type of novedad
    
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            if ($startdate !== null) {
                $stmt->bindParam(':startdate', $startdate, PDO::PARAM_STR);
            }
    
            if ($enddate !== null) {
                $stmt->bindParam(':enddate', $enddate, PDO::PARAM_STR);
            }
    
            if ($tipoNovedad !== null) {
                $stmt->bindParam(':tipoNovedad', $tipoNovedad, PDO::PARAM_INT);
            }
    
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extract only the data and create a new array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => $result->Nombre_Tn,
                    'value' => $result->cantidad
                );
            }
    
            return $data;
        } catch (PDOException $e) {
            echo "Hubo un error al obtener los datos: " . $e->getMessage();
            return array(); // Return an empty array in case of an error
        }
    }    
    
    public function repNovSectorModel($startdate = null, $enddate = null, $tipoNovedad = null) {
        $query = "SELECT s.Sec_V, COUNT(*) AS cantidad
        FROM novedad n
        JOIN tp_novedad tn ON n.T_Nov = tn.T_Nov
        JOIN sede s ON n.ID_S = s.ID_S
        ";
        
        $whereClause = ''; // Inicializa una cláusula WHERE vacía
    
        if ($startdate !== null && $enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov BETWEEN :startdate AND :enddate";
        } elseif ($startdate !== null) {
            $whereClause = " WHERE n.Fe_Nov >= :startdate";
        } elseif ($enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov <= :enddate";
        }
    
        if ($tipoNovedad !== null) {
            if ($whereClause === '') {
                $whereClause = " WHERE n.T_Nov = :tipoNovedad";
            } else {
                $whereClause .= " AND n.T_Nov = :tipoNovedad";
            }
        }
    
        $query .= $whereClause; // Agrega la cláusula WHERE a la consulta principal
    
        $query .= " GROUP BY s.Sec_V"; // Agrupa por el nombre del tipo de novedad
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            if ($startdate !== null) {
                $stmt->bindParam(':startdate', $startdate, PDO::PARAM_STR);
            }
            if ($enddate !== null) {
                $stmt->bindParam(':enddate', $enddate, PDO::PARAM_STR);
            }
            if ($tipoNovedad !== null) {
                $stmt->bindParam(':tipoNovedad', $tipoNovedad, PDO::PARAM_INT);
            }
    
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extrae solo los datos y crea un nuevo array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => 'Sector' . $result->Sec_V,
                    'value' => $result->cantidad
                );
            }
    
            return $data;
        } catch (PDOException $e) {
            echo "Hubo un error al obtener las empresas: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }
    
    public function repNovDiaModel($startdate = null, $enddate = null, $tipoNovedad = null) {
        $query = "SELECT
        CASE DAYOFWEEK(n.Fe_Nov)
          WHEN 1 THEN 'Domingo'
          WHEN 2 THEN 'Lunes'
          WHEN 3 THEN 'Martes'
          WHEN 4 THEN 'Miércoles'
          WHEN 5 THEN 'Jueves'
          WHEN 6 THEN 'Viernes'
          WHEN 7 THEN 'Sábado'
        END AS Dia_Semana,
        COUNT(*) AS cantidad
        FROM novedad n
        JOIN tp_novedad tn ON n.T_Nov = tn.T_Nov
        ";

        $whereClause = ''; // Inicializa una cláusula WHERE vacía
            
        if ($startdate !== null && $enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov BETWEEN :startdate AND :enddate";
        } elseif ($startdate !== null) {
            $whereClause = " WHERE n.Fe_Nov >= :startdate";
        } elseif ($enddate !== null) {
            $whereClause = " WHERE n.Fe_Nov <= :enddate";
        }

        if ($tipoNovedad !== null) {
            if ($whereClause === '') {
                $whereClause = " WHERE n.T_Nov = :tipoNovedad";
            } else {
                $whereClause .= " AND n.T_Nov = :tipoNovedad";
            }
        }

        $query .= $whereClause; // Agrega la cláusula WHERE a la consulta principal
        $query .= " GROUP BY Dia_Semana ORDER BY MIN(DAYOFWEEK(Fe_Nov))";
    
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            if ($startdate !== null) {
                $stmt->bindParam(':startdate', $startdate, PDO::PARAM_STR);
            }
            if ($enddate !== null) {
                $stmt->bindParam(':enddate', $enddate, PDO::PARAM_STR);
            }
            if ($tipoNovedad !== null) {
                $stmt->bindParam(':tipoNovedad', $tipoNovedad, PDO::PARAM_INT);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extraer solo los datos y crear un nuevo array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => $result->Dia_Semana,
                    'novedades' => $result->cantidad
                );
            }
    
            return $data;
        } catch (PDOException $e) {
            echo "Hubo un error al obtener las empresas: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }
    public function repNovHoraModel() {
        $query = "SELECT
        CONCAT(LPAD(HOUR(Fe_Nov), 2, '0'), ':00 - ', LPAD(HOUR(Fe_Nov) + 1, 2, '0'), ':00') AS Rango_Hora,
        COUNT(*) AS cantidad
        FROM novedad
        GROUP BY Rango_Hora
        ORDER BY Rango_Hora;";
    
        $stmt = Database::getConnection()->prepare($query);
    
        try {
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            // Extraer solo los datos y crear un nuevo array
            $data = array();
            foreach ($results as $result) {
                $data[] = array(
                    'name' => $result->Rango_Hora,
                    'novedades' => $result->cantidad
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
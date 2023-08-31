<?php
require_once 'controllerjson.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
$apicall = isset($_GET['apicall']) ? $_GET['apicall'] : '';

switch ($apicall) {
    
     // ---------------------- max empleados --------------------------
    
    //https://developersaurios.000webhostapp.com/api.php?apicall=createempleado
    case 'createempleado':
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null) {
          $response = array(
            'error' => true,
            'message' => 'Error en el contenido JSON',
          );
        } else {
          $id_doc = $data['id_doc'];
          $documento = $data['documento'];
          $n_em = $data['n_em'];
          $a_em = $data['a_em'];
          $eml_em = $data['eml_em'];
          $f_em = $data['f_em'];
          $dir_em = $data['dir_em'];
          $lic_emp = $data['lic_emp'];
          $lib_em = $data['lib_em'];
          $tel_em = $data['tel_em'];
          $contrato = $data['contrato'];
          $barloc_em = $data['barloc_em'];
          $id_pens = $data['id_pens'];
          $id_eps = $data['id_eps'];
          $id_arl = $data['id_arl'];
          $id_ces = $data['id_ces'];
          $id_rh = $data['id_rh'];
          $id_rol = $data['id_rol'];
          $estado = $data['estado'];
          $passw = $data['passw'];

		  
          $db = new ControllerJson();
          $result = $db->createempleadoController($id_doc, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $id_rol, $estado, $passw);

          if ($result) {
            $response = array(
              'error' => false,
              'message' => 'Usuario agregado correctamente',
              'contenido' => $db->readempleadoController(),
            );
          } else {
            $response = array(
              'error' => true,
              'message' => 'Ocurrió un error, intenta nuevamente',
            );
          }
        }
      } else {
        $response = array(
          'error' => true,
          'message' => 'Método de solicitud no válido',
        );
      }
      break;
      
    //https://developersaurios.000webhostapp.com/api.php?apicall=updateempleado
    case 'updateempleado':
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null) {
          $response = array(
            'error' => true,
            'message' => 'Error en el contenido JSON',
          );
        } else {
          $id_em = $data['id_em'];
          $documento = $data['documento'];
		      $n_em = $data['n_em'];
          $a_em = $data['a_em'];
          $eml_em = $data['eml_em'];
          $f_em = $data['f_em'];
          $dir_em = $data['dir_em'];
          $lic_emp = $data['lic_emp'];
          $lib_em = $data['lib_em'];
          $tel_em = $data['tel_em'];
          $contrato = $data['contrato'];
          $barloc_em = $data['barloc_em'];
          $id_doc = $data['id_doc'];
		      $id_pens = $data['id_pens'];
		      $id_eps = $data['id_eps'];
		      $id_arl = $data['id_arl'];
		      $id_ces = $data['id_ces'];
		      $id_rh = $data['id_rh'];
		      $id_rol = $data['id_rol'];
          $estado = $data['estado'];

          $db = new ControllerJson();
          $result = $db->updateEmpleadoController($id_em, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_doc, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $id_rol, $estado);
          if ($result) {
            $response = array(
              'error' => false,
              'message' => 'Usuario actualizado correctamente',
              'contenido' => $db->readempleadoController(),
            );
          } else {
            $response = array(
              'error' => true,
              'message' => 'Ocurrio un error al actualizar el usuario',
            );
          }
        }
      } else {
        $response = array(
          'error' => true,
          'message' => 'Método de solicitud no válido',
        );
      }
      break;

    //https://developersaurios.000webhostapp.com/api.php?apicall=readempleado
      case 'readempleado':
      $db = new ControllerJson();
      $response = array(
        'error' => false,
        'message' => 'Solicitud completada correctamente',
        'contenido' => $db->readempleadoController(),
      );
      break;


    //https://developersaurios.000webhostapp.com/api.php?apicall=deleteempleado
    case 'deleteempleado':
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null) {
          $response = array(
            'error' => true,
            'message' => 'Error en el contenido JSON',
          );
        } else {
          $id_em = $data['id_em'];

          $db = new ControllerJson();
          $result = $db->deleteempleadoController($id_em);

          if ($result) {
            $response = array(
              'error' => false,
              'message' => 'Usuario eliminado correctamente',
              'contenido' => $db->readempleadoController(),
            );
          } else {
            $response = array(
              'error' => true,
              'message' => 'Ocurrió un error al eliminar el usuario',
            );
          }
        }
      } else {
        $response = array(
          'error' => true,
          'message' => 'Método de solicitud no válido',
        );
      }
      break;
      
      
    // ---------------------- max empleados --------------------------
      
    // ---------------------- min empleados --------------------------
    
    
    //https://developersaurios.000webhostapp.com/api.php?apicall=readminempleado
      case 'readminempleado':
      $db = new ControllerJson();
      $response = array(
        'error' => false,
        'message' => 'Solicitud completada correctamente',
        'contenido' => $db->readminempleadoController(),
      );
      break;
      
     // ----------------------min empleados --------------------------      
      
      //empresa
      case 'createempresa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $nit = $data['nit'];
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            $rep = $data['rep'];
            $tp_doc = $data['tp_doc'];
            $repDoc = $data['repDoc'];
            $telefono = $data['telefono'];
            $valor = $data['valor'];
            $estado = $data['estado'];
            $fhInicio = $data['fhInicio'];
            $fhFin = $data['fhFin'];
            $sector = $data['sector'];
            $actividad = $data['actividad'];
    
            $db = new ControllerJson();
            $result = $db->createEmpresaController($nit, $nombre, $correo, $rep, $tp_doc, $repDoc, $telefono, $valor, $estado, $fhInicio, $fhFin, $sector, $actividad);
    
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario agregado correctamente',
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error, intenta nuevamente',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
      case 'createsede':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $direccion = $data['direccion'];
            $area = $data['area'];
            $idEmpresa = $data['idEmpresa'];
    
            $db = new ControllerJson();
            $result = $db->createSedeController( $direccion, $area, $idEmpresa);
    
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Sede agregada correctamente'
                
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error, intenta nuevamente',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
      case 'createencargado':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $encargado = $data['encargado'];
            $sedeId = $data['sedeId'];
            $encargadoEst = $data['encargadoEst'];
    
            $db = new ControllerJson();
            $result = $db->createEncargadoController($encargado, $sedeId, $encargadoEst);
    
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'encargado agregado correctamente'
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error, intenta nuevamente',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;

      case 'createencargadotel':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $encargadoId = $data['encargadoId'];
            $encargadoTel = $data['encargadoTel'];
    
            $db = new ControllerJson();
            $result = $db->createTelEncargadoIdController($encargadoId, $encargadoTel);
    
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'telefono agregado correctamente',
                'contenido' => $db->readPhoneSedeIdController($encargadoId),
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error, intenta nuevamente',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
    
      //http://localhost/../api.php?apicall=readusuario
      case 'readempresa':
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readempresa') {
        $db = new ControllerJson();
        $id = $_GET['id'];
      
        if (!empty($id)) {
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEmpresasController($id) ;
          //forma de llamar al api
          //http://localhost/../api.php?apicall=readusuario&id=2
        } else {
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEmpresasController();
          //forma de llamar al api
          //http://localhost/../api.php?apicall=readusuario
        }
      } else {
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
      break;

      case 'readsede':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readsede') {
          $db = new ControllerJson();
          $id = $_GET['id'];
        
          if (!empty($id)) {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readSedeController($id) ;
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readusuario&id=2
          } else {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readSedeController();
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readusuario
          }
        } else {
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
        break;
      case 'readTelSede':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readTelSede') {
          $db = new ControllerJson();
          $id = $_GET['id'];
        
          if (!empty($id)) {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readPhoneSedeController($id) ;
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readusuario&id=2
          } else {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readPhoneSedeController();
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readusuario
          }
        } else {
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
        break;
      //http://localhost/../api.php?apicall=updateusuario + body (Json)
      case 'updateempresa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $id = $data['id'];
            $nit = $data['nit'];
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            $rep = $data['rep'];
            $tp_doc = $data['tp_doc'];
            $repDoc = $data['repDoc'];
            $telefono = $data['telefono'];
            $valor = $data['valor'];
            $estado = $data['estado'];
            $fecha = $data['fecha'];
            $sector = $data['sector'];
            $actividad = $data['actividad'];
    
            $db = new ControllerJson();
            $result = $db->updateEmpresaController($id, $nit, $nombre, $correo, $rep, $tp_doc, $repDoc, $telefono, $valor, $estado, $fecha, $sector, $actividad);
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario actualizado correctamente',
                'contenido' => $db->readEmpresasController(),
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error al actualizar el usuario',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;

      case 'updatesede':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $sedeId = $data['sedeId'];
            $direccion = $data['direccion'];
            $area = $data['area'];
    
            $db = new ControllerJson();
            $result = $db->updateSedeController($sedeId, $direccion, $area);
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario actualizado correctamente',
                'contenido' => $db->readEmpresasController(),
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error al actualizar el usuario',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;

      case 'updateencargado':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $encargadoId = $data['encargadoId'];
            $encargado = $data['encargado'];
            
    
            $db = new ControllerJson();
            $result = $db->updateEncargadoController($encargadoId, $encargado);
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario actualizado correctamente',
                'contenido' => $db->readEmpresasController(),
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error al actualizar el usuario',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
      case 'updateencargadoEst':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $encargadoId = $data['encargadoId'];
            $estado = $data['estado'];
            
    
            $db = new ControllerJson();
            $result = $db->updateEncargadoEstController($encargadoId, $estado);
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario actualizado correctamente',
                'contenido' => $db->readEmpresasController(),
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error al actualizar el usuario',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
        
      case 'updateencargadoTel':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $json = file_get_contents('php://input');
          $data = json_decode($json, true);
    
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $encargadoId = $data['encargadoId'];
            $encargadoTel = $data['encargadoTel'];
            
    
            $db = new ControllerJson();
            $result = $db->updateEncargadoTelController($encargadoId, $encargadoTel);
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Usuario actualizado correctamente'
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Ocurrió un error al actualizar el usuario'
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
      //----------NOVEDAD----------//

//http://localhost/../api.php?apicall=createnoovedad + body (Json)
case 'createnovedad':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $Fe_Nov = $data['Fe_Nov'];
      $T_Nov = $data['T_Nov'];
      $Dic_Nov = $data['Dic_Nov'];
      $Des_Nov = $data['Des_Nov'];
      $id_evi = $data['id_evi'];
      $id_em = $data['id_em'];
      $ID_S = $data['ID_S'];

  
      $db = new ControllerJson();
      $result = $db->createNovedadController($Fe_Nov, $T_Nov, $Dic_Nov, $Des_Nov, $id_evi, $id_em, $ID_S);

      if ($result) {
        $response = array(
          'error' => false,
          'message' => 'Novedad agregada correctamente',
          'contenido' => $db->readNovedadController(),
        );
      } else {
        $response = array(
          'error' => true,
          'message' => 'Ocurrió un error, intenta nuevamente',
        );
      }
    }
  } else {
    $response = array(
      'error' => true,
      'message' => 'Método de solicitud no válido',
    );
  }
  break;

//http://localhost/../api.php?apicall=readnovedad
  case 'readnovedad':
  $db = new ControllerJson();
  $response = array(
    'error' => false,
    'message' => 'Solicitud completada correctamente',
    'contenido' => $db->readNovedadController(),
  );
  break;

//http://localhost/../api.php?apicall=updateusuario + body (Json)
case 'updatenovedad':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $ID_Nov = $data['ID_Nov'];
      $Fe_Nov = $data['Fe_Nov'];
      $T_Nov = $data['T_Nov'];
      $Dic_Nov = $data['Dic_Nov'];
      $Des_Nov = $data['Des_Nov'];
      $id_evi = $data['id_evi'];
      $id_em = $data['id_em'];
      $ID_S = $data['ID_S'];

      $db = new ControllerJson();
      $result = $db->updateNovedadController($ID_Nov, $Fe_Nov, $T_Nov, $Dic_Nov, $Des_Nov, $id_evi, $id_em, $ID_S);

      if ($result == false) {
        $response = array(
          'error' => false,
          'message' => 'Novedad actualizada correctamente',
          'contenido' => $db->readNovedadController(),
        );
      } else {
        $response = array(
          'error' => true,
          'message' => 'Ocurrió un error al actualizar la Novedad',
        );
      }
    }
  } else {
    $response = array(
      'error' => true,
      'message' => 'Método de solicitud no válido',
    );
  }
  break;


//http://localhost/../api.php?apicall=deletenovedad + body (Json)
case 'deletenovedad':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $ID_Nov = $data['ID_Nov'];

      $db = new ControllerJson();
      $result = $db->deleteNovedadController($ID_Nov);

      if ($result) {
        $response = array(
          'error' => false,
          'message' => 'Novedad eliminada correctamente',
          'contenido' => $db->readNovedadController(),
        );
      } else {
        $response = array(
          'error' => true,
          'message' => 'Ocurrió un error al eliminar el usuario',
        );
      }
    }
  } else {
    $response = array(
      'error' => true,
      'message' => 'Método de solicitud no válido',
    );
  }
  break;

    default:
      $response = array(
        'error' => true,
        'message' => 'Llamado Inválido del API',
      );
      break;

      //----------LOGIN----------//
      //http://localhost/../api.php?apicall=createuser + body (Json)

  //http://localhost/../api.php?apicall=login + body (Json)
  case 'login':

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
          if ($data === null) {
            $response = array(
              'error' => true,
              'message' => 'Error en el contenido JSON',
            );
          } else {
            $passw = $data['passw'];
            $documento = $data['documento'];
                  
            $db = new ControllerJson();
            $result = $db->loginController($passw, $documento);
        
            if ($result) {
              $response = array(
                'error' => false,
                'message' => 'Ingreso exitoso al sistema'
              );
            } else {
              $response = array(
                'error' => true,
                'message' => 'Error: Credenciales incorrectas.',
              );
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;  
    }

echo json_encode($response);
?>
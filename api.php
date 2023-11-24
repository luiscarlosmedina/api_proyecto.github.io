<?php
require_once 'controllerjson.php';

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
$apicall = isset($_GET['apicall']) ? $_GET['apicall'] : '';

switch ($apicall) {

//  ------------------------ Start Api employee module --------------------------

  // ---------------------- Create employe -------------------------
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
          $estado = $data['estado'];
          $n_coe = $data['n_coe'];          
          $csag = $data['csag'];
          $t_cem = $data['t_cem'];
          $passw = $data['passw'];
          $id_rol =$data['id_rol'];
		  
          $db = new ControllerJson();
        $result = $db->createempleadoController($id_doc, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $estado , $n_coe, $csag, $t_cem , $passw, $id_rol);

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
  // ---------------------- Create employe -------------------------

  // ---------------------- Contact emergency ----------------------
      case 'createcontemg':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

          $inputJSON = file_get_contents('php://input');
          $inputData = json_decode($inputJSON, true);
          
          if ($inputData !== null) {
              $db = new ControllerJson();
              $result = $db->createContEmgController($inputData);
          
              if ($result) {
                  $response = array(
                      'error' => false,
                      'message' => 'contacto de emergencia agregado con exito',
                  );
              } else {
                  $response = array(
                      'error' => true,
                      'message' => 'Ocurrió un error al agregar el contacto de emergencia',
                  );
              }
          } else {
              $response = array(
                  'error' => true,
                  'message' => 'Error en el contenido JSON',
              );
          }
        } else {
            $response = array(
                'error' => true,
                'message' => 'Método de solicitud no válido',
            );
        }
        break;

      case 'readcontemg':
          if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readcontemg') {
            $db = new ControllerJson();
            $id = $_GET['id'];
            if (!empty($id)) {
              $response['error'] = false;
              $response['message'] = 'Solicitud completada correctamente';
              $response['contenido'] = $db->readContEmgController($id) ;
            } else {
              $response['error'] = true;
              $response['message'] = 'ingrese el id del empleado';
            }
          } else {
            $response['error'] = true;
            $response['message'] = 'Método de solicitud no válido';
          }
          break;      

      case 'updatecontemg':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $inputJSON = file_get_contents('php://input');
          $inputData = json_decode($inputJSON, true);
          
          if ($inputData !== null) {
              $db = new ControllerJson();
              $result = $db->updateContEmgController($inputData);
          
              if ($result) {
                  $response = array(
                      'error' => false,
                      'message' => 'contacto de emergencia actualizado con exito',
                  );
              } else {
                  $response = array(
                      'error' => true,
                      'message' => 'Ocurrió un error al actualizar el contacto de emergencia',
                  );
              }
          } else {
              $response = array(
                  'error' => true,
                  'message' => 'Error en el contenido JSON',
              );
          }
        } else {
            $response = array(
                'error' => true,
                'message' => 'Método de solicitud no válido',
            );
        }
        break;
  // ---------------------- Contact emergency ------------------------

  // ------------------------ Update employe -------------------------
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

 // ------------------------ Update employe -----------------------

// ------------------------ Read employes -------------------------
      case 'readempleado':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readempleado') {
          $db = new ControllerJson();
          $id = $_GET['id'];
        
          if (!empty($id)) {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readEmpleadoController($id) ;
          } else {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readEmpleadoController();
          }
        } else {
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
        break;


      case 'readminempleado':
      $db = new ControllerJson();
      $response = array(
        'error' => false,
        'message' => 'Solicitud completada correctamente',
        'contenido' => $db->readminempleadoController(),
      );
      break;
      
// ------------------------ Read employes ------------------------- 

// ------------------------ Read selectors ------------------------
case 'readtpdocumento':
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $db = new ControllerJson();
      $response['error'] = false;
      $response['message'] = 'Solicitud completada correctamente';
      $response['contenido'] = $db->readTpdocumentoController();
  } else {
      $response['error'] = true;
      $response['message'] = 'Método de solicitud no válido';
  }
  break;

// ------------------------ Read selectors ------------------------

// ------------------------ Checker unique------------------------

case 'readverificarempleado':
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readverificarempleado') {
      $db = new ControllerJson();
      $tipoDocumento = $_GET['id_doc'];
      $numeroDocumento = $_GET['documento'];

      if (!empty($tipoDocumento) && !empty($numeroDocumento)) {
          $empleadoEncontrado = $db->readverificarEmpleadoController($tipoDocumento, $numeroDocumento);

          if ($empleadoEncontrado) {
              error_log('Empleado encontrado en la base de datos');
          } else {
              error_log('Empleado NO encontrado en la base de datos');
          }

          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['encontrado'] = $empleadoEncontrado; 
      }
  } else {
      error_log('Método de solicitud no válido');
      $response['error'] = true;
      $response['message'] = 'Método de solicitud no válido';
  }
  break;

  case 'readveriemlempleado':
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readveriemlempleado') {
        $db = new ControllerJson();
        $Email = $_GET['eml_em'];
  
        if (!empty($Email) ) {
            $EmailEncontrado = $db->readveriemlEmpleadoController($Email);

            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['encontrado'] = $EmailEncontrado; 
        }
    } else {
        error_log('Método de solicitud no válido');
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
    }
    break;
  

    
// ------------------------ Checker unique------------------------


//  ------------------------ End Api module employee  --------------------------

      //empresa
      case 'createfastempresa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Recibe y decodifica los datos JSON de la solicitud
          $inputJSON = file_get_contents('php://input');
          $inputData = json_decode($inputJSON, true);
          
          if ($inputData !== null) {
              $db = new ControllerJson();
              $result = $db->createFastEmpresaController($inputData);
          
              if ($result) {
                  $response = array(
                      'error' => false,
                      'message' => 'Empresa agregada correctamente',
                  );
              } else {
                  $response = array(
                      'error' => true,
                      'message' => 'Ocurrió un error al agregar la empresa',
                  );
              }
          } else {
              $response = array(
                  'error' => true,
                  'message' => 'Error en el contenido JSON',
              );
          }
        } else {
            $response = array(
                'error' => true,
                'message' => 'Método de solicitud no válido',
            );
        }
        break;

      case 'createempresa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Recibe y decodifica los datos JSON de la solicitud
          $inputJSON = file_get_contents('php://input');
          $inputData = json_decode($inputJSON, true);
          
          if ($inputData !== null) {
              $db = new ControllerJson();
              $result = $db->createEmpresaController($inputData);
          
              if ($result) {
                  $response = array(
                      'error' => false,
                      'message' => 'Empresa y datos relacionados agregados correctamente',
                  );
              } else {
                  $response = array(
                      'error' => true,
                      'message' => 'Ocurrió un error al agregar la empresa y datos relacionados',
                  );
              }
          } else {
              $response = array(
                  'error' => true,
                  'message' => 'Error en el contenido JSON',
              );
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
            $Dic_S = $data['Dic_S'];
            $Sec_V = $data['Sec_V'];
            $id_e = $data['id_e'];
    
            $db = new ControllerJson();
            $result = $db->createSedeController( $Dic_S,$Sec_V, $id_e);
    
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
            $ID_S = $data['ID_S'];
            $N_En = $data['N_En'];
            $Est_en = $data['Est_en'];
            $tel1 = $data['tel1'];
            $tel2 = $data['tel2'];
            $tel3 = $data['tel3'];
    
            $db = new ControllerJson();
            $result = $db->createEncargadoController($ID_S, $N_En, $Est_en, $tel1, $tel2, $tel3);
    
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
      //http://localhost/../api.php?apicall=readempresa
      case 'readempresa':
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readempresa') {
        $db = new ControllerJson();
        $id = $_GET['id'];
      
        if (!empty($id)) {
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEmpresasController($id) ;
          //forma de llamar al api
          //http://localhost/../api.php?apicall=readempresa&id=2
        } else {
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEmpresasController();
          //forma de llamar al api
          //http://localhost/../api.php?apicall=readempresa&id
        }
      } else {
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
      break;
      case 'readempresanit':
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readempresanit') {
        $db = new ControllerJson();
        $nit = $_GET['nit'];
      
        if (!empty($nit)) {
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEmpresaNitController($nit) ;
          //forma de llamar al api
          //http://localhost/api_proyecto.github.io/api.php?apicall=readempresanit&nit=123456782
        }
      } else {
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
      break;
      case 'readtdoc':
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readtdoc') {
          $db = new ControllerJson();
          $id = $_GET['id'];
        
          if (!empty($id)) {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readTdocController($id) ;
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readTdoc&id=2
          } else {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readTdocController();
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readTdoc&id
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
            //http://localhost/../api.php?apicall=readsede&id=2
          } else {
            $response['error'] = false;
            $response['message'] = 'Solicitud completada correctamente';
            $response['contenido'] = $db->readSedeController();
            //forma de llamar al api
            //http://localhost/../api.php?apicall=readsede&id
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
            $id_e = $data['id_e'];
            $Nit_E = $data['Nit_E'];
            $Nom_E = $data['Nom_E'];
            $Eml_E = $data['Eml_E'];
            $Nom_Rl = $data['Nom_Rl'];
            $ID_Doc = $data['ID_Doc'];
            $CC_Rl = $data['CC_Rl'];
            $telefonoGeneral = $data['telefonoGeneral'];
            $Val_E = $data['Val_E'];
            $Est_E = $data['Est_E'];
            $Fh_Afi = $data['Fh_Afi'];
            $fechaFinalizacion = $data['fechaFinalizacion'];
            $COD_SE = $data['COD_SE'];
            $COD_AE = $data['COD_AE'];
    
            $db = new ControllerJson();
            $result = $db->updateEmpresaController($id_e, $Nit_E, $Nom_E, $Eml_E, $Nom_Rl, $ID_Doc, $CC_Rl, $telefonoGeneral, $Val_E, $Est_E, $Fh_Afi, $fechaFinalizacion, $COD_SE, $COD_AE);
            if ($result == true) {
              $response['error'] = false;
              $response['message'] = 'Solicitud completada correctamente';         
            } else {
              $response['error'] = true;
              $response['message'] = 'Solicitud fallida';
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
            $ID_S = $data['ID_S'];
            $Dic_S = $data['Dic_S'];
            $Sec_V = $data['Sec_V'];
    
            $db = new ControllerJson();
            $result = $db->updateSedeController($ID_S, $Dic_S, $Sec_V);
            if ($result == true) {
                $response['error'] = false;
                $response['message'] = 'Solicitud completada correctamente';  
            } else {
                $response['error'] = true;
                $response['message'] = 'Solicitud fallida';
            }
          }
        } else {
          $response = array(
            'error' => true,
            'message' => 'Método de solicitud no válido',
          );
        }
        break;
        case 'updateestsd':
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
      
            if ($data === null) {
              $response = array(
                'error' => true,
                'message' => 'Error en el contenido JSON',
              );
            } else {
              $ID_S = $data['ID_S'];
              $est_sed = $data['est_sed'];
  
              $db = new ControllerJson();
              $result = $db->updateEstSdController($est_sed, $ID_S);
              if ($result) {
                $response = array(
                  'error' => false,
                  'message' => 'cambio de estado correctamente'
                );
              } else {
                $response = array(
                  'error' => true,
                  'message' => 'Ocurrió un error al cambiar estado'
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
            $ID_En = $data['ID_En'];
            $N_En = $data['N_En'];
            $tel1 = $data['tel1'];
            $tel2 = $data['tel2'];
            $tel3 = $data['tel3'];
                
            $db = new ControllerJson();
            $result = $db->updateEncargadoController($ID_En,$N_En, $tel1, $tel2, $tel3);
            if ($result == true) {
              $response['error'] = false;
              $response['message'] = 'Solicitud completada correctamente';         
            } else {
              $response['error'] = true;
              $response['message'] = 'Solicitud fallida';
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
        case 'deleteencargado':
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
      
            if ($data === null) {
              $response = array(
                'error' => true,
                'message' => 'Error en el contenido JSON',
              );
            } else {
              $ID_En = $data['ID_En'];
              $Est_en = $data['Est_en'];
  
              $db = new ControllerJson();
              $result = $db->deleteEncargadoController($Est_en, $ID_En);
              if ($result) {
                $response = array(
                  'error' => false,
                  'message' => 'Encargado eliminado correctamente'
                );
              } else {
                $response = array(
                  'error' => true,
                  'message' => 'Ocurrió un error al eliminar el encargado'
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

  // caso CREATE tabla Novedad
    //http:/localhost/.../api.php?apicall=createnovedad + body (Json)
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
              $T_Nov = $data['T_Nov'];
              $Dic_Nov = $data['Dic_Nov'];
              $Des_Nov = $data['Des_Nov'];
              $id_em = $data['id_em'];
              $ID_S = $data['ID_S'];
              $adjuntos = $data['adjuntos'];
  
              // Continuar con el resto de tu código para guardar la información en la base de datos
              $db = new ControllerJson();
              $result = $db->createNovedadController($T_Nov, $Dic_Nov, $Des_Nov, $adjuntos, $id_em, $ID_S);
  
              if ($result) {
                  $response = array(
                      'error' => false,
                      'message' => 'Novedad y evidencias agregadas correctamente',
                  );
              } else {
                  $response = array(
                      'error' => true,
                      'message' => 'Ocurrió un error al guardar la novedad',
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
  // caso CREATE tabla tp_novedad
    //http:/localhost/.../api.php?apicall=createtpnovedad + body (Json)
case 'createtpnovedad':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $Nombre_Tn = $data['Nombre_Tn'];
      $descrip_Tn = $data['descrip_Tn'];

      $db = new ControllerJson();
      $result = $db->createTpNovedadController($Nombre_Tn, $descrip_Tn);

      if ($result) {
        $response = array(
          'error' => false,
          'message' => 'tipo de novedad agregada correctamente'
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

  // caso CREATE tabla evidencia
    //http:/localhost/.../api.php?apicall=createevidencia + body (Json)
case 'createevidencia':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $adjunto = $data['adjunto'];

      $db = new ControllerJson();
      $result = $db->createEvidenciaController($adjunto);

      if ($result) {
        $response = array(
          'error' => false,
          'message' => 'tipo de novedad agregada correctamente',
          'contenido' => $db->readEvidenciaController(),
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

  //caso READ tabla Novedad
case 'readnovedad':
  if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readnovedad') {
    $db = new ControllerJson();
    $id = $_GET['id'];
  
    if (!empty($id)) {
      $response['error'] = false;
      $response['message'] = 'Solicitud completada correctamente';
      $response['contenido'] = $db->readNovedadController($id) ;
      //forma de llamar al api
        //http://localhost/../api.php?apicall=readnovedad&id=1
    } else {
      $response['error'] = false;
      $response['message'] = 'Solicitud completada correctamente';
      $response['contenido'] = $db->readNovedadController();
      //forma de llamar al api
        //http://localhost/../api.php?apicall=readnovedad
    }
  } else {
    $response['error'] = true;
    $response['message'] = 'Método de solicitud no válido';
  }
  break;

  //caso READ tabla tp_novedad
    //http://localhost/../api.php?apicall=readtpnovedad
  case 'readtpnovedad':
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $db = new ControllerJson();

        $response['error'] = false;
        $response['message'] = 'Solicitud completada correctamente';
        $response['contenido'] = $db->readTpNovedadController();
            
    }else{
      $response['error'] = true;
      $response['message'] = 'Método de solicitud no válido';
    }
  break;

  //caso READ tabla evidencia
    //http://localhost/../api.php?apicall=readevidencia
    case 'readevidencia':
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readevidencia') {
        $db = new ControllerJson();
        $id = $_GET['id'];

        $response['error'] = false;
        $response['message'] = 'Solicitud completada correctamente';
        $response['contenido'] = $db->readevidenciaController($id) ;
        //forma de llamar al api
        //http://localhost/../api.php?apicall=readnovedad&id=1
      } else {
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
      break;
  

    //caso READ tabla empresa para obtener id
    //http://localhost/../api.php?apicall=readevidencia
    case 'readnovedadempresa':
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $db = new ControllerJson();
  
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readNovedadEmpresaController();
              
      }else{
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
    break;
    
    // caso READ tabla sede con id empresa
    case 'readnovedadsede':
      if ($_SERVER['REQUEST_METHOD'] === 'GET' && $apicall === 'readnovedadsede') {
        $db = new ControllerJson();
        $id = $_GET['id'];

        $response['error'] = false;
        $response['message'] = 'Solicitud completada correctamente';
        $response['contenido'] = $db->readNovedadSedeController($id) ;
        //forma de llamar al api
        //http://localhost/../api.php?apicall=readnovedad&id=1
      } else {
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
      break;

  //caso READ tabla empleado para novedad
    //http://localhost/../api.php?apicall=readnovedadempleado
    case 'readnovedadempleado':
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $db = new ControllerJson();
  
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readNovedadEmpleadoController();
              
      }else{
        $response['error'] = true;
        $response['message'] = 'Método de solicitud no válido';
      }
    break;

  //caso UPDATE tabla Novedad
    //http://localhost/../api.php?apicall=updatenovedad + body (Json)
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

  case 'updatetpnovedad':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $json = file_get_contents('php://input');
      $data = json_decode($json, true);
  
      if ($data === null) {
        $response = array(
          'error' => true,
          'message' => 'Error en el contenido JSON',
        );
      } else {
        $T_Nov = $data['T_Nov'];
        $Nombre_Tn = $data['Nombre_Tn'];
        $descrip_Tn = $data['descrip_Tn'];
  
        $db = new ControllerJson();
        $result = $db->updateTpNovedadController($T_Nov, $Nombre_Tn, $descrip_Tn);
  
        if ($result == false) {
          $response = array(
            'error' => false,
            'message' => 'Tipo de novedad actualizada correctamente',
          );
        } else {
          $response = array(
            'error' => true,
            'message' => 'Ocurrió un error al actualizar la tipo de novedad',
          );
        }
      }
    }else{
      $response = array(
        'error' => true,
        'message' => 'Método de solicitud no válido',
      );
    }
    break;

  //caso UPDATE tabla evidencia
    //http://localhost/../api.php?apicall=updateevidencia + body (Json)
case 'updateevidencia':
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if ($data === null) {
      $response = array(
        'error' => true,
        'message' => 'Error en el contenido JSON',
      );
    } else {
      $id_evi = $data['id_evi'];
      $adjunto = $data['adjunto'];

      $db = new ControllerJson();
      $result = $db->updateEvidenciaController($id_evi, $adjunto);

      if ($result == false) {
        $response = array(
          'error' => false,
          'message' => 'Tipo de novedad actualizada correctamente',
          'contenido' => $db->readEvidenciaController(),
        );
      } else {
        $response = array(
          'error' => true,
          'message' => 'Ocurrió un error al actualizar la tipo de novedad',
        );
      }
    }
  }else{
    $response = array(
      'error' => true,
      'message' => 'Método de solicitud no válido',
    );
  }
  break;
//---------- FIN NOVEDAD----------//

//----------LOGIN----------//

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
        case 'createevidencia':
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              try {
                  $json = file_get_contents('php://input');
                  $data = json_decode($json, true);
      
                  if ($data === null) {
                      throw new Exception('Error en el contenido JSON');
                  }
      
                  // Verificar si se ha enviado un archivo
                  if (isset($_FILES['adjunto']) && $_FILES['adjunto']['error'] === UPLOAD_ERR_OK) {
                      $adjunto = $_FILES['adjunto'];
      
                      // Ruta donde se guardará el archivo
                      $serverBaseURL = 'http://localhost/api_proyecto.github.io';
                      $uploadDirectory = $serverBaseURL . '/uploads/evidencias/';
                      $uploadPath = $uploadDirectory . basename($adjunto['name']);
      
                      // Mover el archivo al directorio de destino
                      if (move_uploaded_file($adjunto['tmp_name'], $uploadPath)) {
                          $db = new ControllerJson();
                          $result = $db->createEvidenciaController($uploadPath);
      
                          if ($result) {
                              $response = array(
                                  'error' => false,
                                  'message' => 'Evidencia agregada correctamente',
                              );
                          } else {
                              $response = array(
                                  'error' => true,
                                  'message' => 'Ocurrió un error al procesar la evidencia en la base de datos',
                              );
                          }
                      } else {
                          $response = array(
                              'error' => true,
                              'message' => 'Error al mover el archivo al directorio de destino',
                          );
                      }
                  } else {
                      $response = array(
                          'error' => true,
                          'message' => 'No se ha enviado un archivo válido',
                      );
                  }
              } catch (Exception $e) {
                  $response = array(
                      'error' => true,
                      'message' => 'Error: ' . $e->getMessage(),
                  );
              }
          } else {
              $response = array(
                  'error' => true,
                  'message' => 'Método de solicitud no válido',
              );
          }
          break;
      
//----------FIN LOGIN----------// 
//----------REPORTES----------// 
      case 'repnov':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new ControllerJson();
            $tipoNovedad = isset($_GET['tipoNovedad']) ? $_GET['tipoNovedad'] : null;
            $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
            $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

            $data = $db->repNovController($startdate, $enddate, $tipoNovedad);

            // Create a response with the data
            $response = $data;
        } else {
            $response = ['error' => true, 'message' => 'Método de solicitud no válido'];
        }
        break;

      case 'repnovsector':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $db = new ControllerJson();
          $tipoNovedad = isset($_GET['tipoNovedad']) ? $_GET['tipoNovedad'] : null;
          $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
          $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

          $data = $db->repSectorNovController($startdate, $enddate, $tipoNovedad);

          // Crear una respuesta con solo los datos
          $response = $data;
                
        }else{
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
      break;
      case 'repnovdia':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $db = new ControllerJson();
          $tipoNovedad = isset($_GET['tipoNovedad']) ? $_GET['tipoNovedad'] : null;
          $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
          $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

          $data = $db->repNovDiaController($startdate, $enddate, $tipoNovedad);

          // Crear una respuesta con solo los datos
          $response = $data;
                
        }else{
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
      break;
      case 'repnovhora':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $db = new ControllerJson();
          $tipoNovedad = isset($_GET['tipoNovedad']) ? $_GET['tipoNovedad'] : null;
          $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
          $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

          $data = $db->repNovHoraController($startdate, $enddate, $tipoNovedad);

          // Crear una respuesta con solo los datos
          $response = $data;
                
        }else{
          $response['error'] = true;
          $response['message'] = 'Método de solicitud no válido';
        }
      break;
      case 'repempresanov':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new ControllerJson();
            $ltempresa = isset($_GET['ltempresa']) ? $_GET['ltempresa'] : null;
            $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
            $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

            $data = $db->repEmpresaNovController($startdate, $enddate, $ltempresa);

            // Create a response with the data
            $response = $data;
        } else {
            $response = ['error' => true, 'message' => 'Método de solicitud no válido'];
        }
        break;
      case 'repsedenov':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $db = new ControllerJson();
            $ltempresa = isset($_GET['ltempresa']) ? $_GET['ltempresa'] : null;
            $startdate = isset($_GET['startdate']) ? $_GET['startdate'] : null;
            $enddate = isset($_GET['enddate']) ? $_GET['enddate'] : null;

            $data = $db->repSedeNovController($startdate, $enddate, $ltempresa);

            // Create a response with the data
            $response = $data;
        } else {
            $response = ['error' => true, 'message' => 'Método de solicitud no válido'];
        }
        break;
      default:
      $response = array(
        'error' => true,
        'message' => 'Llamado Inválido del API',
      );
      break;      
    }

echo json_encode($response);
?>
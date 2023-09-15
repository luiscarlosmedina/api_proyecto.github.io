<?php
require_once 'controllerjson.php';

header("Access-Control-Allow-Origin: * ");
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
            $Nit_E = $data['Nit_E'];
            $Nom_E = $data['Nom_E'];
            $Eml_E = $data['Eml_E'];
            $Nom_Rl = $data['Nom_Rl'];
            $ID_Doc = $data['ID_Doc'];
            $CC_Rl = $data['CC_Rl'];
            $telefonoGeneral = $data['$telefonoGeneral'];
            $Val_E = $data['Val_E'];
            $Est_E = $data['Est_E'];
            $fh_Afi = $data['fh_Afi'];
            $fechaFinalizacion = $data['fechaFinalizacion'];
            $COD_SE = $data['COD_SE'];
            $COD_AE = $data['COD_AE'];
    
            $db = new ControllerJson();
            $result = $db->createEmpresaController($Nit_E, $Nom_E, $Eml_E, $Nom_Rl, $ID_Doc, $CC_Rl, $telefonoGeneral, $Val_E, $Est_E, $fh_Afi, $fechaFinalizacion, $COD_SE, $COD_AE);
    
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
            $Dic_S = $data['Dic_S'];
            $Sec_V = $data['Sec_V'];
            $id_e = $data['id_e'];
            $N_En = $data['N_En'];
            $Est_en = $data['Est_en'];
            $tel1 = $data['tel1'];
            $tel2 = $data['tel2'];
            $tel3 = $data['tel3'];
    
            $db = new ControllerJson();
            $result = $db->createSedeController( $Dic_S,$Sec_V, $id_e, $N_En, $Est_en, $tel1, $tel2, $tel3);
    
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
          'message' => 'tipo de novedad agregada correctamente',
          'contenido' => $db->readTpNovdadController(),
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
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $db = new ControllerJson();
  
          $response['error'] = false;
          $response['message'] = 'Solicitud completada correctamente';
          $response['contenido'] = $db->readEvidenciaController();
              
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
            'contenido' => $db->readTpNovedadController(),
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
//----------FIN LOGIN----------//  
      default:
      $response = array(
        'error' => true,
        'message' => 'Llamado Inválido del API',
      );
      break;      
    }

echo json_encode($response);
?>
<?php
require_once 'modelojson_empleado.php';
require_once 'modelojson_empresa.php';
require_once 'modelojson_novedad.php';
require_once 'modelojson_login.php';
/**
 *
 */
class ControllerJson
{
	// ------------------- max empleados --------------------
	
	public function createempleadoController( $id_doc, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $id_rol, $estado, $passw){
		$datosController = array(
		    
			"id_doc"=>$id_doc,
			"documento"=>$documento,		    
			"n_em"=>$n_em,
			"a_em"=>$a_em,
			"eml_em"=>$eml_em,
			"f_em"=>$f_em,
			"dir_em"=>$dir_em,
			"lic_emp"=>$lic_emp,
			"lib_em"=>$lib_em,
			"tel_em"=>$tel_em,
			"contrato" =>$contrato,
			"barloc_em"=>$barloc_em,
			"id_pens"=>$id_pens,
			"id_eps"=>$id_eps,
			"id_arl"=>$id_arl,
			"id_ces"=>$id_ces,
			"id_rh"=>$id_rh,
			"id_rol"=>$id_rol,
			"estado"=>$estado,
			"passw"=>$passw
			);
		
		$datos = new DatosEmpleado();
		$respuesta = $datos->createEmpleadoModel($datosController, "empleado", "login");
		return $respuesta;
	}
	public function updateEmpleadoController($id_em, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_doc, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $id_rol, $estado)
	{
		$datosController = array(
			"id_em"=>$id_em,
			"documento"=>$documento,		    
			"n_em"=>$n_em,
			"a_em"=>$a_em,
			"eml_em"=>$eml_em,
			"f_em"=>$f_em,
			"dir_em"=>$dir_em,
			"lic_emp"=>$lic_emp,
			"lib_em"=>$lib_em,
			"tel_em"=>$tel_em,
			"contrato"=>$contrato,
			"barloc_em"=>$barloc_em,
			"id_doc"=>$id_doc,
			"id_pens"=>$id_pens,
			"id_eps"=>$id_eps,
			"id_arl"=>$id_arl,
			"id_ces"=>$id_ces,
			"id_rh"=>$id_rh,
			"id_rol"=>$id_rol,
			"estado"=>$estado
		);
			
		$datos = new DatosEmpleado();
		$respuesta = $datos->updateEmpleadoModel($datosController, "empleado");
		return $respuesta;
	}


	public function readempleadoController(){
		$datos = new DatosEmpleado();
		$respuesta = $datos->readEmpleadoModel("empleado");
		return $respuesta;
	}

	public function deleteempleadoController($id_em){

		$datos = new DatosEmpleado();
		$respuesta = $datos->deleteEmpleadoModel($id_em, "empleado");
		return $respuesta;

	}
	
	//  ------------------- max empleados --------------------
	
	//  ------------------- min empleados --------------------
	
		public function readminempleadoController(){
		$datos = new DatosEmpleado();
		$respuesta = $datos->readminEmpleadoModel("empleado");
		return $respuesta;
	}
	
	//  ------------------- min empleados --------------------

	public function createEmpresaController($Nit_E, $Nom_E, $Eml_E, $Nom_Rl, $ID_Doc, $CC_Rl, $telefonoGeneral, $Val_E, $Est_E, $Fh_Afi, $fechaFinalizacion, $COD_SE, $COD_AE){

		$datosController = array("Nit_E"=>$Nit_E,
			"Nom_E"=>$Nom_E, 
			"Eml_E"=>$Eml_E, 
			"Nom_Rl"=>$Nom_Rl, 
			"ID_Doc"=>$ID_Doc,
			"CC_Rl"=>$CC_Rl,
			"telefonoGeneral"=>$telefonoGeneral, 
			"Val_E"=>$Val_E, 
			"Est_E"=>$Est_E, 
			"Fh_Afi"=>$fh_Afi, 
			"fechaFinalizacion"=>$fechaFinalizacion,
			"COD_SE"=>$COD_SE, 
			"COD_AE"=>$COD_AE);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createEmpresaModel($datosController);
		return $respuesta;
		
	}
	public function createSedeController( $direccion, $area, $idEmpresa){

		$datosController = array("direccion"=>$direccion, "area"=>$area, "idEmpresa"=>$idEmpresa);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createSedeModel($datosController);
		return $respuesta;

	}
	public function createEncargadoController($encargado, $sedeId, $encargadoEst){

		$datosController = array("encargado"=>$encargado, "sedeId"=>$sedeId, "encargadoEst"=>$encargadoEst);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createEncargadoModel($datosController);
		return $respuesta;

	}
	public function createTelEncargadoIdController($encargadoId, $encargadoTel){

		$datosController = array("encargadoId"=>$encargadoId, "encargadoTel"=>$encargadoTel);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createTelEncargadoIdModel($datosController);
		return $respuesta;

	}
	public function readEmpresasController($id = null) {
		$datos = new DatosEmpresa();
		if ($id !== null) {
			$respuesta = $datos->readEmpresaModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readEmpresaModel();
			return $respuesta;
		}
	}
	public function readSedeController($id = null){
		$datos = new DatosEmpresa();
		if ($id !== null) {
			$respuesta = $datos->readSedeModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readSedeModel();
			return $respuesta;
		}
	}
	public function readPhoneSedeController($id = null){
		$datos = new DatosEmpresa();
		if ($id !== null) {
			$respuesta = $datos->readPhoneSedeModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readPhoneSedeModel();
			return $respuesta;
		}
	}
	public function updateEmpresaController($id_e, $Nit_E, $Nom_E, $Eml_E, $Nom_Rl, $ID_Doc, $CC_Rl, $telefonoGeneral, $Val_E, $Est_E, $Fh_Afi, $fechaFinalizacion, $COD_SE, $COD_AE){

		$datosController = array("id_e"=>$id_e,
		"Nit_E"=>$Nit_E,
		"Nom_E"=>$Nom_E, 
		"Eml_E"=>$Eml_E, 
		"Nom_Rl"=>$Nom_Rl, 
		"ID_Doc"=>$ID_Doc,
		"CC_Rl"=>$CC_Rl,
		"telefonoGeneral"=>$telefonoGeneral, 
		"Val_E"=>$Val_E, 
		"Est_E"=>$Est_E, 
		"Fh_Afi"=>$Fh_Afi, 
		"fechaFinalizacion"=>$fechaFinalizacion,
		"COD_SE"=>$COD_SE, 
		"COD_AE"=>$COD_AE);
		
		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEmpresaModel($datosController);
		return $respuesta;

	}
	#usuarios	
	public function updateSedeController($sedeId, $direccion, $area){

		$datosController = array("sedeId"=>$sedeId, "direccion"=>$direccion, "area"=>$area);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateSedeModel($datosController);
		return $respuesta;

	}
	public function updateEncargadoController($encargadoId, $encargado){

		$datosController = array("encargadoId"=>$encargadoId, "encargado"=>$encargado);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEncargadoModel($datosController);
		return $respuesta;

	}
	public function updateEncargadoEstController($encargadoId, $estado){

		$datosController = array("encargadoId"=>$encargadoId, "estado"=>$estado);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEncargadoEstModel($datosController);
		return $respuesta;

	}
	public function updateEncargadoTelController($encargadoId, $encargadoTel){

		$datosController = array("encargadoId"=>$encargadoId, "encargadoTel"=>$encargadoTel);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEncargadoTelModel($datosController);
		return $respuesta;

	}

//----------NOVEDAD----------//
	//caso CREATE
	public function createNovedadController($Fe_Nov, $T_Nov, $Dic_Nov, $Des_Nov, $id_evi, $id_em, $ID_S){
		$datosController = array(
			"Fe_Nov"=>$Fe_Nov,
			"T_Nov"=>$T_Nov,
			"Dic_Nov"=>$Dic_Nov,
			"Des_Nov"=>$Des_Nov,
			"id_evi"=>$id_evi,
			"id_em"=>$id_em,
			"ID_S"=>$ID_S
			);
		
		$datos = new DatosNovedad();
		$novedad = $datos->createNovedadModel($datosController, "novedad");
		return $novedad;
	}
	// casos READ
	public function readNovedadController($id = null) {
		$datos = new DatosNovedad();
		if ($id !== null) {
			$respuesta = $datos->readNovedadModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readNovedadModel();
			return $respuesta;
		}
	}

	public function updateNovedadController($ID_Nov, $Fe_Nov, $T_Nov, $Dic_Nov, $Des_Nov, $id_evi, $id_em, $ID_S)
	{
		$datosController = array(
			"ID_Nov"=>$ID_Nov,
			"Fe_Nov"=>$Fe_Nov,
			"T_Nov"=>$T_Nov,
			"Dic_Nov"=>$Dic_Nov,
			"Des_Nov"=>$Des_Nov,
			"id_evi"=>$id_evi,
			"id_em"=>$id_em,
			"ID_S"=>$ID_S
		);
			
		$datos = new DatosNovedad();
		$respuesta = $datos->updateNovedadModel($datosController, "novedad");
		return $respuesta;
	}

	public function deleteNovedadController($ID_Nov){

		$datos = new DatosNovedad();
		$respuesta = $datos->deleteNovedadModel($ID_Nov, "Novedad");
		return $respuesta;

	}

//----------FIN NOVEDAD----------//

	//----------Login----------//
	//login
	public function loginController($passw, $documento)
	{
		$datosController = array(
			"passw"=>$passw, 
			"documento"=>$documento);
			
		$datos = new DatosLogin();
		$respuesta = $datos->loginModel($datosController);
		return $respuesta;
	}

	
}

?>
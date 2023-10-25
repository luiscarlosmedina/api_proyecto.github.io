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
	
	public function createempleadoController( $id_doc, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $id_rol, $estado, $passw, $n_coe, $csag, $t_cem){
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
			"passw"=>$passw,
			"n_coe"=>$n_coe,
			"csag"=>$csag,
			"t_cem"=>$t_cem
			);
		
		$datos = new DatosEmpleado();
		$respuesta = $datos->createEmpleadoModel($datosController, "empleado", "login", "contacto_emergencia");
		return $respuesta;
	}
	public function createContEmgController($datosController){
		$datos = new DatosEmpleado();
		$respuesta = $datos->createContEmgModel($datosController);
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

	public function readEmpleadoController($id = null) {
		$datos = new DatosEmpleado();
		if ($id !== null) {
			$respuesta = $datos->readEmpleadoModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readEmpleadoModel();
			return $respuesta;
		}
	}

	public function readContEmgController($id){
		$datos = new DatosEmpleado();
		$respuesta = $datos->readContEmgModel($id);
		return $respuesta;
	}

	public function updateContEmgController($datosController) {
		$datos = new DatosEmpleado();
		$respuesta = $datos->updateContEmgModel($datosController);
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
	//  ------------------- controller modulo empresa --------------------

    public function createFastEmpresaController($data)
    {
        $datos = new DatosEmpresa();
        $respuesta = $datos->createFastEmpresaModel($data);
        return $respuesta;
    }

	public function createEmpresaController($data)
    {
        $datos = new DatosEmpresa();
        $respuesta = $datos->createEmpresaModel($data);
        return $respuesta;
    }

	//crea una sede con un encargado y tres telefonos
	public function createSedeController( $Dic_S,$Sec_V, $id_e, $N_En, $Est_en, $tel1, $tel2, $tel3){

		$datosController = array("Dic_S"=>$Dic_S, "Sec_V"=>$Sec_V, "id_e"=>$id_e, "N_En"=>$N_En, "Est_en"=>$Est_en, "tel1"=>$tel1, "tel2"=>$tel2, "tel3"=>$tel3);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createSedeModel($datosController);
		return $respuesta;

	}
	public function createEncargadoController($ID_S, $N_En, $Est_en, $tel1, $tel2, $tel3){

		$datosController = array("ID_S"=>$ID_S, "N_En"=>$N_En, "Est_en"=>$Est_en, "tel1"=>$tel1, "tel2"=>$tel2, "tel3"=>$tel3);

		$datos = new DatosEmpresa();
		$respuesta = $datos->createEncargadoModel($datosController);
		return $respuesta;

	}

	public function readEmpresaNitController($nit) {
		$datos = new DatosEmpresa();
		$respuesta = $datos->readEmpresaNitModel($nit);
		return $respuesta;
	}
	public function readTdocController($id = null) {
		$datos = new DatosEmpresa();
		if ($id !== null) {
			$respuesta = $datos->readTdocModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readTdocModel();
			return $respuesta;
		}
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
	// lee las sedes ya sea el listado general o por id de empresa
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
	//read los nombres y telefonos de los encargados por id de sede
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
	public function updateSedeController($ID_S, $Dic_S, $Sec_V){

		$datosController = array("ID_S"=>$ID_S, "Dic_S"=>$Dic_S, "Sec_V"=>$Sec_V);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateSedeModel($datosController);
		return $respuesta;

	}
	public function updateEstSdController($est_sed, $ID_S){
		$datosController = array("est_sed"=>$est_sed, "ID_S"=>$ID_S);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEstSdModel($datosController);
		return $respuesta;
	}
	public function updateEncargadoController($ID_En,$N_En, $tel1, $tel2, $tel3){

		$datosController = array("N_En"=>$N_En, "ID_En"=>$ID_En,"tel1"=>$tel1,"tel2"=>$tel2,"tel3"=>$tel3);

		$datos = new DatosEmpresa();
		$respuesta = $datos->updateEncargadoModel($datosController);
		return $respuesta;

	}
	public function deleteEncargadoController($Est_en, $ID_En){
		$datosController = array("Est_en"=>$Est_en, "ID_En"=>$ID_En);

		$datos = new DatosEmpresa();
		$respuesta = $datos->deleteEncargadoModel($datosController);
		return $respuesta;	
	}

	//  ------------------- FIN controller modulo empresa --------------------
//----------NOVEDAD----------//

	//caso CREATE tabla Novedad
	public function createNovedadController($T_Nov, $Dic_Nov, $Des_Nov, $id_evi, $id_em, $ID_S){
		$datosController = array(
			"T_Nov"=>$T_Nov,
			"Dic_Nov"=>$Dic_Nov,
			"Des_Nov"=>$Des_Nov,
			"id_evi"=>$id_evi,
			"id_em"=>$id_em,
			"ID_S"=>$ID_S
			);
		
		$datos = new DatosNovedad();
		$respuesta = $datos->createNovedadModel($datosController);
		return $respuesta;
	}
	//caso CREATE tabla tpNovedad
	public function createTpNovedadController($Nombre_Tn, $descrip_Tn){
		$datosController = array(
			"Nombre_Tn"=>$Nombre_Tn,
			"descrip_Tn"=>$descrip_Tn,
			);
		
		$datos = new DatosNovedad();
		$respuesta = $datos->createTpNovedadModel($datosController);
		return $respuesta;
	}
	//caso CREATE tabla evidencia
	public function createEvidenciaController($adjunto){
		$datosController = array(
			"adjunto"=>$adjunto,
			);
		
		$datos = new DatosNovedad();
		$respuesta = $datos->createEvidenciaModel($datosController);
		return $respuesta;
	}
	// casos READ tabla Novedad
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
	// casos READ tabla tp_novedad
	public function readTpNovedadController() {
		$datos = new DatosNovedad();
		$respuesta = $datos->readTpNovedadModel();
			return $respuesta;
	}
	// casos READ tabla empresa para id
	public function readNovedadEmpresaController() {
		$datos = new DatosNovedad();
		$respuesta = $datos->readNovedadEmpresaModel();
			return $respuesta;
	}
	// casos READ tabla evidencia
	public function readEvidenciaController() {
		$datos = new DatosNovedad();
		$respuesta = $datos->readEvidenciaModel();
			return $respuesta;
	}
	// casos READ tabla sede por id empresa
	public function readNovedadSedeController($id) {
		$datos = new DatosNovedad();
		$respuesta = $datos->readNovedadSedeModel($id);
			return $respuesta;
	}
	// casos READ tabla empleado para novedad
	public function readNovedadEmpleadoController() {
		$datos = new DatosNovedad();
		$respuesta = $datos->readNovedadEmpleadoModel();
			return $respuesta;
	}
	//caso UPDATE tabla tp_novedad
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
			"ID_S"=>$ID_S,
		);
			
		$datos = new DatosNovedad();
		$respuesta = $datos->updateNovedadModel($datosController);
		return $respuesta;
	}
	//caso UPDATE tabla tp_novedad
	public function updateTpNovedadController($T_Nov, $Nombre_Tn, $descrip_Tn)
	{
		$datosController = array(
			"T_Nov"=>$T_Nov,
			"Nombre_Tn"=>$Nombre_Tn,
			"descrip_Tn"=>$descrip_Tn,
		);
			
		$datos = new DatosNovedad();
		$respuesta = $datos->updateTpNovedadModel($datosController);
		return $respuesta;
	}
	//caso UPDATE tabla tp_novedad
	public function updateEvidenciaController($id_evi, $adjunto)
	{
		$datosController = array(
			"id_evi"=>$id_evi,
			"adjunto"=>$adjunto,
		);
			
		$datos = new DatosNovedad();
		$respuesta = $datos->updateEvidenciaModel($datosController);
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
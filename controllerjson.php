<?php
require_once 'modelojson_empleado.php';
require_once 'modelojson_empresa.php';
require_once 'modelojson_novedad.php';
require_once 'modelojson_login.php';
require_once 'modelojson_reporte.php';
/**
 *
 */
class ControllerJson
{
//  ------------------------ Start controller module employee --------------------------

  // ---------------------- Create employe -------------------------
	public function createempleadoController( $id_doc, $documento, $n_em, $a_em, $eml_em, $f_em, $dir_em, $lic_emp, $lib_em, $tel_em, $contrato, $barloc_em, $id_pens, $id_eps, $id_arl, $id_ces, $id_rh, $estado, $n_coe, $csag, $t_cem , $passw, $id_rol ){
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
			"estado"=>$estado,
			"n_coe"=>$n_coe,
			"csag"=>$csag,
			"t_cem"=>$t_cem,
			"passw"=>$passw,
			"id_rol"=>$id_rol,
			);
		
		$datos = new DatosEmpleado();
		$respuesta = $datos->createEmpleadoModel($datosController);
		return $respuesta;
	}

  // ---------------------- Create employe -------------------------

  // ---------------------- Contact emergency ----------------------

	public function createContEmgController($datosController){
		$datos = new DatosEmpleado();
		$respuesta = $datos->createContEmgModel($datosController);
		return $respuesta;
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


	public function deleteContEmgController($id){
		$datos = new DatosEmpleado();
		$respuesta = $datos->deleteContEmgModel($id);
		return $respuesta;
	}
  // ---------------------- Contact emergency -----------------------

  // ------------------------ Update employe -------------------------

	public function  updateInfoPrinController($id_em, $n_em, $a_em, $id_doc, $documento, $eml_em, $dir_em, $lic_emp, $lib_em, $tel_em, $barloc_em, $id_rh, $contrato, $id_pens, $id_eps, $id_arl, $id_ces)
	{
		$datosController = array(
			"id_em" => $id_em,
			"id_doc"=>$id_doc,
			"documento"=>$documento,	    
			"n_em"=>$n_em,
			"a_em"=>$a_em,
			"eml_em"=>$eml_em,
			"dir_em"=>$dir_em,
			"lic_emp"=>$lic_emp,
			"lib_em"=>$lib_em,
			"tel_em"=>$tel_em,
			"barloc_em"=>$barloc_em,
			"id_rh"=> $id_rh,
			"contrato"=> $contrato,
			"id_pens"=>$id_pens,	    
			"id_eps"=>$id_eps,
			"id_arl"=>$id_arl,
			"id_ces"=>$id_ces
		);
			
		$datos = new DatosEmpleado();
		$respuesta = $datos->updateInfoPrinModel($datosController, "empleado");
		return $respuesta;
	}

	public function  updateEstadoEmpController($id_em, $estado)
	{
		$datosController = array(
			"id_em" => $id_em,
			"estado" => $estado
		);
		$datos = new DatosEmpleado();
		$respuesta = $datos->updateEstadoEmpModel($datosController, "empleado");
		return $respuesta;
	}


	public function updatePerfilController($id_em, $n_em, $a_em, $eml_em, $dir_em, $lic_emp, $tel_em, $barloc_em)
	{
		$datosController = array(
			"id_em"=>$id_em,	    
			"n_em"=>$n_em,
			"a_em"=>$a_em,
			"eml_em"=>$eml_em,
			"dir_em"=>$dir_em,
			"lic_emp"=>$lic_emp,
			"tel_em"=>$tel_em,
			"barloc_em"=>$barloc_em
		);

		$datos = new DatosEmpleado();
		$respuesta = $datos->updatePerfilModel($datosController, "empleado");
		return $respuesta;
	}



	public function updateRolController($id_em, $id_rol)
	{
		$datosController = array(
			"id_em"=>$id_em,	    
			"id_rol"=>$id_rol
		);

		$datos = new DatosEmpleado();
		$respuesta = $datos->updateRolModel($datosController);
		return $respuesta;
	}

  // ------------------------ Update employe -------------------------

  // ------------------------ Read employes -------------------------

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

	public function readEmpleadoOneController($id = null) {
		$datos = new DatosEmpleado();
		if ($id !== null) {
			$respuesta = $datos->readEmpleadoOneModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readEmpleadoOneModel();
			return $respuesta;
		}
	}

	public function readEmpleadoestadoController($id = null) {
		$datos = new DatosEmpleado();
		if ($id !== null) {
			$respuesta = $datos->readEmpleadoestadoModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readEmpleadoestadoModel();
			return $respuesta;
		}
	}
	
	public function readPerfilController($id = null) {
		$datos = new DatosEmpleado();
		if ($id !== null) {
			$respuesta = $datos->readPerfilModel($id);
			return $respuesta;
		} else {
			$respuesta = $datos->readPerfilModel();
			return $respuesta;
		}
	}

	public function readminempleadoController(){
		$datos = new DatosEmpleado();
		$respuesta = $datos->readminEmpleadoModel("empleado");
		return $respuesta;
	}

	public function readEmpleadorolController($id_em = null) {
		$datos = new DatosEmpleado();
		if ($id_em !== null) {
			$respuesta = $datos->readEmpleadorolModel($id_em);
			return $respuesta;
		} else {
			$respuesta = $datos->readEmpleadorolModel();
			return $respuesta;
		}
	}

  // ------------------------ Read employes -------------------------


 

// ------------------------ Checker unique------------------------

public function readverificarEmpleadoController($tipoDocumento, $numeroDocumento) {
    $datos = new DatosEmpleado();
    $empleadoEncontrado = $datos->readverificarEmpleadoModel($tipoDocumento, $numeroDocumento);
    
    return !$empleadoEncontrado; 

}


public function readveriemlEmpleadoController($Email) {
    $datos = new DatosEmpleado();
    $EmailEncontrado = $datos->readveriemlEmpleadoModel($Email) ;
    
    return !$EmailEncontrado; 

}


public function readveritemlEmpleadoController($telefono) {
    $datos = new DatosEmpleado();
    $TelefonoEncontrado = $datos->readveritemlEmpleadoModel($telefono) ;
    
    return !$TelefonoEncontrado; 

}

public function readveritemlEmpleadoaggController($telefono) {
    $datos = new DatosEmpleado();
    $TelefonoEncontrado = $datos->readveritemlEmpleadoaggModel($telefono) ;
    
    return !$TelefonoEncontrado; 

}

// ------------------------ Checker unique------------------------


// ------------------------ Selectors ------------------------

// Lee y retorna los roles disponibles.
public function readTprolController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTprolModel();
    return $respuesta;
}

// Lee y retorna los tipos de RH disponibles.
public function readTpthController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTprhModel();
    return $respuesta;
}

// Lee y retorna los tipos de documento disponibles.
public function readTpdocuController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTpdocuModel();
    return $respuesta;
}

// Lee y retorna los tipos de EPS disponibles.
public function readTpepsController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTpepsModel();
    return $respuesta;
}

// Lee y retorna los tipos de CES disponibles.
public function readTpcesController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTpcesModel();
    return $respuesta;
}

// Lee y retorna los tipos de ARL disponibles.
public function readTparlController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTparlModel();
    return $respuesta;
}

// Lee y retorna los tipos de pensiones disponibles.
public function readTppensController() {
    $datos = new DatosEmpleado();
    $respuesta = $datos->readTppensModel();
    return $respuesta;
}

// ------------------------ Selectors ------------------------



//  ------------------------ End controller module employe --------------------------

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
	public function createSedeController( $Dic_S,$Sec_V, $id_e){

		$datosController = array("Dic_S"=>$Dic_S, "Sec_V"=>$Sec_V, "id_e"=>$id_e);

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
	public function createNovedadController($T_Nov, $Dic_Nov, $Des_Nov, $adjuntos, $id_em, $ID_S){
		$datosController = array(
			"T_Nov" => $T_Nov,
			"Dic_Nov" => $Dic_Nov,
			"Des_Nov" => $Des_Nov,
			"adjuntos" => $adjuntos,
			"id_em" => $id_em,
			"ID_S" => $ID_S
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
	//read trasabilidad
	public function readTrazabilidadController() {
		$datos = new DatosNovedad();
		$respuesta = $datos->readTrazabilidadModel();
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
	public function readEvidenciaController($id) {
		$datos = new DatosNovedad();
		try {
			$respuesta = $datos->readEvidenciaModel($id);
			if ($respuesta) {
				return $respuesta;
			} else {
				return array(); // o cualquier valor que desees devolver cuando no hay evidencia
			}
		} catch (Exception $e) {
			return null; // o maneja el error de alguna manera
		}
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
	public function updateNovedadController($ID_Nov, $T_Nov, $Des_Nov, $id_em)
	{
		$datosController = array(
			"ID_Nov"=>$ID_Nov,
			"T_Nov"=>$T_Nov,
			"Des_Nov"=>$Des_Nov,
			"id_em"=>$id_em,
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
	public function VerifPassController($passw, $id_em)
	{
		$datosController = array(
			"passw"=>$passw, 
			"id_em"=>$id_em);
			
		$datos = new DatosLogin();
		$respuesta = $datos->VerifPassModel($datosController);
		return $respuesta;
	}
	public function ChangePassController($passw, $id_em)
	{
		$datosController = array(
			"passw"=>$passw, 
			"id_em"=>$id_em);
			
		$datos = new DatosLogin();
		$respuesta = $datos->ChangePassModel($datosController);
		return $respuesta;
	}
	//----------reporte----------//
	public function repNovController($startdate = null, $enddate = null, $tipoNovedad = null) {
		$datos = new DatosReporte();
		$respuesta = $datos->repNovModel($startdate, $enddate, $tipoNovedad);
		return $respuesta;
	}
	
	public function repSectorNovController($startdate = null, $enddate = null, $tipoNovedad = null){
		$datos = new DatosReporte();
		$respuesta = $datos->repNovSectorModel($startdate, $enddate, $tipoNovedad);
		return $respuesta;
	}
	public function repNovDiaController($startdate = null, $enddate = null, $tipoNovedad = null){
		$datos = new DatosReporte();
		$respuesta = $datos->repNovDiaModel($startdate, $enddate, $tipoNovedad);
		return $respuesta;
	}
	public function repNovHoraController($startdate = null, $enddate = null, $tipoNovedad = null){
		$datos = new DatosReporte();
		$respuesta = $datos->repNovHoraModel($startdate, $enddate, $tipoNovedad);
		return $respuesta;
	}
	public function repEmpresaNovController($startdate = null, $enddate = null, $ltempresa = null) {
		$datos = new DatosReporte();
		$respuesta = $datos->repEmpresaNovModel($startdate, $enddate, $ltempresa);
		return $respuesta;
	}
	public function repSedeNovController($startdate = null, $enddate = null, $ltempresa = null) {
		$datos = new DatosReporte();
		$respuesta = $datos->repSedeNovModel($startdate, $enddate, $ltempresa);
		return $respuesta;
	}
	public function repSedetpNovController($startdate = null, $enddate = null, $ltempresa = null) {
		$datos = new DatosReporte();
		$respuesta = $datos->repSedetpNovModel($startdate, $enddate, $ltempresa);
		return $respuesta;
	}
	public function repHistNovController($startdate = null, $enddate = null, $ltempresa = null) {
		$datos = new DatosReporte();
		$respuesta = $datos->repHistNovModel($startdate, $enddate, $ltempresa);
		return $respuesta;
	}
}
?>
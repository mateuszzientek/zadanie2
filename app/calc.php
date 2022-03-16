<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$opr){
	$kwota=isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata=isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$opr=isset($_REQUEST['opr']) ? $_REQUEST['opr'] : null;	
}

function walidacja(&$kwota,&$lata,&$opr,&$messages){
	if(! (isset($kwota) && isset($lata) && isset($opr))){
		return false;
	}

	if($kwota==""){
		$messages []="Nie podano kwoty";
	}

	if($lata==""){
		$messages []="Nie podano lat";
	}

	if($opr==""){
		$messages []="Nie podano oprocentowania";
	}

	if(! is_numeric($kwota)){
		$messages []="Kwota nie jest liczba calkowita";
	}

	if(! is_numeric($lata)){
		$messages []="Lata nie sa liczba calkowita";
	}

	if(! is_numeric($opr)){
		$messages []="Oprocentowanie nie jest liczba calkowita";
	}

	if (count ( $messages ) != 0) 
	{
		return false;
	}else return true;

}

function proces(&$kwota,&$lata,&$opr,&$messages,&$wynik){
	
	$kwota = intval($kwota);
	$lata = intval($lata);
	$opr = intval($opr);

	$procenty= $kwota*($opr/100);
	$wynik= ($kwota/($lata*12))+$procenty;
	
}

$kwota = null;
$lata = null;
$opr = null;
$wynik = null;
$messages = array();

getParams($kwota,$lata,$opr);

if ( walidacja($kwota,$lata,$opr,$messages)) { 
	proces($kwota,$lata,$opr,$messages,$wynik);
}

include 'calc_view.php';
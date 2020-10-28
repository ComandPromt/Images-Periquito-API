<?php

function deliver_response($status, $imagenes, $imagenes_nuevas)
{
    header("HTTP/1.1 $status $status_message");
    
    
    $response['respuesta'] = $status;
    
    $response['imagenes'] = $imagenes;
    
    $response['imagenes_bd'] = $imagenes_nuevas;
    
    $json_response = json_encode($response);
    
    echo $json_response;

}

date_default_timezone_set('Europe/Madrid');

header('Content-Type:application/json');

$imagenes = array();

if ($_GET['imagenes'][0]=="[") {

   $imagenes = substr($_GET['imagenes'],1,strlen($_GET['imagenes'])-2);
   
   $imagenes = str_replace('"','',$imagenes);
}

else {
    $imagenes = $_GET['imagenes'];

}

$imagenes = explode(',', $imagenes);

sort($imagenes);

$imagenes_procesadas = array();

$imagen = date('Y').'_'.date('d').'_'.date('m').'_'.date('H').'-'.date('i').'-'.date('s');

$size=count($imagenes);

if($imagenes[0]!=''){
	
	$y=1;
	
	for ($x = 0; $x < $size; ++$x) {
		
		$longitud = strlen($imagenes[$x]);
	
		$extension = substr($imagenes[$x], $longitud - 3, $longitud);
	
		$extension = strtolower($extension);
	
		if ($extension == 'peg') {
			$extension = 'jpg';
		}
		
		$paso=""+$y;
		
		if($y<10){
			$paso="0"+$y;
		}
		
		$imagenes_procesadas[] =($size>1) ? $imagen.'_000000'.$paso.'.'.$extension : $imagen.'.'.$extension;
		
		$y++;
		
	}
	
	deliver_response(200, $imagenes, $imagenes_procesadas);

}

<?php

$imagenes = array();

$imagenes_procesadas = array();

function deliver_response($status, $imagenes, $imagenes_nuevas){
	
    header("HTTP/1.1 $status");
        
    $response['respuesta'] = $status;
    
    $response['imagenes'] = $imagenes;
    
    $response['imagenes_bd'] = $imagenes_nuevas;
    
    $json_response = json_encode($response);
    
    echo $json_response;

}

function renombrar($modo){
	
	GLOBAL $imagenes,$imagenes_procesadas;
	
	$imagenes = explode(',', $imagenes);
		
	$size=count($imagenes);
	
	$paso="";
		
	$long=0;
		
	$y=1;
	
	$imagen = date('Y').'_'.date('d').'_'.date('m').'_'.date('H').'-'.date('i').'-'.date('s');
	
	for ($x = 0; $x < $size; ++$x) {
	
		$longitud = strlen($imagenes[$x]);
		
		$extension = substr($imagenes[$x], $longitud - 3, $longitud);
		
		$extension = strtolower($extension);
		
		if ($extension == 'peg') {
			
			$extension = 'jpg';
			
		}
			
		$long=strlen($y);
			
		$paso=pintar_ceros(7-$long);
		
		switch($modo){
			
			case 1:
			
				$imagenes_procesadas[] = ($size>1) ? $imagen.'_'.$paso.$y.'.'.$extension : $imagen.'.'.$extension;
	
			break;
			
			case 2:
				
				$imagenes_procesadas[] =($size>1) ? substr($imagenes[$x],0, - 4)."-".$imagen.'_'.$paso.$y.'.'.$extension:substr($imagenes[$x],0, - 4)."-".$imagen.$y.'.'.$extension ;
	
			break;
			
			case 3:
			
				$imagenes_procesadas[] =$paso.$y.'.'.$extension;
	
			break;
			
		}
			
		$y++;
		
	}
	
}

function pintar_ceros($num){

	$ceros="";
	
	for($i=0;$i<$num;$i++){
		
		$ceros.="0";
		
	}
		
	return $ceros;
	
}

if(isset($_GET['imagenes'])){
	
	date_default_timezone_set('Europe/Madrid');

	header('Content-Type:application/json');
	
	GLOBAL $imagenes,$imagenes_procesadas;
	
	if ($_GET['imagenes'][0]=="[") {
	
		$imagenes = substr($_GET['imagenes'],1,strlen($_GET['imagenes'])-2);
	
		$imagenes = str_replace('"','',$imagenes);
	}
	
	else {
		
		$imagenes = $_GET['imagenes'];
	
	}
	
	if(isset($_GET['mode']) && (int)$_GET['mode']>0){
			
			renombrar($_GET['mode']);
			
	}

	else{

		if($imagenes[0]!=''){
				
			renombrar(1);
					
		}
	
	}

	deliver_response(200, $imagenes, $imagenes_procesadas);
					
}

?>
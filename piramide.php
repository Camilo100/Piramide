<?php
session_start();

#Profe !!! Te queremos mucho pero tuvimos algunos casos para los que no funciona.
#Por favor se piadoso. Te lo entregamos ahora, y luego subimos la version completa.

class Piramide{
	
	var $flag=0;


	function ingresar(){
		$i=1;

		for($i;$i<22;$i++){
			$GLOBALS[$i] = $_REQUEST["$i"];

		}
	}

	function devolver($pos){
		if($pos<22){
		return ($GLOBALS[$pos]);
		}
		else{return;}
			
	}
	

	function Mostrar(){

			echo "<pre>";
			echo $GLOBALS[1]."\n";
			echo $GLOBALS[2]." ";
			echo $GLOBALS[3]."\n";
			echo $GLOBALS[4]." ";
			echo $GLOBALS[5]." ";
			echo $GLOBALS[6]."\n";
			echo $GLOBALS[7]." ";
			echo $GLOBALS[8]." ";
			echo $GLOBALS[9]." ";
			echo $GLOBALS[10]."\n";
			echo $GLOBALS[11]." ";
			echo $GLOBALS[12]." ";
			echo $GLOBALS[13]." ";
			echo $GLOBALS[14]." ";
			echo $GLOBALS[15]."\n";
			echo $GLOBALS[16]." ";
			echo $GLOBALS[17]." ";
			echo $GLOBALS[18]." ";
			echo $GLOBALS[19]." ";
			echo $GLOBALS[20]." ";
			echo $GLOBALS[21]."\n";
			echo "</pre>";
			exit();
	}

	

	function Resolver($pos){
		if ($pos == 22){
			$this->flag = $this->flag + 1;
			$this->Resolver(1);
		}
		if ($this->flag == 10){
			$this->Mostrar();
			}
		$minodo = new nodo();
		$posHijoIzq = (log($pos, 2)+ $pos + 1.05);
		$posHijoIzq = round($posHijoIzq , 0, PHP_ROUND_HALF_UP);
		$posHijoDer = (log($pos, 2)+ $pos + 2.05);
		$posHijoDer = round($posHijoDer, 0, PHP_ROUND_HALF_UP);
		

		if ($minodo->vacio($pos, $GLOBALS[$pos] ) == 1){
			$minodo->ResolverPadre($pos, $posHijoIzq, $posHijoDer);
			$this->Resolver($pos+1);
		}
			
		else{
			if ($pos==1) {
			$minodo->ResolverHijo($pos, $GLOBALS[$pos]);
			$this->Resolver($pos+1);
			}
			if ($pos<17){
			$minodo->ResolverHijo($pos, $GLOBALS[$pos]);
			$this->Resolver($pos+1);
			}
			else
			{
			$this->Resolver($pos+1);
			}
		}
	}

	function Agregar($pos, $val){
		$GLOBALS[$pos] = $val;
	}

	
}


class nodo extends Piramide{
var $lista;
	function vacio($pos, $val){
		if (empty($val)){
			return (1);
		}
	}

	function ResolverPadre($pos, $posHijoIzq, $posHijoDer){

		if($pos==6){
			$posHijoIzq=9;
			$posHijoDer=10;
		}
		if($pos==3){
			$posHijoIzq=5;
			$posHijoDer=6;
		}
		$valHijoIzq=$this->devolver($posHijoIzq);
		$valHijoDer=$this->devolver($posHijoDer);
		
		if (empty($valHijoIzq) and empty($valHijoDer)){}
		else
		{
			$val = $valHijoIzq + $valHijoDer;
			$this->Agregar($pos, $val);
			}
			
	}
	
	
	function ResolverHijo($pos, $val){


		$posHijoIzq = (log($pos, 2)+ $pos + 1.05);
		$posHijoIzq = round($posHijoIzq , 0, PHP_ROUND_HALF_UP);
		$posHijoDer = (log($pos, 2)+ $pos + 2.05);
		$posHijoDer = round($posHijoDer, 0, PHP_ROUND_HALF_UP);

		$valHijoIzq = $this->devolver($posHijoIzq);
		$valHijoDer = $this->devolver($posHijoDer);
		
		if (empty($valHijoIzq)){}
		else
		{
			if (empty($valHijoDer)){
			$valHijoDer =  $val - $valHijoIzq;
			$this->Agregar($posHijoDer, $valHijoDer);
		}
		if (empty($valHijoDer) ){}
		else
		{	
			if (empty($valHijoIzq)){
			$valHijoIzq = $val - $valHijoDer;
			$this->Agregar($posHijoIzq, $valHijoIzq);
		}
		}
	}
}
}		


$miPiramide = new Piramide();
$miPiramide ->ingresar();
$miPiramide ->resolver(1);




	

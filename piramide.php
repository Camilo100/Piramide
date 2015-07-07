<?php
session_start();

class Piramide{
	var $lista;
	var $flag=0;


	function ingresar(){
		$i=1;

		for($i;$i<22;$i++){
			$this->lista[$i] = $_REQUEST["$i"];
		}
	}

	function Camilo($pos){
		
		return ($this->lista[$pos]);
	}
	

	function Mostrar(){
		for($i=1;$i<22;$i++){
			print $this->lista[$i];
			print " ";
		}
		exit;
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
		if ($minodo->vacio($pos, $this->lista[$pos] ) == 1){
			
			$this->Resolver($pos+1);
		}
			
		else{
			
			$minodo->ResolverPadre($pos, $this->lista[$pos]);
			$minodo->ResolverHijo($pos, $this->lista[$pos]);
			$this->Resolver($pos+1);
		}
	}

	function Agregar($pos, $val){
		$this->lista[$pos] = $val;
	}

	
}


class nodo extends Piramide{
	function vacio($pos, $val){
		if (empty($val)){
			return (1);
		}
	}

	function ResolverPadre($pos, $val){
		$valHnoIzq = $this->Camilo($pos-1);
		$valHnoDer = $this->Camilo($pos+1);
		
		if (empty($valHnoIzq)){}
		else
		{
			$valPadreIzq = $valHnoIzq + $val;
			$this->Agregar($pos-1, $valPadreIzq);
		}
		if (empty($valHnoDer)){}
		else
		{
			$valPadreDer =$valHnoDer + $val;
			$this->Agregar($pos-1, $valPadreDer);
		}
	}	

	function ResolverHijo($pos, $val){


		$posHijoIzq = (log($pos, 2)+ $pos + 2);
		$posHijoIzq = round($posHijoIzq , 0, PHP_ROUND_HALF_UP);
		
		$posHijoDer = (log($pos, 2)+ $pos + 3);
		$posHijoDer = round($posHijoDer, 0, PHP_ROUND_HALF_UP);
		$valHijoIzq = $this->Camilo($posHijoIzq);
		$valHijoDer = $this->Camilo($posHijoDer);
		
		
		if (empty($valHijoIzq)){}
		else
		{
			
			$valHijoDer =  $val - $valHijoIzq;
			$this->Agregar($posHijoDer, $valHijoDer);

		}
		if (empty($valHijoDer) ){}
		else
		{	
			$valHijoIzq = $val - $valHijoDer;
			$this->Agregar($posHijoIzq, $valHijoIzq);

		}
	}
}		


$miPiramide = new Piramide();
$miPiramide ->ingresar();
$miPiramide ->resolver(1);




	

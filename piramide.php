<?php
session_start();

class Piramide{
	var $lista;

	function ingresar(){
		$i=0;
		for($i;$i<21;$i++)
			$lista[$i] = $_REQUEST["$i"];
	}

	function Mostrar(){
		for($i=0;$i<21;$i++){
			print $lista[$i];
		}
	}

	function Resolver($pos){
		if ($pos == 22){
			$this->Resolver(1);
		}
		$minodo = new nodo($pos, $lista[$pos]);
		if ($minodo->vacio($pos, $lista[$pos] ) == TRUE){
			$this->Resolver($pos+1);
		}
			
		else{
			$minodo->ResolverPadre($pos, $lista[$pos]);
			$minodo->ResolverHijo($pos, $lista[$pos]);
			$this->Resolver($pos+1);
		}
	}


	function Agregar($pos, $val){
		$lista[$pos] = $val;
	}

	function Devolver($pos){
		return $lista[$pos];
	}
}


	/*function padre(self, num, pos)
		#me devuelve el padre izq o der segun el numero del hijo 
	function hijo(self, num, pos)
		#me devuelve el hijo izq o der segun el numero del padre 
	function hno(self, num, pos)
		#me devuelve el hno izq o der segun el numero del hno
		for($e=0;$e<21;$e++)
			if(self.lista[$e]==$num)
				 break
		if (pos == "izq")
			return self.lista[$e-1];
		else
			return self.lista[$e+1];
		*/

class nodo extends Piramide{
	function __construct($pos, $val){}


	function vacio($pos, $val){
		if (is_null($val))
			return ;
		else
			return False;
	}
	function ResolverPadre($pos, $val){
		$valHnoIzq = $this ->Devolver($pos-1);
		$valHnoDer = $this ->Devolver($pos+1);
		if (empty($valHnoIzq == false)){
			$valPadreIzq = $valHnoIzq + $val;
			$miPiramide->Agregar($pos-1, $valHnoIzq);
		}
		if (empty($valHnoDer) ==false){
			$valPadreDer =$valHnoDer+$val;
			$miPiramide->Agregar($pos-1, $valHnoDer);
		}
	}	

	function ResolverHijo($pos, $val){
		$valHijoIzq = $this ->Devolver(log(($pos)+$pos+1, 2));
		$valHijoDer = $this ->Devolver(log(($pos)+$pos+2, 2));
		if (empty($valPadreIzq) == false){
			$valHijoDer = $valPadreIzq-$val;
			$miPiramide->Agregar($pos-1, $valHnoIzq);

		}
		if (empty($valPadreDer) == false){
			$valHnoDer = $valPadreDer-$val;
			$miPiramide->Agregar($pos-1, $valHnoDer);

		}
	}
}		


$miPiramide = new Piramide();
$miPiramide ->ingresar();
$miPiramide ->resolver(1);
$miPiramide ->Mostrar();



	

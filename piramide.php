<?php
session_start();
class Piramide(object):

	function ingresar(self)
		for($i;$i<21;$i++)
			$lista[$i] = $_REQUEST["$i"];
	function Mostrar(self)
		for($i=0;i<21;$i++)
			print str(self.lista[i])

	function Nodo(self)
		$a = new nodo($lista[$n]);
		$a ->pasar;
		$n = $n + 1;

	function Agregar($pos, $val)
		$lista[$pos] = $val;

	function Devolver($pos)
		return $lista[$pos]
	

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

class nodo()
	function __init__($pos, $val)
		if is_null($val) 
			$miPiramide->nodo();
		else
			$minodo->ResolverPadre($pos, $val);
			$minodo->ResolverHno($pos, $val);
			$minodo->ResolverHijo($pos, $val);
			$miPiramide->Nodo();
	function ResolverPadre()
		$valPadreIzq = $Piramide ->Devolver($posPadreIzq);
		$valPadreDer = $Piramide ->Devolver($posPadreDer);
		if is_null($valPadreIzq)
			#nose
		else 
			$valHnoIzq = $valPadreIzq-$val;
			$miPiramide->Agregar($pos-1, $valHnoIzq);
		
		if is_null($valPadreDer)
			#nose
		else 
			$valHnoDer = $valPadreDer-$val;
			$miPiramide->Agregar($pos-1, $valHnoDer);
	function ResolverHijo()
		$valHijoIzq = $Piramide ->Devolver(log2($pos)+$pos+1);
		$valHijoDer = $Piramide ->Devolver(log2($pos)+$pos+2);
		if is_null($valPadreIzq)
			#nose
		else 
			$valHijoDer = $valPadreIzq-$val;
			$miPiramide->Agregar($pos-1, $valHnoIzq);
		
		if is_null($valPadreDer)
			#nose
		else 
			$valHnoDer = $valPadreDer-$val;
			$miPiramide->Agregar($pos-1, $valHnoDer);


$miPiramide = new Piramide()
$miPiramide ->ingresar()
$miPiramide ->resolver()
$miPiramide ->Mostrar()



	
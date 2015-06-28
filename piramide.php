<?php
class Piramide(object):

	def ingresar(self)
		$i=0;
		for($i;$i<21;$i++)

	def Mostrar(self)
		for($i=0;i<21;$i++)
			print str(self.lista[i])

	def Nodo(self)
		$a = new nodo($lista[$n]);
		$a ->pasar;
		$n = $n + 1;

	def padre(self, num, pos)
		#me devuelve el padre izq o der segun el numero del hijo 
	def hijo(self, num, pos)
		#me devuelve el hijo izq o der segun el numero del padre 
	def hno(self, num, pos)
		#me devuelve el hno izq o der segun el numero del hno
		for($e=0;$e<21;$e++)
			if(self.lista[$e]==$num)
				 break
		if (pos == "izq")
			return self.lista[$e-1];
		else
			return self.lista[$e+1];


class nodo()
	def __init__(self, num)
		self.num = num
	def pasar(self)
		if is_null(self.num) 
			#pasar a otro nodo
		else 
			#comenzar a resolver las sumas directas
			#si el nodo en el que estamos es conocido, debe comenzar a consultar a padres hijos y hnos para resolver las sumas directas



$miPiramide = new Piramide()
$miPiramide ->ingresar()
$miPiramide ->resolver()
$miPiramide ->Mostrar()



	
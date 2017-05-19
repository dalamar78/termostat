#!/usr/bin/python

import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","testuser","test123","TESTDB" )

# prepare a cursor object using cursor() method
cursor = db.cursor()


	



def (encender_apagar): 
#encender_apagar 0 hay que encender,  1 hay que apagar
	#contralamos si esta encendido o apagado
	#FALTA POR HACER
	#estado_encendido: 0 encendido; 1 apagado 
	if encender_apagar == 0 and estado_encendido == 1:
		

	if encender_apagar == 1 and estado_encendido == 0:

	return "se encendio o apago fisicamente"


sql = "SELECT * estado "
      
try:
# Execute the SQL command
   cursor.execute(sql)
"""sacamos el estado  de la bbdd estado = encendido apagado , temperatura objetivo, metodo= manual o programado"""
   results = cursor.fetchall()
   for row in results:
      id = row[0]
      estado = row[1]
      temperatura_objetivo = row[2]
      metodo = row[3]
# Imprimimos los datos , comentar linea
      print "id=%d,estado=%d,temperatura_objetivo=%f,metodo=%d" % \
             (id, estado, temperatura_objetivo, metodo )
	if estado = 0:
# Estado apagado => no hacemos nada
		pass
	else:
		if metodo = 0:
""" Metodo manual
			# Sacamos el ultimo registro de temperatura insertado en bbdd, el mas actual"""			
			sql = "SELECT temperatura FROM temperatura ORDER BY id DESC LIMIT 1"
			try:
				cursor.execute(sql)
				# Extraemos los datos
			   temperaturas = cursor.fetchall()
			   for row in temperaturas:
				  temp_actual = row[0]
				  temperatura_objetivo = temperatura_objetivo + 1
				# Si la temeperatura actual es menos que la temp.obejtivo(temp.obj+1) 
				if   temp_actual < temperatura_objetivo:
					# Comprobamos si esta arrancado, si esta arrancado no hacemos nada si no lanzamos el arranque			
					print "lanzamos el arranque o contralamos si esta arrancado"
				else:
					# Paramos el el termostato				
					print "paramos porque ya se alcanzo la temperatura o si esta apagado no hacemos nada"
			except:
				print "Error:  no se pueden sacar las temperaturas  actuales"
		else:
""" #metodo programacion
		controlo si el dia programado debe funcionar y actualizo temp obejetivo
		saco el dia para buscar en programacion
		controlo si salta o no"""
			import datetime
			x = datetime.datetime.now()
			dicdias = {'MONDAY':'L','TUESDAY':'M','WEDNESDAY':'X','THURSDAY':'J', \
			'FRIDAY':'V','SATURDAY':'S','SUNDAY':'D'}

			anho = x.year
			mes =  x.month
			dia= x.day
			fecha = datetime.date(anho, mes, dia)
			print (dicdias[fecha.strftime('%A').upper()])
			Dia=dicdias[fecha.strftime('%A').upper()]
			
			sql="select temperatura,nombre,hora_inicio,hora_fin from temperaturaprogramacion WHERE  "+Dia+" = 'true' and activo ='true'and  TIME_TO_SEC(time(now()))  < TIME_TO_SEC(time(hora_fin))and TIME_TO_SEC(time(now())) > TIME_TO_SEC(time(hora_inicio));"
			cursor.execute(sql)
			existeProg=cursor.rowcount
			if existeProg > 0:
				programas = cursor.fetchall()
				for programa in programas:
					temp_actual = programa[0]
					temperatura_objetivo = temperatura_objetivo + 1	
						if   temp_actual < temperatura_objetivo:
							# Comprobamos si esta arrancado, si esta arrancado no hacemos nada si no lanzamos el arranque			
							print "lanzamos el arranque o contralamos si esta arrancado"
						else:
							# Paramos el el termostato				
							print "contramlos si esta encendido o apagado si estaencendido apagamos porque ya se alcanzo la temperatura"
			else:
				# Comprobamos si esta encendido o apagado , si esta encendido apagamos
				print "Comprobamos si esta encendido o apagado , si esta encendido apagamos"
				
except:
   print "Error: no se puede sacar el dato  estado"

# desconectamos del servidor
db.close()
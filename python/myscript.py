#!/usr/bin/python

import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","testuser","test123","TESTDB" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

def rele(encender_apagar): 
#encender_apagar 0 hay que encender,  1 hay que apagar
	#contralamos si esta encendido o apagado
	#FALTA POR HACER
	#estado_encendido: 0 apagado; 1 encendido 
	#status 0 esta encendido 1 esta apagado
	query = """ UPDATE estado set activo = %s
                WHERE id = 1 """
	data = (encender_apagar)
	status=gpio -g read 24
	if encender_apagar == 0 && status == 1:
		#si hay que encenderlo(0) y  esta apagado(1) lo encendido
		cursor.execute(query, data)
		db.commit()
		#ejecutamos el encendemos el rele
		gpio -g mode 24 out
		gpio write 24 0

	if encender_apagar == 1 status == 0:
		#si hay que apagarlo(1) y esta encendido(0) apagamos
		cursor.execute(query, data)
		db.commit()
		gpio write 24 0
		gpio -g mode 24 in
		#ejecutamos el apagado del rele
	return gpio -g read 24


sql = "SELECT * estado "
      
try:
#estado :0 caldera apagada no hace nada, 1 caldera encendida correra el escript
#activo: 0 no esta abierto el rele, 1 esta abierto el rele
   cursor.execute(sql) # sacamos el estado  de la bbdd estado = encendido apagado , temperatura objetivo, metodo= manual o programado
   results = cursor.fetchall()
   for row in results:
		id = row[0]
		estado = row[1]
		temperatura_objetivo = row[2]
		metodo = row[3]
		activo = row[4]
# Imprimimos los datos , comentar linea
	print "id=%d,estado=%d,temperatura_objetivo=%f,metodo=%d" % \
             (id, estado, temperatura_objetivo, metodo )
	if estado = 0: # Estado apagado => no hacemos nada
		pass
	else:
	#el caldera esta en on	
		if metodo = 0:
#Metodo manual
			sql = "SELECT temperatura FROM temperatura ORDER BY id DESC LIMIT 1" # Sacamos el ultimo registro de temperatura insertado en bbdd, el mas actual	
			try:
				cursor.execute(sql) # Extraemos los datos
				temperaturas = cursor.fetchall()
				for row in temperaturas:
					temp_actual = row[0]
					temperatura_objetivo = temperatura_objetivo + 1
			
				if   temp_actual < temperatura_objetivo && activo == 0: 	
					# Si la temeperatura actual es menos que la temp.obejtivo(temp.obj+1) y no esta funcionando la caldera la encendenmos
					rele('0') # Encendemos el el termostato
				else:
					pass
				if   temp_actual > temperatura_objetivo && activo == 1: 	
					# Si la temeperatura actual es mayor que la temp.obejtivo(temp.obj+1) y  esta funcionando la caldera la apagamos
					rele('1') # apagamos  el el termostato
				else:
					pass
			except:
				print "Error:  no se pueden sacar las temperaturas  actuales"
		else:
#metodo programacion
			import datetime
			x = datetime.datetime.now()
			dicdias = {'MONDAY':'L','TUESDAY':'M','WEDNESDAY':'X','THURSDAY':'J', \
			'FRIDAY':'V','SATURDAY':'S','SUNDAY':'D'}

			anho = x.year
			mes =  x.month
			dia= x.day
			fecha = datetime.date(anho, mes, dia)
			print (dicdias[fecha.strftime('%A').upper()])
			Dia=dicdias[fecha.strftime('%A').upper()] #saco el dia para buscar en programacion
			
			sql="select temperatura,nombre,hora_inicio,hora_fin from temperaturaprogramacion WHERE  "+Dia+" = 'true' and activo ='true'and  TIME_TO_SEC(time(now()))  < TIME_TO_SEC(time(hora_fin))and TIME_TO_SEC(time(now())) > TIME_TO_SEC(time(hora_inicio));"
			cursor.execute(sql) # Controlo si el dia programado debe funcionar
			existeProg=cursor.rowcount
			if existeProg > 0: # Controlo si salta o no
				programas = cursor.fetchall()
				for programa in programas:
					temp_actual = programa[0]
					temperatura_objetivo = temperatura_objetivo + 1	
						if  temp_actual < temperatura_objetivo:	
							rele('0') # Encendemos el el termostato
							# Update de temp objetivo
						else:
							rele('1') # Paramos el termostato						
			else:
				rele('1') # Paramos el el termostato		
				
except:
   print "Error: no se puede sacar el dato  estado"

# desconectamos del servidor
db.close()

#!/usr/bin/python

import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","testuser","test123","TESTDB" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

def mi_funcion(nombre, apellido): 
	











sql = "SELECT * estado "
      
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      id = row[0]
      estado = row[1]
      temperatura_objetivo = row[2]
      metodo = row[3]
      # Now print fetched result
      print "id=%d,estado=%d,temperatura_objetivo=%f,metodo=%d" % \
             (id, estado, temperatura_objetivo, metodo )
	if estado = 0:
		pass
	else:
		#metodo manual
		if metodo = 0:
			sql = "SELECT temperatura FROM temperatura ORDER BY id DESC LIMIT 1"
			try:
				cursor.execute(sql)
			   # Fetch all the rows in a list of lists.
			   temperaturas = cursor.fetchall()
			   for row in results:
				  temperatura = row[0]
				  temperatura_objetivo = temperatura_objetivo + 1
				  # Now print fetched result
				if   temp_actual < temperatura_objetivo:
					print "lanzamos el arranque o contralamos si esta arrancado"
				else:
					print "paramos porque ya se alcanzo la temperatura"
			except:
				print "Error:  no se pueden sacar las temperaturas  actuales"
		else:
			#metodo programacion
			# controlo si el dia programado debe funcionar y actualizo temp obejetivo
			
			# saco el dia para buscar en programacion
			# controlo si salta o no
			import datetime
			x = datetime.datetime.now()
			dicdias = {'MONDAY':'L','TUESDAY':'M','WEDNESDAY':'X','THURSDAY':'J', \
			'FRIDAY':'V','SATURDAY':'S','SUNDAY':'D'}
			anho = x.year
			mes =  x.month
			dia= x.day
			fecha = datetime.date(anho, mes, dia)
			print (dicdias[fecha.strftime('%A').upper()])
		
except:
   print "Error: nose puede sacar el dato  estado"

# disconnect from server
db.close()
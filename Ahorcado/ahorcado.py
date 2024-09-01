import random

# Funcion que agrega una oracion al conjunto de oraciones disponibles
def agregar_oracion(oraciones):
    print("Ingrese la oracion que desea agregar al conjunto de oraciones disponibles: ")
    oracion = input()
    oraciones.append(oracion)

# Funcion que verifica que el caracter seleccionado solo este entre la A-Z
def verificar_letra(letra):
    if letra == "a" or letra == "A" or letra == "b" or letra == "B" or letra == "c" or letra == "C" or letra == "d" or letra == "D" or letra == "e" or letra == "E" or letra == "f" or letra == "F" or letra == "g" or letra == "G" or letra == "h" or letra == "H" or letra == "i" or letra == "I" or letra == "j" or letra == "J" or letra == "k" or letra == "K" or letra == "l" or letra == "L" or letra == "m" or letra == "M" or letra == "n" or letra == "N" or letra == "o" or letra == "O" or letra == "p" or letra == "P" or letra == "q" or letra == "Q" or letra == "r" or letra == "R" or letra == "s" or letra == "S" or letra == "t" or letra == "T" or letra == "u" or letra == "U" or letra == "v" or letra == "V" or letra == "w" or letra == "W" or letra == "x" or letra == "X" or letra == "y" or letra == "Y" or letra == "z" or letra == "Z":
        return False 
    else:
        return True

# Funcion que busca la letra seleccionada en la oracion. Retorna la oracion actual
# y el numero de intentos actuales
def buscar_letras(letra,oracion_aleatoria,oracion_transformada,intentos):
    band = False
    ora_temp = []

    # Vemos si la letra seleccionada se encuentra en la oracion y actualizamos
    # la oracion actual (la oculta) para que muestre la letra seleccionada en caso
    # de que se encuentra en ella.
    for i in range(len(oracion_aleatoria)):
        if oracion_aleatoria[i] == letra:
            ora_temp.append(letra)
            band = True
        elif oracion_aleatoria[i] == " ":
            ora_temp.append(" ")
        else:
            if oracion_transformada[i] != "_":
                ora_temp.append(oracion_transformada[i])
            else:
                ora_temp.append("_")
    
    # Pasamos la oracion en forma de lista a string
    ora_temp = "".join(ora_temp)

    # Si la band cambio a True, quiere decir que se acerto la letra, por tanto
    # no se restan intentos
    if band:
        print()
        print(f'Acertaste una letra!, te quedan {intentos} intentos')
    # Si la band se mantuvo en False, quiere decir que no se encontro la letra
    # en ninguna parte de la oracion, por tanto se resta un intento
    else:
        intentos -= 1
        print()
        print(f'Fallaste, te quedan {intentos} intentos')

    return ora_temp,intentos

# Funcion que verifica si la opcion seleccionada es correcta (Y para si y N para no)
def verificar_opcion():
    while True:
        opcion = str(input())
        if opcion == "Y" or opcion == "y" or opcion == "yes" or opcion == "YES" or opcion == "Yes":
            return True
        elif opcion == "N" or opcion == "n" or opcion == "no" or opcion == "NO" or opcion == "No" :
            return False
        else:
            print()
            print("No indico una opcion valida (es Y para si y N para no): ")

# Funcion principal que corre el juego de ahorcado
def adivina_la_oracion():
    partida = True
    # En caso de querer jugar varias partidas, mantengo "partida" en True
    while partida:

        # Arreglo de oraciones disponibles.
        oraciones = ["hola men","hey que tal","la monja"]

        # Verificamos que se ingresara una opcion valida (Y/N)
        while True:
            print("Desea agregar mas oraciones de las predeterminadas (Y/N)?: ")
            if verificar_opcion():
                agregar_oracion(oraciones)
            else: 
                break
            print()

        # Seleccionamos una oracion aleatoria
        oracion_aleatoria = random.choice(oraciones)
        print()
        print("Se selecciono la oracion a buscar...")
        print()

        # Transformamos la oracion al formato oculto
        oracion_transformada = []
        for i in range(len(oracion_aleatoria)):
            if oracion_aleatoria[i] == " ":
                oracion_transformada.append(" ")
            else:
                oracion_transformada.append("_")
        
        # Pasamos la oracion en forma de lista a string
        oracion_transformada = "".join(oracion_transformada)

        intentos = 5
        print("Tienes 5 intentos")
        print()

        # Hacemos el proceso de adivinar
        while True:
            print("Oracion: ")
            print(oracion_transformada)
            print()

            letra = str(input("Selecciona una letra: "))

            # Verificamos que estemos ingresando una letra valida
            while verificar_letra(letra):
                print("No seleccionaste una letra valida")
                print()
                letra = str(input("Selecciona una letra: "))

            # Seleccionamos una letra para ver si esta o no en la oracion
            oracion_transformada,intentos = buscar_letras(letra,oracion_aleatoria,oracion_transformada,intentos)
            print()

            # Vemos si ya no tenemos intentos o si logramos acertar la oracion
            if intentos == 0:
                print("No lograste adivinar la oracion!. La oracion era: ")
                print(oracion_aleatoria)
                print()
                print("------------------------------------------------")
                print("Deseas volver a jugar (Y/N)?: ")

                # En caso de que se quiera volver a jugar
                if verificar_opcion():
                    print()
                    break
                # Si no se desea voler a jugar, "partida" pasa a ser False
                else:
                    partida = False
                    break
            else:
                # Vemos si no quedan caracteres "_" lo cual significa que se logro
                # completar la palabra
                completado = oracion_transformada.find("_")
                if completado == -1:
                    print("Enhorabuena!, adivinaste la oracion!")
                    print(oracion_aleatoria)
                    print()
                    print("------------------------------------------------")
                    print("Deseas volver a jugar (Y/N)?: ")
                    if verificar_opcion():
                        print()
                        break
                    else:
                        partida = False
                        break

    print("Gracias pr jugar!")

adivina_la_oracion()
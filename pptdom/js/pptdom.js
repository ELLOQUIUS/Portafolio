let ataquejugador;
let ataquepc;
let gano=0;
let perdio=0;

function iniciarjuego(){
    let btnjugador = document.getElementById('btnjugador')
    btnjugador.addEventListener('click',seleccionarJugada)

    let sectionReiniciar = document.getElementById('btnreiniciar')
    sectionReiniciar.style.display = 'none'

    let btnreiniciar = document.getElementById('btnreiniciar')
    btnreiniciar.addEventListener('click',reiniciarJuego)
}

function seleccionarJugada(){
    let piedra = document.getElementById("piedra")
    let papel = document.getElementById("papel")
    let tijeras = document.getElementById("tijeras")
    let opJugador = document.getElementById("opJugador")

    if(piedra.checked){
        opJugador.innerHTML = '<img src="img/piedra.png" alt="piedra"></img>'
        ataquejugador = 1;
        seleccionarPC()
    }else if(tijeras.checked){
        opJugador.innerHTML = '<img src="img/papel.png" alt="papel"></img>'
        ataquejugador = 2;
        seleccionarPC()
    }else if(papel.checked){
        opJugador.innerHTML = '<img src="img/tijeras.png" alt="tijeras"></img>'
        ataquejugador = 3;
        seleccionarPC()
    }else{
        alert("No seleccionaste una jugada")
    }

   //alert("selecciona tu jugada")
}

function seleccionarPC(){
    let ataqueAleatorio = aleatorio(1,3);
    let opPc = document.getElementById('opPc');
    
    if(ataqueAleatorio == 1){
        opPc.innerHTML = '<img src="img/piedra.png" alt="piedra"></img>'
        ataquepc = 1
    }else if(ataqueAleatorio == 2){
        opPc.innerHTML = '<img src="img/papel.png" alt="papel"></img>'
        ataquepc = 2
    }else{
        opPc.innerHTML = '<img src="img/tijeras.png" alt="tijeras"></img>'
        ataquepc = 3
    }
    combate()
}

function combate(){
    let scoreJugador = document.getElementById('score-jugador')
    let scorePc= document.getElementById('score-pc')

    if(ataquepc==ataquejugador){
        console.log(ataquejugador)
        console.log(ataquepc)
        crearMensaje("empate");
    }else if(ataquepc==1){
        if(ataquejugador==2){
            crearMensaje("ganaste");
            gano++;
            scoreJugador.innerHTML = gano;
        }else{
            crearMensaje("perdiste");
            perdio++;
            scorePc.innerHTML = perdio;
        }
    }else if(ataquepc==2){
        if(ataquejugador==1){
            crearMensaje("perdiste");
            perdio++;
            scorePc.innerHTML = perdio;
        }else{
            crearMensaje("ganaste");
            gano++;
            scoreJugador.innerHTML = gano;
        }
    }else{
        if(ataquejugador==1){
            crearMensaje("ganaste");
            gano++;
            scoreJugador.innerHTML = gano;
        }else{
            crearMensaje("perdiste");
            perdio++;
            scorePc.innerHTML = perdio;
        }
    }
    revisarScore();
}

function revisarScore(){
    if(gano == 3){
        crearMensajeFinal('Felicitaciones, ganaste')
    }else if(perdio == 3){
        crearMensajeFinal('Perdiste el juego')
    }
}

function crearMensajeFinal(resultadoFinal){
    let resultadoID = document.getElementById('resultado')
    resultadoID.innerHTML = resultadoFinal

    let btnjugador = document.getElementById('btnjugador')
    btnjugador.disabled = true

    let sectionReiniciar = document.getElementById('btnreiniciar')
    sectionReiniciar.style.display='block'
}

function reiniciarJuego(){
    location.reload()
}

function crearMensaje(resultado){
    let resultadoID = document.getElementById('resultado')
    resultadoID.innerHTML = resultado
}

function aleatorio(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)+ min);
}

window.addEventListener("load",iniciarjuego)


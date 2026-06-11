const palavras = [
    "COMPUTADOR",
    "PROGRAMACAO",
    "ALGORITMO",
    "INTERNET",
    "FACULDADE",
    "SISTEMA",
    "SOFTWARE",
    "HARDWARE",
    "DESENVOLVIMENTO",
    "BANCO"
];

let palavra;
let letrasUsadas;
let tentativas;

const palavraElemento = document.getElementById("palavra");
const tentativasElemento = document.getElementById("tentativas");
const usadasElemento = document.getElementById("usadas");
const mensagemElemento = document.getElementById("mensagem");
const formulario = document.getElementById("form");
const inputLetra = document.getElementById("letra");
const botaoReiniciar = document.getElementById("reiniciar");

function iniciarJogo() {

    palavra = palavras[
        Math.floor(Math.random() * palavras.length)
    ];

    letrasUsadas = [];
    tentativas = 6;

    mensagemElemento.innerHTML = "";
    botaoReiniciar.style.display = "none";
    formulario.style.display = "block";

    atualizarTela();
}

function atualizarTela() {

    let exibicao = "";

    for(let letra of palavra){

        if(letrasUsadas.includes(letra)){
            exibicao += letra + " ";
        }else{
            exibicao += "_ ";
        }

    }

    palavraElemento.textContent = exibicao;

    tentativasElemento.textContent = tentativas;

    usadasElemento.textContent =
        letrasUsadas.join(", ");

    verificarFim();
}

function verificarFim() {

    const venceu = palavra
        .split("")
        .every(letra => letrasUsadas.includes(letra));

    if(venceu){

        mensagemElemento.innerHTML =
            "<div class='venceu'>Você venceu!</div>";

        finalizarJogo();
        return;
    }

    if(tentativas <= 0){

        mensagemElemento.innerHTML =
            `<div class='perdeu'>
                Você perdeu!<br>
                Palavra: ${palavra}
            </div>`;

        finalizarJogo();
    }
}

function finalizarJogo() {

    formulario.style.display = "none";
    botaoReiniciar.style.display = "inline-block";
}

formulario.addEventListener("submit", function(event){

    event.preventDefault();

    const letra =
        inputLetra.value.toUpperCase().trim();

    if(letra === ""){
        return;
    }

    if(letrasUsadas.includes(letra)){

        alert("Essa letra já foi utilizada!");

        inputLetra.value = "";
        return;
    }

    letrasUsadas.push(letra);

    if(!palavra.includes(letra)){
        tentativas--;
    }

    inputLetra.value = "";

    atualizarTela();
});

botaoReiniciar.addEventListener(
    "click",
    iniciarJogo
);

iniciarJogo();
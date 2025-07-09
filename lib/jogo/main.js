import { Mapa } from "./mapa/mapa.js";
import { Jogador } from "./entidades/jogador/jogador.js";

customElements.define('mapa-principal', Mapa);
customElements.define('entidade-jogador', Jogador);

const mapa = new Mapa();
const jogador = new Jogador();
const teclas = {};

document.body.appendChild(mapa);
mapa.appendChild(jogador);

//moveset

atualizarMovimento();

document.addEventListener("keydown", (e) => {
    teclas[e.key.toLowerCase()] = true;
});

document.addEventListener("keyup", (e)=>{
    teclas[e.key.toLowerCase()] = false;
});

function atualizarMovimento() {
    const movimento = 3;

    if (teclas["w"]) {
        jogador.reposicionar(movimento, "w");
    }
    if (teclas["s"]) {
        jogador.reposicionar(movimento, "s");
    }
    if (teclas["d"]) {
        jogador.reposicionar(movimento, "d");
    }
    if (teclas["a"]) {
        jogador.reposicionar(movimento, "a");
    }

    requestAnimationFrame(atualizarMovimento);
}
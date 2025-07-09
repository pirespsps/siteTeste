import { EntidadeGen } from "../EntidadeGen.js";
import { Range } from "./range.js";

customElements.define("range-jogador",Range);

export class Jogador extends EntidadeGen {

    constructor() {
        super();

        this.dano = 999;
        this.range = new Range();
        this.posicao = { x: 640, y: 250 };

        this.style.position = "absolute";
        this.style.display = "block";
        this.style.backgroundColor = "red";
        this.style.height = "2vw";
        this.style.width = "4vh";
        this.style.transition = "transform 50ms ease-in-out";
        this.style.border = "solid 2px";

        this.atualizarPosicao();

        this.appendChild(this.range);
    }

    reposicionar(movimento, tecla) {

        switch (tecla) {
            case ("w"):
                if (this.posicao.y > 14.8) {
                    this.posicao.y -= movimento * this.velocidade;
                    break;
                } else {
                    break;
                }

            case ("s"):
                if (this.posicao.y < 536) {
                    this.posicao.y += movimento * this.velocidade;
                    break;
                } else {
                    break;
                }

            case ("d"):
                if (this.posicao.x < 1285) {
                    this.posicao.x += movimento * this.velocidade;
                    break;
                } else {
                    break;
                }

            case ("a"):
                if (this.posicao.x > 13) {
                    this.posicao.x -= movimento * this.velocidade;
                    break;
                } else {
                    break;
                }
        }
        this.atualizarPosicao();
    }

    atualizarPosicao() {
        let x = this.posicao.x - this.offsetWidth / 2;
        let y = this.posicao.y - this.offsetHeight / 2;

        this.style.transform = `translate(${x}px, ${y}px)`;
    }

}

export class EntidadeGen extends HTMLElement{

    constructor(){
        super();

        this.vida = 100;
        this.velocidade = 1;
        this.dano = 25;
        this.posicao = {x:200, y:200};
    }

}
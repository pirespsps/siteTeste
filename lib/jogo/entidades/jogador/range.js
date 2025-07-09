
export class Range extends HTMLElement{

    constructor(){
        super();

        this.raio = 50;

        this.style.position = "absolute";
        this.style.borderRadius = "1000px";
        this.style.borderWidth = "2px";
        this.style.borderColor = "blue";
        this.style.border = "solid blue 2px"
        this.style.padding = this.raio + "px";
    }

}
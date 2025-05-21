
document.body.querySelectorAll(".disco").forEach(element => {

    let parent = element.parentElement;

    element.addEventListener("mouseover", (e)=>{
        e.preventDefault();
        parent.setAttribute("style","background-color:rgb(55,55,55)");
    });
    element.addEventListener("mouseleave",(e)=>{
        e.preventDefault();
        parent.setAttribute("style","background-color:initial");
    });
});
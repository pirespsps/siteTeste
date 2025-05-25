
document.body.querySelectorAll(".disco").forEach(element => {

    let parent = element.parentElement;

    element.addEventListener("mouseover", (e)=>{
        e.preventDefault();
        parent.setAttribute("style","background-color:rgb(56,56,56)");
    });
    element.addEventListener("mouseleave",(e)=>{
        e.preventDefault();
        parent.setAttribute("style","background-color:black");
    });
});
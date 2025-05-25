var counter = 1;

var tracks = document.getElementsByName("track[]");
var divTrack = document.getElementById("tracks");

Array.from(tracks).forEach(element => {
    addFocusEvents(element);
})

function addFocusEvents(element) {

    element.addEventListener("focusout", (e) => {

        let value = e.target.value.trim();
        let id = e.target.id;

        if (value != "" && id == "track" + counter) {
            counter++;

            let label = document.createElement("label");
            label.htmlFor = "track" + counter;
            label.innerHTML = `Track ${counter} `;
            label.setAttribute("style","opacity:0.4");

            let input = document.createElement("input");
            input.setAttribute("style","opacity:0.4");
            input.placeholder = "Título...."
            input.type = "text";
            input.id = "track" + counter;
            input.name = "track[]";

            input.addEventListener("focusin",(f)=>{
                label.setAttribute("style","opacity:1");
                input.setAttribute("style","opacity:1");
            })

            addFocusEvents(input);

            divTrack.appendChild(label);
            divTrack.appendChild(input);

            label.scrollIntoView({behavior:"smooth",block:"start",inline:"nearest"});
        }
    })
}
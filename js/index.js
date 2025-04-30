
document.addEventListener("DOMContentLoaded", ()=>{
    let options = document.getElementsByClassName("option");

    for(let i=0; i<options.length; i++){
        let elt = options[i];
        let cross = elt.querySelector("svg");
        elt.addEventListener("click", () => {
            if(elt.classList.contains("selected")){ 
                elt.classList.remove("selected"); cross.classList.add("hidden");
                deleteFromForm(elt.getAttribute("name"), elt.getAttribute("value"))
            }
            else { 
                elt.classList.add("selected"); cross.classList.remove("hidden"); 
                addToForm(elt.getAttribute("name"), elt.getAttribute("value"))
            }
        });
    } 
});
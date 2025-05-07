document.addEventListener("DOMContentLoaded", () => {
    let filters = document.getElementsByClassName("filter");
    
    for (let i = 0; i < filters.length; i++) {
        let h1 = filters[i].querySelectorAll("h1");
        let div = filters[i].querySelectorAll("div");

        h1[0].addEventListener("click", () => {
            div[0].classList.toggle("hidden");
        });
    }
});

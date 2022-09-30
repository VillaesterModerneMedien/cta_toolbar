
window.onload = function () {
    let toggleButton = document.getElementById("toggle") ;
    let menu = document.getElementById("mobileMenu");

    toggleButton.addEventListener("click", function()
    {
        menu.classList.toggle("show");
        this.classList.toggle("toggleStat");
    });

}




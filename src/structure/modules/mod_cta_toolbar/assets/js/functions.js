
window.onload = function () {
    let toggleButton = document.getElementById("toggle") ;
    let toggleOpen = document.getElementById("toggleOpen") ;
    let toggleClose = document.getElementById("toggleClose") ;
    let menu = document.getElementById("mobileMenu");
    let toggleButtonDesk = document.getElementById("toggleDesk") ;
    let toggleOpenDesk = document.getElementById("toggleOpenDesk") ;
    let toggleCloseDesk = document.getElementById("toggleCloseDesk") ;
    let menuDesk = document.getElementById("desktopMenu");


    toggleButton.addEventListener("click", function()
    {
        menu.classList.toggle("show");
        toggleOpen.classList.toggle("hide");
        toggleClose.classList.toggle("hide");
    });

    toggleButtonDesk.addEventListener("click", function()
    {
        menuDesk.classList.toggle("show");
        toggleOpenDesk.classList.toggle("hide");
        toggleCloseDesk.classList.toggle("hide");
    });


}




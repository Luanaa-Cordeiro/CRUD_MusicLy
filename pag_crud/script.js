const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

hamBurger.addEventListener("click", function () {
    sidebar.classList.toggle("expand");
    // Salvando o estado da barra lateral no localStorage
    if (sidebar.classList.contains("expand")) {
        localStorage.setItem("sidebarState", "expand");
    } else {
        localStorage.setItem("sidebarState", "");
    }
});

// Restaurando o estado da barra lateral
window.addEventListener("load", function () {
    const savedState = localStorage.getItem("sidebarState");
    if (savedState === "expand") {
        sidebar.classList.add("expand");
    }
});


//const hamBurger = document.querySelector(".toggle-btn");
//const sidebar = document.querySelector("#sidebar");

//hamBurger.addEventListener("click", function () {
 // document.querySelector("#sidebar").classList.toggle("expand");
//});

//sidebar.classList.add("expand");

//const myModal = document.getElementById('myModal')
//const myInput = document.getElementById('myInput')

//myModal.addEventListener('shown.bs.modal', () => {
  //myInput.focus()
//})
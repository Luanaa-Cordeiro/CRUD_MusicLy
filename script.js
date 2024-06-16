const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

hamBurger.addEventListener("click", function () {
    sidebar.classList.toggle("expand");

    if (sidebar.classList.contains("expand")) {
        localStorage.setItem("sidebarState", "expand");
    } else {
        localStorage.setItem("sidebarState", "");
    }
});

window.addEventListener("load", function () {
    const savedState = localStorage.getItem("sidebarState");
    if (savedState === "expand") {
        sidebar.classList.add("expand");
    }
});

var data = [{
    values: [19, 26, 55],
    labels: ['Residential', 'Non-Residential', 'Utility'],
    type: 'pie'
  }];
  
  var layout = {
    height: 400,
    width: 500
  };
  
  Plotly.newPlot('myDiv', data, layout);

  


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
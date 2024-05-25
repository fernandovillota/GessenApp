const signinbtn = document.getElementById("signin");
const signupbtn = document.getElementById("signup");
const fistform = document.getElementById("form1");
const secondform = document.getElementById("form2");
const container = document.querySelector(".container");

signinbtn.addEventListener("click", () =>{
    container.classList.remove("right-panel-active");
});

signupbtn.addEventListener("click", () =>{
    container.classList.add("right-panel-active");
});

fistform.addEventListener("submit", (e) => e.preventDefault());
secondform.addEventListener("submit", (e) => e.preventDefault());
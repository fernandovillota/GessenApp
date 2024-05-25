let titleprovisional= document.title
window.addEventListener("blur", () =>{
    titleprovisional=document.title
    document.title= "Touch me,plisssss :("
})
window.addEventListener("focus", () =>{
    document.title = titleprovisional
})
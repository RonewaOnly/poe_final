/****the Login slide forms**** */
var loginBtn = document.getElementById("btnLog");
var signBtn = document.getElementById("btnsign");
loginBtn.addEventListener('click', function (e) {
    document.getElementById("login").style.display = "block";
    document.getElementById("SignUp").style.display ="none";
    e.preventDefault();
});
signBtn.addEventListener('click', function (e) {
    document.getElementById("login").style.display = "none";
    document.getElementById("SignUp").style.display ="block";
    e.preventDefault();
});
/*****Home page menu icon list*** */
var btnMenu = document.getElementsByClassName('btn-menu');
var navBar=document.querySelector('.UserList');

btnMenu.addEventListener("click",()=>{
    alert("helloe");
    if(navBar.style.display =='none'){
        navBar.style.display =='block';
    }else{
        navBar.style.display='none';
    }
});
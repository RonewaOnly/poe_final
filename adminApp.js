var timeGate = document.getElementById("time");
var dateGate = document.getElementById("todayDate");
var date = new Date(); /* creating object of Date class */
var datetime = date.getDate() + "/"
    + (date.getMonth() + 1) + "/"
    + date.getFullYear()

dateGate.innerText = datetime

function currentTime() {
    var date1 = new Date();
    var hour = date1.getHours();
    var min = date1.getMinutes();
    var sec = date1.getSeconds();
    hour = updateTime(hour);
    min = updateTime(min);
    sec = updateTime(sec);
    timeGate.innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
    var t = setTimeout(function () { currentTime() }, 1000); /* setting timer */
}
function updateTime(k) {
    if (k < 10) {
        return "0" + k;
    }
    else {
        return k;
    }
}
currentTime(); /* calling currentTime() function to initiate the process */
/****Start of the menu option change***** */
var home = document.getElementById("clickHome");//this goes to the home section
var homeSetting = document.getElementById("clickSetting");//this goes to the home admin setting
var homeBookAdd = document.getElementById("clickBooks");//this goes to the home add books section...
var CusView = document.getElementById("clickCustomers");
home.addEventListener("click", () => {
    var section = document.getElementById("homeadmin");
    section.style.display = "block";
    document.getElementById("addBookFunction").style.display = "none";
    document.getElementById("customerViewing").style.display = "none";

});
CusView.addEventListener("click", () => {
    var section = document.getElementById("customerViewing");
    section.style.display = "block";
    document.getElementById("addBookFunction").style.display = "none";
    document.getElementById("homeadmin").style.display = "none";

});
homeBookAdd.addEventListener("click", () => {
    var section = document.getElementById("addBookFunction");
    section.style.display = "block";
    document.getElementById("homeadmin").style.display = "none";
    document.getElementById("customerViewing").style.display = "none";
});
/****End of the menu option change***** */

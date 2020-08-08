function hourglass() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "";
  setTimeout(function () {
      a.innerHTML = "";
    }, 100);
  setTimeout(function () {
      a.innerHTML = "";
    }, 200);
  setTimeout(function () {
      a.innerHTML = "";
    }, 300);
  setTimeout(function () {
      a.innerHTML = "";
    }, 400);    
    }
hourglass();
setInterval(hourglass, 500);
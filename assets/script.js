function myFunction() {
  var x = document.getElementById("myTopnav");
  var y = document.getElementById("map");
  var z = document.getElementById("head");
  if (x.className === "topnav") {
    x.className += " responsive";
    y.className += "responsive";
    z.className += "responsive";
  } else {
    x.className = "topnav";
    y.className = "map";
    z.className = "head";
  }
}

function showStop(x){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("changes").innerHTML = this.responseText;
  }
  xhttp.open("GET", "box.php?q="+x);
  xhttp.send();
}

function showJadwal(x){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("schedChanges").innerHTML = this.responseText;
  }
  xhttp.open("GET", "jadwal.php?q="+x);
  xhttp.send();
}

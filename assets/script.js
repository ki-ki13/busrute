
function showJadwal(x){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("schedChanges"+x).innerHTML = this.responseText;
  }
  xhttp.open("GET", "https://rutebus-bantul13.herokuapp.com/jadwal.php?q="+x);
  //xhttp.open("GET", "jadwal.php?q="+x);
  xhttp.send();
}

var array = [];
$('.rute').each(function() {
       array.push($(this).attr('data-id'));
})
console.log(array);

for(let i = 0; i<array.length; i++){
  // var j = array[i];
  // console.log(j);
  $('#rute' + array[i]).each(function(){
    $(this).on('click',function(){
      $('#muncul'+array[i]).slideToggle();
    });
  });
}


$(function() {
  $('#rute' + array[0]).click();
});


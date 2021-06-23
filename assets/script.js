
function showJadwal(x){
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("schedChanges"+x).innerHTML = this.responseText;
  }
  xhttp.open("GET", "jadwal.php?q="+x);
  xhttp.send();
}

var array = [];
$('.rute').each(function() {
       array.push($(this).attr('data-id'));
})
console.log(array);

for(let i = 1; i<=array.length; i++){
  var j = 'rute'+i;
  console.log(j);
  $('#rute' + i).each(function(){
    $(this).on('click',function(){
      $('#muncul'+i).slideToggle();
    });
  });
}

$(function() {
  $("#rute1").click();
});


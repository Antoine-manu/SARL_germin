function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function notif(id) {
    const e = document.getElementById(id); 
    e.classList.toggle("none");
  }

 var logo =  document.getElementById('logo')
 logo.addEventListener('click', function(){
    const h = document.getElementById('displaymenu'); 
    h.classList.toggle("none");
 })

  function getimage(){
    var imageinput = document.getElementById('fileToUpload')
   var file = imageinput.files[0]
    var imageTarget = document.getElementById('imageTarget')
    var reader = new FileReader()
    reader.onloadend = function() {
      imageTarget.src=reader.result
    }
    reader.readAsDataURL(file);
    
 }

 function showdesc(){
  const e = document.getElementById('fiche2'); 
  e.classList.add("none");
  const f = document.getElementById('fiche1'); 
  f.classList.remove("none");
 }
 function showft(){
  const e = document.getElementById('fiche1'); 
  e.classList.add("none");
  const f = document.getElementById('fiche2'); 
  f.classList.remove("none");
 }
 
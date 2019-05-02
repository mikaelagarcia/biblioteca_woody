function abrirDiv(id){
  var contentTab = document.getElementsByClassName("contentTab");


  for(i = 0; i < contentTab.length; i++){
    contentTab[i].style.display="none";
  }
  document.getElementById(id).style.display="block";

}





function clicar() {
   var qtd = document.getElementById("qtd").value;
   var Valor = qtd*114.89;

   document.getElementById("resultado").innerHTML="R$ "+Valor+"";
}
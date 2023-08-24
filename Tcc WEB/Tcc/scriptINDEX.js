	 const imgs = document.getElementById("imgCarro");
  const img = document.querySelectorAll("#imgCarro img");

  let idx = 0;

  function carroselMOUSE() {
    idx++;
    if (idx > 4){
      idx = 0;
    }
      imgs.style.transform = `translateX(${-idx * 500}px)`;
    }

  setInterval(carroselMOUSE,1800);

/**/

  const imgs2 = document.getElementById("imgGAB");
  const img2 = document.querySelectorAll("#imgGAB img2");

  let idx2 = 0;

  function carroselGAB() {
    idx2++;
    if (idx2 > 5){
      idx2 = 0;
    }
      imgs2.style.transform = `translateX(${-idx2 * 500}px)`;
    }

  setInterval(carroselGAB,1800);

/**/

  const imgs3 = document.getElementById("imgPROC");
  const img3 = document.querySelectorAll("#imgPROC img3");

  let idx3 = 0;

  function carroselPROC() {
    idx3++;
    if (idx3 > 3){
      idx3 = 0;
    }
      imgs3.style.transform = `translateX(${-idx3 * 500}px)`;
    }

  setInterval(carroselPROC,1800);

/**/

  const imgs4 = document.getElementById("imgNINT");
  const img4 = document.querySelectorAll("#imgNINT img4");

  let idx4 = 0;

  function carroselNINT() {
    idx4++;
    if (idx4 > 3){
      idx4 = 0;
    }
      imgs4.style.transform = `translateX(${-idx4 * 500}px)`;
    }

  setInterval(carroselNINT,1800);

/**/

  const imgs5 = document.getElementById("imgMONI");
  const img5 = document.querySelectorAll("#imgMONI img5");

  let idx5 = 0;

  function carroselMONI() {
    idx5++;
    if (idx5 > 4){
      idx5 = 0;
    }
      imgs5.style.transform = `translateX(${-idx5 * 500}px)`;
    }

  setInterval(carroselMONI,1800);

/**/
  const imgs6 = document.getElementById("imgNOTE");
  const img6 = document.querySelectorAll("#imgNOTE img6");

  let idx6 = 0;

  function carroselNOTE() {
    idx6++;
    if (idx6 > 3){
      idx6 = 0;
    }
      imgs6.style.transform = `translateX(${-idx6 * 500}px)`;
    }

  setInterval(carroselNOTE,1800);

/**/


  function verificaTipo(tipo) {
      if (tipo=="mouse") {
        document.getElementById("det-mouse").style.display = "inline";
        document.getElementById("det-gabinete").style.display = "none";
        document.getElementById("det-processador").style.display = "none";
        document.getElementById("det-nintendo").style.display = "none";
        document.getElementById("det-monitor").style.display = "none";
        document.getElementById("det-notebook").style.display = "none";

      } else if (tipo=="gabinete") {
        document.getElementById("det-mouse").style.display = "none";
        document.getElementById("det-gabinete").style.display = "inline";
        document.getElementById("det-processador").style.display = "none";
        document.getElementById("det-nintendo").style.display = "none";
        document.getElementById("det-monitor").style.display = "none";
        document.getElementById("det-notebook").style.display = "none";        
      } else if (tipo=="processador") {
        document.getElementById("det-mouse").style.display = "none";
        document.getElementById("det-gabinete").style.display = "none";
        document.getElementById("det-processador").style.display = "inline";
        document.getElementById("det-nintendo").style.display = "none";
        document.getElementById("det-monitor").style.display = "none";
        document.getElementById("det-notebook").style.display = "none"; 
      } else if (tipo == "nintendo") {
        document.getElementById("det-mouse").style.display = "none";
        document.getElementById("det-gabinete").style.display = "none";
        document.getElementById("det-processador").style.display = "none";
        document.getElementById("det-nintendo").style.display = "inline";
        document.getElementById("det-monitor").style.display = "none";
        document.getElementById("det-notebook").style.display = "none"; 
      } else if (tipo == "monitor") {
        document.getElementById("det-mouse").style.display = "none";
        document.getElementById("det-gabinete").style.display = "none";
        document.getElementById("det-processador").style.display = "none";
        document.getElementById("det-nintendo").style.display = "none";
        document.getElementById("det-monitor").style.display = "inline";
        document.getElementById("det-notebook").style.display = "none"; 
      } else if (tipo == "notebook") {
        document.getElementById("det-mouse").style.display = "none";
        document.getElementById("det-gabinete").style.display = "none";
        document.getElementById("det-processador").style.display = "none";
        document.getElementById("det-nintendo").style.display = "none";
        document.getElementById("det-monitor").style.display = "none";
        document.getElementById("det-notebook").style.display = "inline"; 
      }
    }

    function configPagina() {
      document.getElementById("det-mouse").style.display = "inline";
      document.getElementById("det-gabinete").style.display = "none";
      document.getElementById("det-processador").style.display = "none";
      document.getElementById("det-nintendo").style.display = "none";
      document.getElementById("det-monitor").style.display = "none";
      document.getElementById("det-notebook").style.display = "none";
    }

document.getElementById("login").addEventListener("click",()=>{
  document.getElementById("form").classList.toggle("show");
     },false)
    
     document.getElementById("closebtn").addEventListener("click",()=>{
      document.getElementById("accountcontent").style.width="0%";
     },false);
     document.getElementById("orhisbtn").addEventListener("click",()=>{
   document.getElementById("orhis").style.width="65%";
  
     },false);
     document.getElementById("orclobtn").addEventListener("click",()=>{
      document.getElementById("orhis").style.width="0%";
     },false);
   
    document.getElementById("male").addEventListener("click",()=>{
      document.getElementById("malecol").style.display="block";
      document.getElementById("femalecol").style.display="none";
      document.getElementById("all").style.display="none";
      document.getElementById("searchitem").style.display="none";
  
  
    },false)
  
  document.getElementById("female").addEventListener("click",()=>{
      document.getElementById("malecol").style.display="none";
      document.getElementById("femalecol").style.display="block";
      document.getElementById("all").style.display="none";
      document.getElementById("searchitem").style.display="none";
  
  
    },false)
    document.getElementById("allbtn").addEventListener("click",()=>{
      document.getElementById("malecol").style.display="none";
      document.getElementById("femalecol").style.display="none";
      document.getElementById("all").style.display="block";
      document.getElementById("searchitem").style.display="none";
  
  
    },false)
    
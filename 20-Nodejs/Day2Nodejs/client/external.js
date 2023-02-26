window.addEventListener("load",()=>{

 let btnObject=document.querySelector("button");
 btnObject.onclick=async function(){

    try{
        let repsonse=await fetch("http://localhost:8080");
        let data=await repsonse.json();
        console.log(data);
    }catch(error)
    {
        console.log(error);
    }

 }

});
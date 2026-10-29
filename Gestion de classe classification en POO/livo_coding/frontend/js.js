let Form_js = document.getElementById("form_HTML");
let tbody_js = document.getElementById("tbody_HTML");

function show()
{
    tbody_js.innerHTML = "" ;
    fetch("../backend/api.php")
    .then(res=>res.json())
    .then(data_js=>{
        data_js.data.forEach(element => {
            let mini_tbody_js = document.createElement('tr');
            mini_tbody_js.innerHTML = `
                <td class="p-4 text-sm font-semibold text-gray-500 uppercase">${element.id}</td>
                <td class="p-4 text-sm font-semibold text-gray-500 uppercase">${element.name}</td>
                <td class="p-4 text-sm font-semibold text-gray-500 uppercase">${element.Couleur}</td>
                <td class="p-4 text-sm font-semibold text-gray-500 uppercase">${element.Actions}</td>
            `;
            tbody_js.appendChild(mini_tbody_js);
        });

    })
    .catch(error =>{
        console.log(error);
    })
}

function add()
{
    addEventListener('submit',(e)=>{
        e.preventDefault();
        let name_js = document.getElementById("name_HTML").value ;
        let Couleur_js = document.getElementById("Couleur_HTML").value ;
        let Actions_js = document.getElementById("Actions_HTML").value ;
        let data_data = ({
            id : Date.now() ,
            name : name_js ,
            Couleur : Couleur_js  ,
            Actions : Actions_js 
        });
      fetch("../backend/api.php",{method : 'POST' , headers : {'Content-Type': 'application/json'} , body : JSON.stringify(data_data)})
      .then(res =>res.json())
      .then(data_a=>{
        console.log(data_a);
        show();
        e.preventDefault();
      })
      .catch(error =>{
        console.log(error);
      })
    })
    
}

document.addEventListener("DOMContentLoaded" , function(){
 show();
 add();
});
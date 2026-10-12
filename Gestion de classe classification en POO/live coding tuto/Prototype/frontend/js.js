let form_11 = document.getElementById("form_1");


function show()
{
    fetch("../backend/api.php")
    .then(res=>res.json())
    .then(data_11=>{
        let result_1  = document.getElementById("result") ;
        result_1.innerHTML = "" ;
        data_11.data.forEach(element => {
            let mini_container = document.createElement('tr');
            mini_container.innerHTML = `
            <td class="border border-black p-3">${element.id}</td>
            <td class="border border-black p-3">${element.name}</td>
            <td class="border border-black p-3">${element.hobby}</td>
            `;
            result_1.appendChild(mini_container);
        });
    })
    .catch(error =>{
        console.log("error ",error);
    })
}
function  add_data()
{
    form_11.addEventListener('submit',(e)=>{
     e.preventDefault();
     let name_1 = document.getElementById("name_input") .value;
     let hobby_1 = document.getElementById("hobby_input").value;
     let data_120 = ({
        id : Date.now(),
        name : name_1 ,
        hobby : hobby_1
     });
     fetch("../backend/api.php",{
        method: 'POST' ,
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data_120)
     })
     .then(res=>res.json())
     .then(data=>{
        console.log(data);
        form_11.reset();
        show();
     })
     .catch(error =>{
        console.log(error);
     })
    });
}
document.addEventListener('DOMContentLoaded',function(){
 show();
 add_data();
});
let id_taker = null ;
let form_11 = document.getElementById("form_1");
function show()
{

    let tbody_1 = document.getElementById('result');
    tbody_1.innerHTML = "" ;
    fetch("../backend/api.php")
    .then(res=>res.json())
    .then(data_11 =>{
        data_11.data.forEach(element => {
            let container_mini = document.createElement('tr');
            container_mini.innerHTML = `
             <td>${element.id}</td>
             <td>${element.name}</td>
             <td>${element.age}</td>
             <td>
              <button class="button_edit">edit</button>
             </td>

            `;
            let button_edit_1 = container_mini.querySelector(".button_edit");
            button_edit_1.addEventListener('click',()=>
            {
             document.getElementById("name_input").value = element.name ;
             document.getElementById("age_input").value = element.age ;
             id_taker = element.id ;
            });
            tbody_1.appendChild(container_mini); 
        });
    })
    .catch(error => {
        console.log("error 111" , error);
    })
}
function add_data()
{

    form_11.addEventListener('submit',(e)=>
    {
        e.preventDefault();
        let name_11 = document.getElementById('name_input').value;
        let age_11 = document.getElementById('age_input').value;

        if(id_taker !== null)
        {
            fetch("../backend/api.php",{
                method: 'PUT' ,
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    id : id_taker ,
                    name : name_11 ,
                    age : age_11
                })
            })
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
                id_taker = null;
                form_11.reset();
                show();
            })
            .catch(error =>{
                console.log(error);
            })
        }
        else
        {
            let name_11 = document.getElementById('name_input').value;
            let age_11 = document.getElementById('age_input').value;
            fetch("../backend/api.php",{
                method: 'POST' ,
                headers: {"Content-Type": "application/json"},
                body: JSON.stringify({
                    id : Date.now(),
                    name : name_11 ,
                    age : age_11
                })
            })
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
                show();
            })
            .catch(error =>{
                console.log(error);
            })
        }

    });
}
document.addEventListener('DOMContentLoaded',function()
{
    add_data();
    show();
});
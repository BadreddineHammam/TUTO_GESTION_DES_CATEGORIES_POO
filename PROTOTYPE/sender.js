let id_category_1 = document.getElementById("id_category");
let form_category_1 = document.getElementById("form_category");
let name_1 = document.getElementById("name");
let category_1 = document.getElementById("category");



//show all data 
function show_all()
{
    fetch('bachend11/api.php')
    .then(response => response.json() )
    .then(data_1 => {
        let container = document.getElementById("result_final");
        container.innerHTML = '' ;
        data_1.data.forEach( element => {
           let container_mini = document.createElement("tr");
           console.log(data_1);
           container_mini.innerHTML = `
           <td>${element.id}</td>
           <td>${element.name}</td>
           <td>${element.category}</td>
           `
           ;
           container.appendChild(container_mini);
        });
        
      
    });

}

// add data

form_category_1.addEventListener('submit' , (e) => {

 e.preventDefault();
 let Data_11 = 
 {
    name: name_1.value ,
    category : category_1.value
 };

 fetch('bachend11/api.php' , 
 {
    method : 'POST' ,
    headers : {'Content-Type': 'application/json'},
    body  : JSON.stringify(Data_11)
 })
 .then(response => response.json())
 .then(data_1 => 
    {
        console.log("the data that sended => " , data_1);
        form_category_1.reset();
        show_all()
    })
    .catch(error => 
        {
           console.log("error dyalna " , error) ;
        });
});
document.addEventListener('DOMContentLoaded' ,show_all );
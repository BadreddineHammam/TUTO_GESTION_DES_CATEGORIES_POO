let name_HTML = document.getElementById("name");
let result =  document.getElementById("categoryList");
let form = document.getElementById("categoryForm");
let spinner = document.getElementById("spinner");
let botona = document.getElementById("botona");
let message = document.getElementById("message");


function show()
{
    fetch("../controller/contro.php")
    .then(res=>{
        if(!res.ok)
        {
            throw new Error("response not found ");
        }
        return res.json() ;
    })
    .then(data=>{
        result.replaceChildren();

        console.log(data);
        data.forEach(element => {
            let result_junior = document.createElement('tr');
            result_junior.innerHTML = `<td>${element.name}</td>`;
            result.appendChild(result_junior);
        });
    })
    .catch(error =>{

        console.log(error);
    });

}

function add()
{
    form.addEventListener('submit',function(e){
       
        
        e.preventDefault();
        
        spinner.classList.remove("hidden");
        botona.disabled = true ;

        fetch("../controller/contro.php",{method: 'POST' , body: new FormData(form)})
        .then(res =>{
            if(!res.ok)
            {
                throw Error("there is no data came as a response from sender ");
            }
            return res.json();
        })
        .then(data=>{
            console.log("Full response:", data);
            console.log("data_junior:", data.data_junior);
            show();
            form.reset();

                if (data["valid??"] === "false") 
                {
                    message.textContent = data.message ;
                    message.className = "bg-red-500 text-white p-3" ;
                }
                else
                {
                    message.textContent = data.message;
                    message.className = "bg-green-500 text-white p-3";
                }

            setTimeout(() => {
                message.textContent = "";
                message.className = "";
            }, 3000);
        })
        .catch(error =>{
            console.log(error);
        })
        .finally(()=>{
            console.log("no one here?");
            
            setTimeout(()=>{
                spinner.classList.add("hidden");
                botona.disabled = false ;
            }, 2000)
            
        });
        
    })
}

addEventListener('DOMContentLoaded',function(){
    show() ;
    add() ;
})
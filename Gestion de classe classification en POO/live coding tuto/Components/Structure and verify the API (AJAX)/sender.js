function show_data()
{
    let result_1 = document.getElementById("result_data");
    result_1.innerHTML = "" ;
    fetch('api.php',
    {
        method : 'GET' 
    })
    .then(res=>res.json())
    .then(data_11 =>{
        console.log(data_11);
        let content = document.createElement('div');
        data_11.data.forEach(element => {
            let content = document.createElement('div');
            content.innerHTML = `
             <h1>${element.id}</h1><br>
             <h1>${element.name}</h1><br>
             <h1>${element.sport}</h1><br>
            `;
            result_1.appendChild(content);
        });
    })
    .catch(error =>{
        console.log("error .",error);
    })
}
document.addEventListener('DOMContentLoaded',show_data);
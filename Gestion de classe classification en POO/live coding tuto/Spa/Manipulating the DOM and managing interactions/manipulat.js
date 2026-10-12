let form_11 = document.getElementById("form_1");
let button_show_1 = document.getElementById("button_show");
let button_hidden_1 = document.getElementById("button_hidden");
function show(){
button_show_1.addEventListener('click' , ()=>{
    form_11.hidden = false ;
});
button_hidden_1.addEventListener('click' ,()=>{
    form_11.hidden = true ;
});
form_11.addEventListener('submit', (e)=>{
 e.preventDefault();
 let name_1 = document.getElementById('name_input').value;
 let result_1 = document.getElementById('result');
 result_1.insertAdjacentHTML('beforeend',`<h2>${name_1}</h2>`);
 form_11.reset();
});
}
document.addEventListener('DOMContentLoaded',show);
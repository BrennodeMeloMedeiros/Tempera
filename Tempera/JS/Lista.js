
var List = document.getElementById("List-Content");
var Btn = document.getElementById("AddItem");


var n = 0.0;


Btn.addEventListener("click", function (){
    /*var Last = document.getElementById('List-Content').lastChild
    var LastId = Last. */
    var i = i + 1.0;
    var newInput ="<div id='0' class='List-Item'>"+
"    <button class='Btn-Del'onclick='Delete()'> "+
"        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z' fill='Red'/></svg>"+
"    </button>"+
"    <input name='Ingredientes' placeHolder='Insira o Ingrediente' list='Ingredientes' class='Item'>"+
"</div>"+
"<datalist id='Ingredientes'>"+
"    <option value='Ingrediente 1'>"+
"    <option value='Ingrediente 2'>"+
"    <option value='Ingrediente 3'>"+
"    <option value='Ingrediente 4'>"+
"    <option value='Ingrediente 5'>"+
"    <option value='Ingrediente 6'>"+
"    <option value='Ingrediente 7'>"+
"    <option value='Ingrediente 8'>"+
"    <option value='Ingrediente 9'>"+
"    <option value='Ingrediente 10'>"+
"    <option value='Ingrediente 11'>"+
"    <option value='Ingrediente n'>"+
"</datalist>";

    List.insertAdjacentHTML('afterbegin', newInput)
})





var Input = document.getElementById("Qtdd");
function Add(){
    Input.value = +Input.value + +1;
    if (Input.value > 99) {
        Input.value = 1
    }
}
function Sub(){
    Input.value = +Input.value - +1;
    if (Input.value < 1) {
        Input.value = 99
    }
}


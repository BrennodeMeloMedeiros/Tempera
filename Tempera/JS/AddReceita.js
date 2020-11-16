// ---------------VARIÁVEIS GLOBAIS--------------
// ---------------VARIÁVEIS GLOBAIS--------------


const form = document.querySelector('form#NovaReceita')
const inputs = form.querySelectorAll('input')
const List = document.querySelector("#ListForm");
let a = 0.0


// ---------------VARIÁVEIS GLOBAIS--------------

// ---------------FUNÇÕES--------------
function addItemList(){
    itemsCount = a++
    // Ascento grave permite a quebra de linha ao declarar qual o conteúdo de uma string, substituindo o "" e ''
    const newItem = `
    <div id="item-`+ itemsCount +`" class="List-Item">
        <div class="Btn-Del" onclick="removeItem(`+ itemsCount +`)"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
        </div>
        <input list='Ingredientes' name="Ingredientes`+ itemsCount +`" type="text" placeHolder="Insira o Ingrediente" class="Item">
    </div>`;
    // O evento "oncahnge" envia o nome do input que foi selecionado e executa a função
    // responsável por conver o nome do input para o id do ingrediente.
    // Já que o id do ingrediente vai vir de um array que usa php, a função "onchange"
    // ira fica na tag script do arquivo .php.
    List.insertAdjacentHTML('beforeend', newItem)    
    adicionarEvento("Ingredientes"+itemsCount)
}
addItemList()


function removeItem(id){
    const itemsRemoveCount = List.childElementCount
    if( itemsRemoveCount >= 4){
        const itemTarget = document.getElementById("item-"+id) 
        const valueTarget = itemTarget.querySelector('input').value
        deletarHiddenInput(valueTarget)
        itemTarget.parentNode.removeChild(itemTarget)
         
     }else {
         alert('A Sua receita deve ter ao menos 1 item!')
    }
}

function viewTargetImage(){
    const imagePainel = document.querySelector('#Image-Painel')
    const image = document.querySelector('[name="image"]').files[0]
    const imageURL = URL.createObjectURL(image)

    imagePainel.style.backgroundImage = `URL(${imageURL})`
}



function noInputErrorIndicator(event){
    const preparo = form.querySelector('#PreparoText')
    const tags = form.querySelector('#Tags')
    let stop = false
    fields = [
        preparo,
        tags
    ]
   
    for(i = 0; i < fields.length; i++){
        if(fields[i].value == " " || fields[i].value == "Tag0" || fields[i].value == null || fields[i].value == "" ){
            fields[i].scrollIntoView()
            fields[i].style.border = '2px solid red'
            stop = true
        }else{
            fields[i].style.border = ''
        }
    }
    return stop
}




function setErrorIndicator(event) {
    const input = event.target
    if(!input.validity.valid){
        event.preventDefault()
        scrollTo(0,0)
        input.style.border = '2px solid red'
    } else{
        input.style.border = ''
    }
   
}
// ---------------FUNÇÕES--------------

// ---------------EVENTOS--------------

form.addEventListener(
    'submit',
    (event) =>{
        if(noInputErrorIndicator(event)
         || validarIngrediente()){
            event.preventDefault()
        }
})


for(input of inputs){
    input.addEventListener(
    'invalid', 
    (event) => {
        event.preventDefault()
        setErrorIndicator(event)
    })
    input.addEventListener(
    'blur',
    (event) => {
    setErrorIndicator(event)
    }
    )
}
// ---------------EVENTOS--------------

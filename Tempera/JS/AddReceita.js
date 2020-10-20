const log = console.log
const List = document.querySelector("#ListForm");
let a = 0.0

function addItemList(){
    itemsCount = a++
    // Ascento grave permite a quebra de linha ao declarar qual o conteúdo de uma string, substituindo o "" e ''
    const newItem = `
    <div id="item-`+ itemsCount +`" class="List-Item">
        <div class="Btn-Del" onclick="removeItem(`+ itemsCount +`)"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
        </div>
        <input list='Ingredientes' name="Ingredientes" type="text" placeHolder="Insira o Ingrediente" class="Item">
    </div>`;
    List.insertAdjacentHTML('beforeend', newItem)    
}
addItemList()


function removeItem(id){
    const itemsRemoveCount = List.childElementCount
    if( itemsRemoveCount >= 4){
        const itemTarget = document.getElementById("item-"+id) 
         itemTarget.parentNode.removeChild(itemTarget)
     }else {
         alert('A Sua receita deve ter ao menos 1 item!')
    }
}

const form = document.querySelector('form')
    const inputs = form.querySelectorAll('input')

function viewTargetImage(){
    const imagePainel = document.querySelector('#Image-Painel')
    const image = document.querySelector('[name="image"]').files[0]
    const imageURL = URL.createObjectURL(image)

    imagePainel.style.backgroundImage = `URL(${imageURL})`
}



function noInputErrorIndicator(event){
    const preparo = form.querySelector('#PreparoText')
    const tags = form.querySelector('#Tags')
    fields = [
        preparo,
        tags
    ]
   
    for(i = 0; i < fields.length; i++){
        if(fields[i].value == " " || fields[i].value == "Tag0" || fields[i].value == null || fields[i].value == "" ){
            fields[i].scrollIntoView()
            fields[i].style.border = '2px solid red'
            event.preventDefault()
        }else{
            fields[i].style.border = ''
        }
    }

}


form.addEventListener(
    'submit',
    (event) =>{
        noInputErrorIndicator(event)
        console.log('entrou')
})

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

for(input of inputs){
    input.addEventListener(
    'invalid', 
    (event) => {
        setErrorIndicator(event)
    })
    input.addEventListener(
    'blur',
    (event) => {
    setErrorIndicator(event)
    }
    )
}

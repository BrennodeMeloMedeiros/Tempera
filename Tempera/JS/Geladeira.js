
const form = document.querySelector('#formList')
const List = form.querySelector('.fridgeContent')
const log = console.log
let a = 0.0
function addItemList(){
    const itemsCount = a++
    const newItem = `
    <div id="item-`+ itemsCount +`" class="List-Item">
        <div class="Btn-Del" onclick="removeItem(`+ itemsCount +`)"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
        </div>
        <input list="Ingredientes" name="Ingredientes" type="text" placeHolder="Insira o Ingrediente" class="Item">
    </div>`;
    List.insertAdjacentHTML('beforeend', newItem) 
}
addItemList()

function removeItem(id){
    const itemsRemoveCount = List.childElementCount
    if( itemsRemoveCount >= 2){
        const itemTarget = document.getElementById("item-"+id)
        log(itemsRemoveCount) 
         itemTarget.parentNode.removeChild(itemTarget)
     }else {
         log(itemsRemoveCount)
         alert('A Sua lista deve ter ao menos 1 item!')
    }
}


function foundItemError(){
    const listItems = document.querySelectorAll('.List-Item');
    let errorItem = false
    
    for(list of listItems) {
        // list = div do item 
        const firstValue = list.querySelector('.Item').value // Input da div, ou seja, onde está o valor do item 
        const firstId = list.id // Id do input 

        const inputsArray = List.querySelectorAll('.Item') // Pega todos o itens da lista denovo 
      //Pega os valores de todos os itens e checka se algum deles, que não o próprio, é igual a outro 
        for(input of inputsArray){
          const secondValue = input.value
          const secondId = input.parentNode.id
         
          if(firstId != secondId && firstValue == secondValue){
              errorItem = true
          } else if(!firstValue){
              errorItem = true
          } else{
          }
        } 

    }
    return errorItem
}



function checkList(event){
    const foundError = foundItemError()
    if(foundError){
        alert('Hey, há algo errado na sua lista, verifique se há algo repetido ou vazio!')
        event.preventDefault()        
    } else {
        alert('Suas alteraçõesforam salvas.')
    }        
} 


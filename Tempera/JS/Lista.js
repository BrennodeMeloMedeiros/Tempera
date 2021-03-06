

const List = document.querySelector("#formList");
const Btn = document.querySelector("#AddItem");
const log = console.log
let a = 0.0



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
    List.insertAdjacentHTML('beforeend', newItem)    
}
addItemList()

function removeItem(id){
    const itemsRemoveCount = List.childElementCount
    if( itemsRemoveCount >= 2){
        const itemTarget = document.getElementById("item-"+id) 
         itemTarget.parentNode.removeChild(itemTarget)
     }else {
         alert('A Sua Lista deve ter ao menos 1 item!')
    }
}

// verifica se os Inputs de Items tem valor preenchido e, se tem, se ele não é repetido 

function checkList(event){
    const foundError = foundItemError()
    if(foundError){
        alert('Hey, há algo errado na sua lista, verifique se não há algo repetido ou vazio!')
        event.preventDefault()        
    } else {
        alert('Os itens da sua lista foram enviados para a sua geladeira!')
    }        
} 


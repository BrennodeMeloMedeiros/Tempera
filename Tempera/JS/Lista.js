
// Checar se precisa de mensagem em algum ugar para avisar ao usuário que 
// os ingredientes dele foram adicionados na geladeira

const List = document.getElementById("formList");
const Btn = document.querySelector("#AddItem");
const log = console.log


function removeItem(id){
    const itemTarget = document.getElementById("item-"+id)
    itemTarget.parentNode.removeChild(itemTarget)
}


function addItemList(){

    const itemsCount = document.querySelector('#formList').childElementCount 
    // Ascento grave permite a quebra de linha ao declarar qual o conteúdo de uma string, substituindo o "" e ''
    const newItem = `
    <div id="item-`+ itemsCount +`" class="List-Item">
        <button class="Btn-Del" onclick="removeItem(`+ itemsCount +`)"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" fill="Red"/></svg>
        </button>
        <input name="Ingredientes" type="text" placeHolder="Insira o Ingrediente" class="Item">
    </div>`;
    List.insertAdjacentHTML('beforeend', newItem)


}


// Parar envio do formulário 
// Checar se precisa para o envio

function foundEmptyItem(){
    const listItems = document.querySelectorAll('.List-Item');
    let emptyItem = false
    for(list of listItems) {
        const item = list.querySelector('.Item');
        if(!item.value){
            emptyItem = true
        }
    }
    return emptyItem
}

function checkList(event){
    const foundError = foundEmptyItem()
    if(foundError){
        alert('Hey, todos os itens devem estar preenchidos!')
        event.preventDefault()        
        alert('Os itens da sua lista foram enviados para a sua geladeira!')
    } else {
    }
} 

addEventListener('submit', (event) =>{
    checkList(event)
})

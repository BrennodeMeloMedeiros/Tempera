const log = console.log

const form = document.querySelector('form')
const inputs = form.querySelectorAll('input')

function noInputErrorIndicator(){
    const ingredientes = form.querySelector('#IngredientesText')
    const preparo = form.querySelector('#PreparoText')
    const tags = form.querySelector('#Tags')
    fields = [
        ingredientes,
        preparo,
        tags
    ]
   
    for(i = 0; i < fields.length; i++){
        if(fields[i].value == " " || fields[i].value == "Tag0" || fields[i].value == null || fields[i].value == "" ){
            fields[i].scrollIntoView()
            fields[i].style.border = '2px solid red'
            log(fields[i], fields[i].value)
        }else{
            fields[i].style.border = ''
        }
    }

}

form.addEventListener(
    'submit',
    (event) =>{
        event.preventDefault(),
        noInputErrorIndicator(event)
})

function setErrorIndicator(event) {
    const input = event.target
    
    if(!input.validity.valid){
        input.scrollIntoView()
        input.style.border = '2px solid red'
    } else{
        input.style.border = ''
    }
   
}

for(input of inputs){
    input.addEventListener(
    'invalid', 
    (event) => {
        event.preventDefault();
        setErrorIndicator(event)
    })
    input.addEventListener(
    'blur',
    (event) => {
    setErrorIndicator(event)
    }
    )
}

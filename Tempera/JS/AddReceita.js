const log = console.log

const form = document.querySelector('form')
    const inputs = form.querySelectorAll('input')

function viewTargetImage(){
    const imagePainel = document.querySelector('#Image-Painel')
    const image = document.querySelector('[name="image"]').files[0]
    const imageURL = URL.createObjectURL(image)

    imagePainel.style.backgroundImage = `URL(${imageURL})`
}

function noInputErrorIndicator(event){
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

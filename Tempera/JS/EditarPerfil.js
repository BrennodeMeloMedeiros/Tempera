
function viewNewImage(){
    const newImage = document.querySelector('#newImage').files[0]
    const oldImage = document.querySelector('#PImage')
    const newURL = URL.createObjectURL(newImage)
    oldImage.src = newURL
}



function validition(){
    const name = document.querySelector('#name')
    const bio = document.querySelector('textarea')
    let error = false
    
     if(!name.value || name.value == ' ' || name.value== '' ){
         error = true
     }
     if(!bio.value || bio.value == null || bio.value == '  ' ){
         error = true
     }

    return error
}

function startValidation(e){
    
    const errorMSG = document.querySelector('#error')
    const error = validition()
    if(error){
        e.preventDefault() 
        errorMSG.innerText = 'Há algo de errado com um dos campos, certifique-se que todos estejam preenchidos.'

    }else{
        errorMSG.innerText = ''

    }
}

const form = document.querySelector('form#saveForm')
form.addEventListener(
    'submit',
    (event)=>{       
        startValidation(event)
    }
)
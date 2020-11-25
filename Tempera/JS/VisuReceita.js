const likeButton = document.querySelector('#likeButton')
const estrelas = document.querySelectorAll('input[name=estrela]')
const formularioEstrelas = document.querySelector("form#EstrelasEnviar") 


likeButton.addEventListener('click', ()=>{
    document.querySelector('form#Like').submit()
})

for(estrela of estrelas){
    estrela.addEventListener('click', ()=>{
    formularioEstrelas.submit()
})
}


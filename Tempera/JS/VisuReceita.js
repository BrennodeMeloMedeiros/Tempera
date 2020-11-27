const likeButton = document.querySelector('#likeButton')
const estrelas = document.querySelectorAll('input[name=estrela]')
const formularioEstrelas = document.querySelector("form#EstrelasEnviar") 
const formReport = document.querySelector('form#denuncia')
const buttonReport = document.querySelector('button#reportButton')
const options = formReport.querySelectorAll('option')

for(estrela of estrelas){
    estrela.addEventListener('click', ()=>{
    formularioEstrelas.submit()
})
}

validReports = [
    'Conteúdo Ofensivo',
    'Receita má intencionada',
    'Informações incompletas'
]

formReport.addEventListener('submit', (e) => {
   
    let error = true
    select = formReport.querySelector('select').value
    for(valid of validReports){
        if(valid == select){
            error = false
        }
    }
    if(error){
        e.preventDefault()
    }   
        })
showReport = ()=> {
    buttonReport.style.display = 'none'
    formReport.style.display = 'block'
}

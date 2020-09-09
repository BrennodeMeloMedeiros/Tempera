const log = console.log
const imgPainel = document.querySelector('#image');
const imgLabel = document.querySelector("#Image-Painel")
function viewTargetImage(){
    // Vai pegar a imagem que fou upada
    const img = imgPainel.files[0]
    // Vai transformar a imagem em uma URL
    const imgURL = URL.createObjectURL(img)

    imgLabel.style.backgroundImage = `url(${imgURL}`

}




const image = document.querySelector('.Image')
const imageHeigth = image.offsetWidth; 


image.style.height = `${imageHeigth}px` 

const minicardImage = document.querySelectorAll('.Minicard img')

for(i of minicardImage){
    console.log(i.src)
    if(i.src == 'http://localhost/Tempera/Tempera/Perfil.php'){
       i.style.display = 'none'
    }
}
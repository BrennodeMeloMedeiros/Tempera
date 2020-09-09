const allForms = document.querySelectorAll('form');
const allInputs = document.querySelectorAll('[required]')
const Log = console.log;


// Checar o erro do input de acordo com a regra de negócio 
function Validation(input) {
   
    let existErro = false

    function errorIdentity() {
        for(features in input.validity) {
            // Se alguma caracteristica do Input for true exeto o "valid" (que indica que o input está certo)
            // o Erro vai ser apontado como existente
            if(input.validity[features] && !input.validity.valid){
                existErro = features
            } 
        }
        return existErro
    }



    function errorMessage(typeError){
        const messages = {
            text: {
                valueMissing: 'Por favor, preencha este campo.',
                patternMismatch: 'O nome deve ter um máximo de 25 dígitos'
            },
            email: {
                valueMissing: 'Por favor, preencha este campo.',
                typeMismatch: 'Por favor, preencha o email de forma válida ("@" e ".com")'
            },
            password: {
                valueMissing: 'Por favor, preencha este campo.',
                patternMismatch: 'A senha precisa ter um minimo de 6 dígitos',
            }
        }
        return messages[input.type][typeError]
    }

    function applyErrorMessage(errorText){
        const spanMsg = input.parentNode.querySelector('span.msgError');
        if(errorText) {
            spanMsg.innerText = errorText
        } else {
            spanMsg.innerText = ""
        }

    }


    function returnValue(){
        const error = errorIdentity();
        


        if(error) {
            const errorText = errorMessage(error)
            applyErrorMessage(errorText)
        } else {
            applyErrorMessage();
        }
    }

    return returnValue();
    
}


// Passar as informações para a função "Validation"
function startValidation(event) {
    const input = event.target;
    Validation(input)
}

// Verificar se algum input revela ter um erro


for(input of allInputs) {
    input.addEventListener(
        "invalid",
        (event) => {
            event.preventDefault();
            startValidation(event)
        }
    )
    input.addEventListener(
        "blur",
        (event) => {
            startValidation(event)
        }
    )
}

function passwordConfirmation(event){
    const form = event.target

    if(form.id == "Cadastro") {
        const password = form.querySelector("input[name='RegisterPassword']")
        const confirmPassword = form.querySelector("input[name='ConfirmPassword']")
        const wrong = "wrong"

        function confirmError(){
            if(confirmPassword.value != password.value && confirmPassword.classList != wrong) {
                Log("Entrou")
                confirmPassword.classList.add(wrong)
            }else if (confirmPassword.value == password.value && confirmPassword.classList == wrong) {
                confirmPassword.classList.remove(wrong)
            }
        }
        confirmError()

        if(confirmPassword.classList == wrong) {
            event.preventDefault()
            const confirmErrorMsg = confirmPassword.parentNode.querySelector(".msgError")
            confirmErrorMsg.innerText = "A confirmação da senha está incorreta"
        } 
        
    }


}

// Desabilita o envio do formulário (Apenas para teste)
for(form of allForms) {
    form.addEventListener(
        "submit",
        (event) =>{    
            passwordConfirmation(event)
        }
    )
}
<script type='text/javascript'>
        // Limita as opções de escolha do Datalist de acordo com o Banco de Ingredientes
            <?php
            $conecta = mysqli_connect("clovis-cartola.czcbeh0esbig.us-east-1.rds.amazonaws.com","tempera","Tempera_123","tempera");

            if(!$conecta){
                echo "Error: Unable to connect to MySql" . PHP_EOL;
                echo "Debugging errno:" . mysqli_connect_errno() . PHP_EOL;
                echo "Error: Unable to connect to MySql" . mysqli_connect_error() . PHP_EOL;
                exit;
            }else{

            $getUsuarios = 'select * from tb_ingrediente';
            $executeLine = mysqli_query($conecta, $getUsuarios);

            ?> 
            var js_array = [<?php while($row = mysqli_fetch_assoc($executeLine)){ echo utf8_encode("'{$row['st_nomeIngrediente']}',"); }; ?>]
            const datalist = document.querySelector('datalist')
            function addOption(item, index){
                let option = document.createElement("option")
                let optionText = option.innerText = item
                option.value = item
                datalist.appendChild(option)
            }

            js_array.forEach(addOption)

            <?php
            }
            ?>
        // Verifica se algum Ingrediente está repetido 

        function verificarRepetição(){
            const listItems = document.querySelectorAll('.List-Item');
            let errorItem = false
            
            for(list of listItems) {
                // list = div do item 
                const firstValue = list.querySelector('.Item').value // Input da div, ou seja, onde está o valor do item 
                const firstId = list.id // Id do input 

                const inputsArray = List.querySelectorAll('.Item') // Pega todos o itens da lista denovo 
            //Pega os valores de todos os itens e checka se algum deles, que não o próprio, é igual a outro 
                for(input of inputsArray){
                const secondValue = input.value
                const secondId = input.parentNode.id
                
                    if(firstId != secondId && firstValue == secondValue){
                        errorItem = true
                    } else if(!firstValue){
                        errorItem = true
                    } else{
                    }
                } 

            }
            console.log(errorItem)
            return errorItem
        }


        // Valida o valor do Input da Datalist (Verifica se o valor existe no Banco ou não)

        const objeto = {}
        js_array.forEach(item =>{
            objeto[item] = item
        } )
        function comecarValidacao(){
            const form = document.querySelector('form')
            const inputs = form.querySelectorAll('input.Item')
            let achouIngrediente = true
            for(input of inputs){
                const ingrediente = input.value
                const buscarIngrediente = objeto[ingrediente]
                if(!buscarIngrediente){
                   achouIngrediente = false
                   input.parentNode.style.borderBottom = '2px solid red'
                   input.parentNode.style.borderLeft = '2px solid red'
                }else{
                    input.parentNode.style.borderBottom = '1px solid #919191'
                    input.parentNode.style.borderLeft = 'none'                    
                }
            } 
            return achouIngrediente
        }
 
         addEventListener('submit',
         (e)=> {
            const existeIngrediente = comecarValidacao()
            const ingredienteRepetido = verificarRepetição()
            if(!existeIngrediente){
                e.preventDefault()
                alert('Algum dos ingredientes que você colocou não existe em nossa tabela, porfavor verifique os campos e remova')
            }else if (ingredienteRepetido){
                e.preventDefault()
                alert('Parece que algum item está repetido, porfavor retire-o da lista')
            }else{
                alert('Feito!')
            }
        })
        

        </script>
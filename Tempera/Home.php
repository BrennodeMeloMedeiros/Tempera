<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: Index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Style.css">
    <link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">
    <link rel="stylesheet" type="text/css" href="CSS/Home.css">
    <script src="JS\Script.js"></script>
    <script src="JS\Home.js" defer></script>
    <script src="JS\SideMenu.js"></script>

    <title>Página Inicial</title>

</head>
<body>
    <main id="main">
        <script>
            ShowSideMenu()
        </script>
        
        
        <content>
            <div class="Name-Page">
                Página Inicial
            </div>
            <section class="card">
                <img src="IMAGENS/Stro.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
             
            <section class="card">
                <img src="IMAGENS/Arroz.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
             
            <section class="card">
                <img src="IMAGENS/Pudim.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
             
            <section class="card">
                <img src="IMAGENS/Pudim.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
             
            <section class="card">
                <img src="IMAGENS/Pudim.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
             
            <section class="card">
                <img src="IMAGENS/Pudim.jpg" alt="Receita">
                <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="80.615" height="11.865" viewBox="0 0 82.615 13.865">
                <g id="Grupo_39" data-name="Grupo 39" transform="translate(-355 -430.25)">
                    <path id="Icon_feather-star" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(352 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-2" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(403.027 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-3" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(386.018 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-4" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(369.009 427.25)" fill="#ffce0c"/><path id="Icon_feather-star-5" data-name="Icon feather-star" d="M10.289,3l2.252,4.563,5.037.736-3.645,3.55.86,5.015-4.5-2.369-4.5,2.369.86-5.015L3,8.3l5.037-.736Z" transform="translate(420.036 427.25)" fill="#ffce0c"/></g></svg>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                    <span id="Tag" ></span>
                </div>
                <div class="card-content">
                    <span class="titulo">
                        <b>
                            Nome da Receita
                        </b>
                    </span>
                    <p class="descricao">
                                Lorem ipsum morbi auctor pellentesque aliquam suspendisse fermentum hac, ligula sagittis vulputate feugiat malesuada facilisis fermentum imperdiet ut, cras eu porta lacinia nec quisque vitae. 
                    </p>
                </div>
                <div class="card-footer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.091" viewBox="0 0 19 17.091"><g id="Grupo_137" data-name="Grupo 137" transform="translate(-784.559 -512.42)"><g id="Symbol_97_151" data-name="Symbol 97 – 151" transform="translate(785.059 512.92)"><path id="Heart" d="M16.586,1.464a4.836,4.836,0,0,0-6.884,0l-.677.677-.677-.677A4.868,4.868,0,0,0,1.464,8.348l7.561,7.561,7.561-7.561a4.836,4.836,0,0,0,0-6.884" transform="translate(-0.025 -0.025)" fill="none" stroke="#95989a" stroke-width="1" fill-rule="evenodd"/></g></g></svg>
                    <span id="Likes">
                        609
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path id="Caminho_13" data-name="Caminho 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#2699fb"/></svg>
                   <span id="Duracao">
                        45:00
                    </span>
                    <span id="Autor">
                            Nome do autor
                        
                    </span>
                </div>
            </section>
                       
        </content>



    </main>


  

</body>
</html>
<link rel="stylesheet" type="text/css" href="CSS/SideMenu.css">

<header>

       <div class='filtro-position'>
           Filtrar
           <svg xmlns='http://www.w3.org/2000/svg' width='8.503' height='18.616' viewBox='0 0 13.503 23.616'><path id='Icon_ionic-ios-arrow-forward' data-name='Icon ionic-ios-arrow-forward' d='M20.679,18,11.742,9.07a1.681,1.681,0,0,1,0-2.384,1.7,1.7,0,0,1,2.391,0L24.258,16.8a1.685,1.685,0,0,1,.049,2.327L14.14,29.32a1.688,1.688,0,0,1-2.391-2.384Z' transform='translate(-11.246 -6.196)'/></svg>
           <ul class='drop'>
                    <a href="Filtrar.php?Tag=Carnes&type=Tag">
                    <li class='drop-item'>
                        Carnes
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Fitness&type=Tag">
                    <li class='drop-item'>
                        Fitness
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Vegetariano&type=Tag">
                    <li class='drop-item'>
                        Vegetariano
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Massas&type=Tag">
                    <li class='drop-item'>
                        Massas
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Molhos&type=Tag">
                    <li class='drop-item'>
                        Molhos
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Saladas&type=Tag">
                    <li class='drop-item'>
                        Saladas
                    </li>
                    </a>
                    <a href="Filtrar.php?Tag=Sobremessas&type=Tag">
                    <li class='drop-item'>
                        Sobremesas
                    </li>
                    </a>

           </ul>
       </div>
       <div class='LogoTempera'>
       <a href='Home.php'>
            <div class='Logo'>
                 <img src='IMAGENS/Logo_Tempera.png' class='ImgLogo'>     
           </div>
        </a> 
       </div>
       <div class='Search-Input'>
           <svg xmlns='http://www.w3.org/2000/svg' width='35.997' height='36.004' viewBox='0 0 35.997 36.004'><path id='Icon_awesome-search' data-name='Icon awesome-search' d='M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z' fill='#3A9AE4'/></svg>
            <form action="Filtrar.php" method='POST' id='SearchForm'>
               <input type='text' name='searchInput' class='search' placeholder='Pesquisar'>
            </form>
        </div>
        <div class='Avatar'>
            <a href='Perfil.php'>
                <img src='<?php 
       
                if(isset($foto)){
                    echo $foto;
                }else{
                    echo 'IMAGENS/AvatarBeta.png';
                }
            ?>' class='AvatarImg'>
            </a>
        </div>
    
   </header>
<!--============================================= Header =============================================-->

<!--=============================================  Nav  =============================================-->
  <nav>
       <ul class='navbar'>
               <li class='nav-top'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='68' height='45' viewBox='0 0 68 45'>
                   <path id='Menu' d='M0,
                   45V38.57H42.5V45ZM0,
                   25.715v-6.43H68v6.43ZM0,
                   6.43V0H68V6.43Z' 
                   fill='#fff'/>
                   </svg>
                    <span class='nav-text'>MENU</span>
                   
               </li>
           <li class='nav-item'>
                <a href='Home.php' class='nav-link'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='69.642' height='54.155' viewBox='0 0 69.642 54.155'><path id='Icon_awesome-home' data-name='Icon awesome-home' d='M33.9,16.3,11.607,34.661V54.475a1.934,1.934,0,0,0,1.934,1.934l13.548-.035a1.934,1.934,0,0,0,1.925-1.934V42.869a1.934,1.934,0,0,1,1.934-1.934h7.737a1.934,1.934,0,0,1,1.934,1.934V54.431a1.934,1.934,0,0,0,1.934,1.94l13.543.037a1.934,1.934,0,0,0,1.934-1.934V34.648L35.746,16.3A1.474,1.474,0,0,0,33.9,16.3ZM69.105,28.781,59,20.45V3.7a1.451,1.451,0,0,0-1.451-1.451h-6.77A1.451,1.451,0,0,0,49.326,3.7v8.778L38.5,3.577a5.8,5.8,0,0,0-7.375,0l-30.6,25.2a1.451,1.451,0,0,0-.193,2.043l3.083,3.748a1.451,1.451,0,0,0,2.044.2L33.9,11.346a1.474,1.474,0,0,1,1.85,0L64.185,34.769a1.451,1.451,0,0,0,2.043-.193l3.083-3.748a1.451,1.451,0,0,0-.206-2.047Z' transform='translate(0.001 -2.254)' fill='#fff'/></svg>
                   <span class='nav-text'>Home<p class='sub'>Veja as principais receitas</p></span>
               </a>     
           </li>

           <li class='nav-item'>
               <a href='Lista.php' class='nav-link'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='56.092' height='54.53' viewBox='0 0 56.092 54.53'><path id='Icon_awesome-list-ul' data-name='Icon awesome-list-ul' d='M5.259,3.375C2.354,3.375,0,6.192,0,9.667s2.354,6.292,5.259,6.292,5.259-2.817,5.259-6.292S8.163,3.375,5.259,3.375Zm0,20.973C2.354,24.348,0,27.165,0,30.64s2.354,6.292,5.259,6.292,5.259-2.817,5.259-6.292-2.354-6.292-5.259-6.292Zm0,20.973C2.354,45.321,0,48.138,0,51.613S2.354,57.9,5.259,57.9s5.259-2.817,5.259-6.292-2.354-6.292-5.259-6.292Zm49.08,2.1H19.282a1.948,1.948,0,0,0-1.753,2.1V53.71a1.948,1.948,0,0,0,1.753,2.1H54.339a1.948,1.948,0,0,0,1.753-2.1V49.516A1.948,1.948,0,0,0,54.339,47.418Zm0-41.946H19.282a1.948,1.948,0,0,0-1.753,2.1v4.195a1.948,1.948,0,0,0,1.753,2.1H54.339a1.948,1.948,0,0,0,1.753-2.1V7.57A1.948,1.948,0,0,0,54.339,5.472Zm0,20.973H19.282a1.948,1.948,0,0,0-1.753,2.1v4.195a1.948,1.948,0,0,0,1.753,2.1H54.339a1.948,1.948,0,0,0,1.753-2.1V28.543A1.948,1.948,0,0,0,54.339,26.445Z' transform='translate(0 -3.375)' fill='#fff'/></svg>
                   <span class='nav-text'>Lista<p class='sub'>Faça sua lista de compras</p></span>
               </a>     
           </li>
           <li class='nav-item'>
           <a href='AddReceitas.php' class='nav-link'>
           <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" fill="#fff"/></svg>
               <span class='nav-text'>Adicionar<p class='sub'>Adicione uma Receita</p></span>
           </a>     
       </li>
          
           <li class='nav-item'>
               <a href='Geladeira.php' class='nav-link'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='71.253' height='67.853' viewBox='0 0 71.253 67.853'><path id='Icon_awesome-door-closed' data-name='Icon awesome-door-closed' d='M69.472,59.371H57V6.732C57,3.019,54.606,0,51.659,0H19.594C16.647,0,14.25,3.019,14.25,6.732V59.371H1.781A1.973,1.973,0,0,0,0,61.492v4.241a1.973,1.973,0,0,0,1.781,2.12H69.472a1.973,1.973,0,0,0,1.781-2.12V61.492A1.973,1.973,0,0,0,69.472,59.371Zm-23.158-21.2c-1.967,0-3.563-1.9-3.563-4.241s1.6-4.241,3.563-4.241,3.563,1.9,3.563,4.241S48.282,38.167,46.314,38.167Z' fill='#fff'/></svg>
                   <span class='nav-text'>Geladeira<p class='sub'>Monte sua geladeira</p></span>
               </a>     
           </li>

           <li class='nav-item'>
               <a href='Doe.php' class='nav-link'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='79.188' height='67.113' viewBox='0 0 79.188 67.113'><path id='Icon_awesome-hands-helping' data-name='Icon awesome-hands-helping' d='M60.382,25.168H41.575v7.341a9.2,9.2,0,0,1-8.909,9.439,9.2,9.2,0,0,1-8.909-9.439V16.569l-8.03,5.113a8.484,8.484,0,0,0-3.848,7.184v6.2l-9.9,6.056A4.323,4.323,0,0,0,.533,46.851l9.9,18.169a3.842,3.842,0,0,0,5.407,1.534l12.794-7.826h16.9a8.172,8.172,0,0,0,7.919-8.39h1.98a4.078,4.078,0,0,0,3.959-4.195v-8.39h.99a3.054,3.054,0,0,0,2.97-3.146V28.314A3.054,3.054,0,0,0,60.382,25.168Zm18.275-4.9L68.759,2.1A3.842,3.842,0,0,0,63.352.562L50.558,8.389H37.913A7.65,7.65,0,0,0,33.718,9.66L29.573,12.4a4.229,4.229,0,0,0-1.856,3.553V32.509a4.958,4.958,0,1,0,9.9,0V20.973H60.382a7.149,7.149,0,0,1,6.929,7.341v3.736l9.9-6.056a4.339,4.339,0,0,0,1.448-5.729Z' transform='translate(0.002 -0.002)' fill='#fff'/></svg>
                   <span class='nav-text'>Doe<p class='sub'>Ajude ONGs de forma direta</p></span>
               </a>     
           </li>
       </ul>
  </nav>
<!--=============================================  Nav  =============================================-->

<!--=============================================  Aside  =============================================-->
<aside>
   <section class='UsersTop'>
       <span class='User-Text blue'><strong>Top Usuários</strong></span>
       <ul class='User-List'>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <span class='UserName'>Nome do Usuário</span>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <span class='UserName'>Nome do Usuário</span>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <span class='UserName'>Nome do Usuário</span>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <span class='UserName'>Nome do Usuário</span>
           </li>
       </ul>
   </section>
   <section>
   <section class='UsersTop'>
       <span class='User-Text blue'><strong>Top Receitas</strong></span>
       <ul class='User-List'>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <div class='NameDiv'>
                   <span class='UserName'>Nome da Receita</span>
                   <span class='SubName'> Nome do Usuário</span>
               </div>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <div class='NameDiv'>
                   <span class='UserName'>Nome da Receita</span>
                   <span class='SubName'> Nome do Usuário</span>
               </div>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <div class='NameDiv'>
                   <span class='UserName'>Nome da Receita</span>
                   <span class='SubName'> Nome do Usuário</span>
               </div>
           </li>
           <li class='User'>
               <img src='IMAGENS/AvatarBeta.png' class='TopUser'>
               <div class='NameDiv'>
                   <span class='UserName'>Nome da Receita</span>
                   <span class='SubName'> Nome do Usuário</span>
               </div>
           </li>
       </ul>
   </section>
</aside>
<!--=============================================  Aside  =============================================-->
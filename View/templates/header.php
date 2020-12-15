    <div class='ad-overlay'>
         <div class='ad'>
            <div class='ad-head'></div>
         </div>
    </div>
      <div class='navbar navbar-inverse navbar-fixed-top' role='navigation' style='text-align: left; background: rgba(0,0,0,.85);'>
         <div class='container'></div>
         <div class='navbar-header'>
            <a class='navbar-toggle' href='#sidr' style='float: left;'>
            <span class='sr-only'>Toggle Navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            </a>
            <a class='navbar-brand' data-turbolinks='false' href='index.php' style='border-bottom: 3px solid rgba(0,0,0,0);'>
            <img alt='' height='45;' src='assets/logo2.png' style='margin-top: -4px;'>
            </a>
         </div>
         <div id='menu_contents'>
            <ul class='nav navbar-nav upper'>
               <li>
                  <a data-turbolinks='false' href='index.php'>
                  <span>Inicio</span>
                  </a>
               </li>
               <li>
                  <a data-turbolinks='false' href='agregar_bicicleta.php'>
                  <span>
                  Agrega tu bicicleta
                  </span>
                  </a>
               </li>
               <li>
                  <a data-turbolinks='false' href='buscar_bicicletas.php'>
                  <span>Buscar</span>
                  </a>
               </li>
               <li>
                  <a data-turbolinks='false' href='bicicletas_encontradas.php'>
                  <span>
                  Bicicletas encontradas
                  </span>
                  </a>
               </li>
            </ul>
            <ul class='nav navbar-nav navbar-right upper' style='padding-right: 20px;'>
               <li>
                  <a href='ayuda.php' target='_blank'>
                     <icon class='bigonly fa fa-question-circle fa-fw yellow' title='Help'></icon>
                     Ayuda
                  </a>
               </li>
            </ul>
            <ul class='nav navbar-nav navbar-right upper'>
               <li>
                  <a href='login.php'>Log In</a>
               </li>
            </ul>
         </div>
      </div>
      <div id='sidr_menu_contents'>
         <ul class='nav navbar-nav upper'>
            <li>
               <a data-turbolinks='false' href='index.php'>
               Inicio
               </a>
            </li>
            <li>
               <a data-turbolinks='false' href='agregar_bicicleta.php'>
               Agrega tu bicicleta
               </a>
            </li>
            <li>
               <a data-turbolinks='false' href='buscar_bicicletas.php'>
               Buscar
               </a>
            </li>
            <li>
               <a data-turbolinks='false' href='bicicletas_encontradas.php'>
               Bicicletas encontradas
               </a>
            </li>
            <li>
               <a href='login.php'>Log In</a>
            </li>
            <li>
               <a href='ayuda.php' target='_blank'>
                  Ayuda
               </a>
            </li>
         </ul>
      </div>
      <script>
         $(document).ready(function () {
         
             $('.navbar-toggle').sidr({
               name: 'sidr-menu',
               source: '#sidr_menu_contents'
             });
         
             $('html').on("click", function(){
               $.sidr('close', 'sidr-menu');
             });
         
           });
      </script>
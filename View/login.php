<!DOCTYPE html>
<html class='csstransforms csstransforms3d csstransitions' lang='en-US'>
   <head>
      <meta charset='utf-8'>
      <meta content='width=device-width, initial-scale=1.0, user-scalable=no' name='viewport'>
      <title>MyBike</title>
    
      <meta content='assets/logo_black.png' property='og:image'>
      <link rel="shortcut icon" type="image/x-icon" href="assets/logo_icon2.ico"/>
      
      <link rel="stylesheet" media="all" href="css/style.css"/>
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Abel"/>
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Patua+One"/>
  
      <script src="js/main.js" data-turbolinks-track="true"></script>
      <script src="js/login.js" data-turbolinks-track="true"></script>
      <script src="https://kit.fontawesome.com/8dba173683.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php include "templates/header.php"; ?>

      <div class='home-tile tile-1 top-tile' style='background-image: url(images/lock.jpg); 
      background-repeat: no-repeat; background-size: cover;'>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; margin-bottom: 100px;'>
               <div class='row'>
                  <div class='col-lg-8 col-lg-offset-2'>
                     <div class='user-setting-form'>
                        <div class='row'>
                           <div class='col-sm-12 center'>
                              <img src='assets/logo_black.png' style='height: 130px;'>
                           </div>
                        </div>
                        <hr>
                        <div class='row'>
                           <div class='col-sm-12 center'>
                              <p></p>
                              <div class='row'>
                                 <div class='row'>
                                    <div class='form-group'>
                                       <label class='col-sm-3 control-label'>Ingresa tu email
                                       </label>
                                       <div class='col-sm-6'>
                                          <input autocomplete='username' class='form-control' data-icon='#email_required' data-minlength='4' id='email' maxlength='255' name='user[email]' spellcheck='false' tabindex='1' type='email'></input>
                                       </div>
                                      
                                    </div>
                                 </div>
                                 <div class='row'>
                                       <div class='form-group'>
                                          <label class='col-sm-3 control-label'>Tu contraseña
                                          </label>
                                          <div class='col-sm-6'>
                                             <input aria-describedby='user_check' class='form-control' id='user_password' maxlength='255' name='user[password]' spellcheck='false' tabindex='2' type='password' value=''>
                                             <div class='red' id='login_err'></div>
                                             <input id='existing_user_email' name='user[email]' type='hidden'>
                                          </div>
                                       </div>
                                 </div>
                                 <p></p>
                                 <div class='row'>
                                    <div class='col-sm-12'>
                                       <p></p>
                                       <div class='center'>
                                          <a class='btn form-submit' href='garaje.php'>Log In
                                          </a>
                                          <a class='btn form-control' href='recuperar_contraseña'>¿Olvidaste tu contraseña?
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                
                                 <p></p>
                                 <div class='row'>
                                    <div class='col-sm-12'>
                                       <p></p>
                                       <div class='center'>
                                          <a  href='registrarse.php'>¿Aún no eres un MyBiker? Regístrate aquí
                                          </a>
                                          
                                       </div>
                                    </div>
                                 </div>
                                
                              
                                 <div id='one_click'>
                                    <hr>
                                    <div class='row'>
                                       <div class='col-sm-12 center'>
                                          <h4>O si quieres</h4>
                                       </div>
                                    </div>
                                    <div class='row upper'>
                                       <div class='col-sm-4 col-sm-offset-2'>
                                          <a href='/garage/users/auth/facebook'>
                                             <div class='login_btn' style='background: #3a5499; '>
                                                <div class='login_icon' style='background: #3B5998;'>
                                                   <i class='fa fa-facebook fa-2x fa-fw white' style='margin-top: 10px;' title='Log In with Facebook'></i>
                                                </div>
                                                <div class='login_description'>
                                                   Loggeate
                                                   <span class='bigonly'>con Facebook
                                                   </span>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                       <div class='col-sm-4'>
                                          <a href='/garage/users/auth/twitter'>
                                             <div class='login_btn' style='background: #44aee5; '>
                                                <div class='login_icon' style='background: #3fa0d3;'>
                                                   <i class='fa fa-twitter fa-2x fa-fw white' style='margin-top: 10px;' title='Log In with Twitter'></i>
                                                </div>
                                                <div class='login_description'>
                                                   Loggeate
                                                   <span class='bigonly'>con Twitter
                                                   </span>
                                                </div>
                                             </div>
                                          </a>
                                       </div>
                                    </div>                                   
                                 </div>
                                 
                                 <!--REDES SOCIALES
                                 <div class='row social_login hidden'>
                                    <div class='col-sm-12'>
                                       <div class='center'>
                                          <p></p>
                                          <hr>
                                          <h4>
                                             It looks like you've signed up using One-Click.
                                             <br>
                                             Please log in with your social network.
                                             <a class='facebook hidden social_login_btn' href='/garage/users/auth/facebook'>
                                                <div class='login_btn' style='background: #3a5499; '>
                                                   <div class='login_icon' style='background: #3B5998;'>
                                                      <i class='fa fa-facebook fa-2x fa-fw white' style='margin-top: 10px;' title='Log In with Facebook'></i>
                                                   </div>
                                                   <div class='login_description'>
                                                      Log In
                                                      <span class='bigonly'>with Facebook
                                                      </span>
                                                   </div>
                                                </div>
                                             </a>
                                             <a class='twitter hidden social_login_btn' href='/garage/users/auth/twitter'>
                                                <div class='login_btn' style='background: #44aee5; '>
                                                   <div class='login_icon' style='background: #3fa0d3;'>
                                                      <i class='fa fa-twitter fa-2x fa-fw white' style='margin-top: 10px;' title='Log In with Twitter'></i>
                                                   </div>
                                                   <div class='login_description'>
                                                      Log In
                                                      <span class='bigonly'>with Twitter
                                                      </span>
                                                   </div>
                                                </div>
                                             </a>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 -->

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class='unobtrusive-flash-container'></div>

      <script>
         $(document).ready(function() {
         
             //console.log($('.footer').get_timezone());
             $.cookie("time_zone", $('.footer').get_timezone());
         });
      </script>
   </body>
</html>
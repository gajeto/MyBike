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
      <script src="js/vendor/aws-cognito-sdk.min.js"></script>
      <script src="js/vendor/amazon-cognito-identity.min.js"></script>
      <script src="js/cognito_config.js"></script>
      <script src="js/cognito.js"></script>
      
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
                                          <input autocomplete='username' class='form-control' data-icon='#email_required' data-minlength='4' id='emailRegistro' maxlength='255' name='user[email]' spellcheck='false' tabindex='1' type='email'></input>
                                       </div>
                                    </div>
                                 </div>
                                    <p></p>
                                    <div class='row'>
                                       <div class='form-group'>
                                          <label class='col-sm-3 control-label'>Tu contraseña
                                          </label>
                                          <div class='col-sm-6'>
                                             <input aria-describedby='user_check' class='form-control' id='passwordRegistro' maxlength='255' name='user[password]' spellcheck='false' tabindex='2' type='password' value=''>
                                             <div class='red' id='login_err'></div>
                                             <input id='existing_user_email' name='user[email]' type='hidden'>
                                          </div>
                                       </div>
                                 </div>
                                    <p></p>
                                 <div class='row'>
                                       <div class='form-group'>
                                          <label class='col-sm-3 control-label'>Confirmar contraseña
                                          </label>
                                          <div class='col-sm-6'>
                                             <input aria-describedby='user_check' class='form-control' id='password2Registro' maxlength='255' name='user[password]' spellcheck='false' tabindex='2' type='password' value=''>
                                             <div class='red' id='login_err'></div>
                                             <input id='existing_user_email' name='user[email]' type='hidden'>
                                          </div>
                                       </div>
                                 </div>
                                 <p></p>
                                <div class='row user_name'>
                                          <div class='form-group'>
                                             <label class='col-sm-3 control-label'>Tu nombre
                                             </label>
                                             <div class='col-sm-6'>
                                                <div class='input-group'>
                                                   <input autocomplete='off' class='form-control is_required' data-icon='#uname_required' data-minlength='3' id='nombreRegistro' maxlength='255' name='user[name]' spellcheck='false' tabindex='1' type='text'>
                                                   <div class='input-group-addon'>
                                                      <i class='fa fa-exclamation-circle red' id='uname_required' title='Recomendado'></i>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <p></p>
                                       <div class='row location'>
                                          <div class='form-group'>
                                             <label class='col-sm-3 control-label'>Número de télefono
                                             </label>
                                             <div class='col-sm-6'>
                                                <input autocomplete='off' class='form-control' data-icon='#phone_required' data-minlength='4' maxlength='13' name='user[phone_number]' placeholder='Preferiblemente celular' 
                                                id='telefonoRegistro' type='text' width='100%'></input>
                                             </div>
                                          </div>
                                       </div>
                                       <p></p>
                                       <div class='row location'>
                                          <div class='form-group'>
                                             <div class='col-sm-3'></div>
                                             <div class='col-sm-8 left'>
                                                <input value="false" type="hidden" name="user[share_phone]" id="user_share_phone"/>
                                                <input name="user[share_phone]" type="hidden" value="0"/>
                                                <input tabindex="8" type="checkbox" value="1" name="user[share_phone]" id="user_share_phone"/>
                                                <label class="left" for="user_share_phone">Compartir mis datos de contacto con las autoridades</label>
                                                <br>
                                                Habilita esta opción si quieres que las autoridades puedan contactarte en caso de que recuperen una bicicleta tuya, incluso si aún no la has reportado como robada. Esto hará que el proceso de devolución sea mucho más rápido.
                                             </div>
                                          </div>
                                       </div>
                                       <p></p>
                                       <hr>
                                       <div class='row'>
                                          <div class='form-group'>
                                             <div class='col-sm-12 center'>
                                             <h3>
                                                <input type="submit" value="Regístrate" class="btn form-submit"/>
                                             </h3>
                                             </div>
                                          </div>
                                       </div>

                                       <script>
                                       $(document).ready(function() {
                                       
                                           $('.is_required').on('keyup', function() {
                                               var icon_id = $(this).data("icon")
                                               set_icon(icon_id, ($(this).val().length > $(this).data("minlength") - 1))
                                           });
                                       
                                           function set_icon(icon_id, is_valid) {
                                               console.log(icon_id)
                                               console.log(is_valid)
                                               if (is_valid) {
                                                   //console.log("hide")
                                                   //$(icon_id).hide();
                                                   $(icon_id).addClass("green")
                                                   $(icon_id).removeClass("red")
                                                   $(icon_id).addClass("fa-check-circle")
                                                   $(icon_id).removeClass("fa-exclamation-circle")
                                               } else {
                                                   $(icon_id).removeClass("green")
                                                   $(icon_id).addClass("red")
                                                   $(icon_id).removeClass("fa-check-circle")
                                                   $(icon_id).addClass("fa-exclamation-circle")
                                               }
                                           }
                                       
                                       });
                                    </script>
                              
                                                        
                                 
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
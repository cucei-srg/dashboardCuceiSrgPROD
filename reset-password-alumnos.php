<!DOCTYPE html>
<html>
<head>
  <title>SRG | Restablecer</title>
  <?php
      include('header.php');
  ?>
  <?php
    include('cookiePolicy.php');
  ?>
<link rel="stylesheet" type="text/css" href="assets/css/reset-password.css">
<link rel="icon" href="favicon.png">
</head>
<body class="hold-transition register-page" style="overflow: hidden;background: linear-gradient(to right, #2B32B2, #1488CC);" ng-app="">
<div class="register-box" style="margin-top: 0%">
  <div class="register-logo">
    <b style="color: white">Alumnos</b><img src="assets/img/logo.png" style="width: 60%">
  </div>
    <div class="register-box-body" style="border-radius: 20px; background-color: #eeeeee">
      <div class="login-logo" style="margin: 0px">
        Restablecer Contraseña
        <hr style="background-color: gray; margin: 0px">
      </div>
      <form name="formulario" autocomplete="off" required>
          <div class="input-group margin-bottom-sm" style="margin: 0px">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw" aria-hidden="true" style="color: #0064b7"></i></span>
            <input type="email" id="txtCorreoReset" name="txtCorreoReset" class="form-control" placeholder="Ingrese su correo institucional" ng-model="txtCorreoReset" ng-minlenght="12" required>
            <span style="color: crimson;" ng-show="formulario.txtCorreoReset.$touched && formulario.txtCorreoReset.$invalid"><b>Correo es requerido.</b><br/></span>
          </div>
          <div class="col-sm-12" style="text-align: center" id="captcha"></div>
          <br>
          <div class="row">
            <div class="col-sm-12">
              <button id="btnReset"  type="button" class="btn btn-primary btn-block btn-flat" ng-disabled="formulario.$invalid" style="color: white; border-radius: 20px" onclick="verifyReCaptcha();">Enviar solicitud</button>
            </div>
            <div class="col-sm-12">
              <button id="btnAtras" type="button" class="btn btn-danger btn-block btn-flat"  style="background-color: #f44336; color: white; border-radius: 20px" onclick="regresarIndex();">Regresar</button>
            </div>
          </div>
    </div> 
    </form>
</div>
 <?php
      include('footer.php');
 ?>
 <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
<script async src="assets/js/libs/angular.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/reset-password.js"></script>
<!-- Script para recaptcha -->
<script type="text/javascript">
let verifyReCaptcha = () => {
  let captchaVerify =  grecaptcha.getResponse(captcha);
  if(!captchaVerify){
    swal("ALUMNOS CUCEI-SRG", "Realice el captcha antes de continuar", "error");
  }else{
    resetPassword();
  }
}
var verifyCallback = function(response) {
  if(response){
  }else{
    alert(response);
  }
};
var onloadCallback = function() {
  captcha = grecaptcha.render('captcha', {
    'sitekey' : '6Lfmq6YUAAAAAEANI-3OH-kRXj3gPV4zPa3wsuK8',
    'callback' : verifyCallback,
    'theme' : 'light'
  });
};
let regresarIndex = () => {
    window.location.replace('ingreso-alumnos.php');
}
$(function () {
    $('#txtCorreoReset').keypress(function (e) {
        if (e.which == 13) {
          verifyReCaptcha();
        }
    });
});
</script>
</body>
</html>
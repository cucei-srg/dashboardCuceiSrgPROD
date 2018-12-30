<?php
  require('centinela.php');
?>
<!DOCTYPE html>
<html>
<head>
	 <title>Nuevo Reporte - Mantenimiento</title>
  <?php
    include('header.php');
  ?>
 <link rel="stylesheet" type="text/css" href="assets/css/generar-reporte.css">
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="">
<div class="wrapper">
	<?php
      include("navbar.php");
    ?>
    <?php
      include("sidebar.php");
    ?>
  <div class="content-wrapper">
  	<div class="jumbotron">
        <p>COORDINACIÓN DE SERVICIOS GENERALES / UNIDAD DE MANTENIMIENTO</p>
        <p>SOLICITUD MANTENIMIENTO PREVENTIVO / CORRECTIVO</p>
    </div>
    <div class="row" id="principal">
      <form name="formulario" autocomplete="off">
                <div class="col-sm-3">
                    <input class="form-control" id="recibe" type="text" name="recibe" required>
                    <label for="recibe" style="color: black;">Recibe</label>
                </div>
                <div class="col-sm-3">
                  <input class="form-control" id="correo" type="email" class="validate" name="correo" placeholder="email@dominio.udg.mx" ng-model="correo" required>
                  <span style="color: crimson;" ng-show="formulario.correo.$touched && formulario.correo.$invalid">Email es requerido.<br/></span>
                  <label for="correo" style="color: black;">Correo</label>
                </div>
                <div class="col-sm-2">
                 <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="10" minlength="10" pattern="[0-9]{10}" ng-model="telefono" placeholder="3312345678" required>
                 <span style="color: crimson;" ng-show="formulario.telefono.$touched && formulario.telefono.$invalid">Teléfono es requerido.<br/></span>
                 <label for="telefono" style="color: black;">Teléfono de contacto</label>
                </div>
                <div class="input-field col-sm-3">
                  <input class="form-control" id="area" type="text" class="validate" name="area" ng-model="area" placeholder="Área" required>
                  <span style="color: crimson;" ng-show="formulario.area.$touched && formulario.area.$invalid">Área es requerido.<br/></span>
                  <label for="area" style="color: black;">Área solicitante</label>
                </div>
                <div class="input-field col-sm-12">
                  <fieldset>
                    <legend>Ubicación del servicio</legend>
                    <div id="divModulo">
                      <label for="modulo" style="color: black;">Módulo:</label>
                      <select class="form-control" id="modulo" onclick="getModulo()"><option value="" disabled selected>Seleccione un Módulo.</option></select>
                      <button class="btn btn-danger" onclick="ereaseModule()">Cambiar</button><br>
                    </div>
                    <div id="divPiso">
                      <label for="piso" style="color: black;">Piso:</label>
                      <select class="form-control" id="piso" 
                      onclick="getPiso()"><option value="" disabled selected>Seleccione un Piso.</option></select>
                      <button class="btn btn-danger" onclick="ereaseFloor()">Cambiar</button><br>
                    </div>
                    <div id="divAula">
                      <label for="aula" style="color: black;">Aula:</label>
                      <select class="form-control" id="aula"
                      onclick="getAula()" 
                      ><option value="" disabled selected>Seleccione un Aula.</option></select>
                      <button class="btn btn-danger" onclick="ereaseAula()">Cambiar</btn><br>
                    </div>
                    <button class="btn btn-warning" onclick="ereaseItems()">Reiniciar</button>
                    <input class="form-control" id="anotacionExtra" type="text" name="anotacionExtra" placeholder="Escriba aqui si necesita hacer una descripción sobre el lugar.">
                    <label for="recibe" style="color: black;">Anotación Extra sobre el sitio</label>
                  </fieldset>
                </div>
                <div class="input-field col-sm-12">
                    <fieldset>
                      <legend>Descripción del servicio solicitado o falla a reparar</legend>
                      <div class="row">
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="1"/>
                                <span>Aire Acondicionado</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="2"/>
                                <span>Carpinteria</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="3"/>
                                <span>Cristales y/o estructura de aluminio</span>
                            </label>
                        </div>
                         <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="4"/>
                                <span>Eléctrico</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="5"/>
                                <span>Herrería</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="6"/>
                                <span>Hidráulico</span>
                            </label>
                        </div>
                         <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="7"/>
                                <span>Infraestructura</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="8"/>
                                <span>Jardinería</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="9"/>
                                <span>Limpieza</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="10"/>
                                <span>Pintura</span>
                            </label>
                        </div>
                        <div class="input-field col-sm-3">
                            <label style="color: black;">
                                <span id="inputOtro"></span>
                                <input name="descripcionServicio" id="descripcionServicio" type="radio" value="otro"> <input type="text" name="otro" id="otro" placeholder="Otro">
                                <span>Otro</span>
                            </label>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="input-field col-sm-12" id="txbox">
                  <fieldset>
                    <legend>Descripción del problema</legend>
<textarea rows="4" cols="50" name="descripcionProblema" id="descripcionProblema"></textarea>
                  </fieldset>
                </div>
                <div class="col-sm-12" id="divButton">
                  <button class="btn btn-primary" onclick="nuevoReporte()" id="btnNuevoReporte" ng-disabled="formulario.$invalid">Registrar Reporte
                  </button>
                </div>
      </form>       
    </div>
  <?php
    include("control-sidebar.php");
  ?>
  </div>
</div>
<?php
  require('footer.php');
?>
<script src="assets/js/libs/angular.min.js" type="text/javascript"></script>
<script src="assets/js/generar-reporte.js" type="text/javascript"></script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['personal'])){ 
  echo "<script>window.location.replace(`401.php`);</script>"; 
  } 
?>
<?php
  require_once('centinela.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SRG | Seguridad</title>
	<?php
    	include('header.php');
	?>
	<?php
    	include('cookiePolicy.php');
    ?>
</head>
<body class="hold-transition skin-purple sidebar-mini fixed" style="overflow: hidden;">
	<div class="wrapper">
	<?php
      include("navbar.php");
    ?>
    <?php
      include("sidebar.php");
    ?>
    <div class="content-wrapper" style="background: #212121; !important">
    	<section class="content-header">
    		<h1 style="color: #f5f5f5">
		        Dashboard-Seguridad
		        <small style="color: #f5f5f5">Sistema de Reportes Generales</small>
      		</h1>
			<ol class="breadcrumb">
				<li><a href="#" style="color: #f5f5f5"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active" style="color: #f5f5f5">Dashboard-Seguridad</li>
			</ol>
    	</section>
    	<!-- END Content Header (Page header) -->
    	<!-- Contenedor principal -->
    	<section class="content">
				<div class="alert alert-default alert-dismissible" style="background: green;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: white">&times;</button>
					<h4><i class="icon fa fa-info"></i>¡BIENVENID@!</h4>
					Este es su Dashboard, donde podrá ver el conteo de los reportes de Seguridad.<br/>
					En la barra lateral derecha tiene los accesos a cada módulo del sistema para la administración.
				</div>
				<!-- <div class="alert alert-error" style="background: red;">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-info"></i>Aviso:</h4>
					<h4><b>En este panel se mostrarán las actualizaciones del sistema.</b></h4>
					<h4>Para cualquier duda y/o problema ir a la sección de soporte.</h4>
				</div> -->
				<div class="row">
					<div class="input-field col-sm-6">
							<div class="box box-solid box-success">
									<div class="box-header with-border">
											<h3 class="box-title">REPORTES DE SEGURIDAD FORMATO 1</h3>
										</div>
									<div class="box-body" style="background-color: #9cff57">
										<div class="overlay">
											<i class="fa fa-refresh fa-spin" id="spinnerReporteS1"></i>
										</div>
										<h3><span id="reporteSeguridad1"></span> Reportes</h3>
									</div>
									<div style="background-color: #00b248">
           				 <a href="reportes-seguridad.php" class="small-box-footer" style="color: white">Ver Reportes de Seguridad Formato 1 <i class="fa fa-arrow-circle-right" style="color: white"></i></a>
            			</div>
								</div>
						</div>
						<div class="input-field col-sm-6">
							<div class="box box-solid box-success">
									<div class="box-header with-border">
											<h3 class="box-title">REPORTES DE SEGURIDAD FORMATO 2</h3>
										</div>
									<div class="box-body" style="background-color: #9cff57">
										<div class="overlay">
												<i class="fa fa-refresh fa-spin" id="spinnerReporteS2"></i>
										</div>
										<h3><span id="reporteSeguridad2"></span> Reportes</h3>
									</div>
									<div style="background-color: #00b248">
           				 <a href="reportes-seguridad2.php" class="small-box-footer" style="color: white">Ver Reportes de Seguridad Formato 2 <i class="fa fa-arrow-circle-right" style="color: white"></i></a>
            			</div>
								</div>
						</div>
				</div>
    	</section>
    </div>
    <?php
    	include("control-sidebar.php");
  	?>
	</div>
	<?php
  		include('footer.php');
	?>
<script src="assets/js/dashboard-seguridad.js" type="text/javascript"></script>
</body>
</html>
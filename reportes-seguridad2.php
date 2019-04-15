<!DOCTYPE html>
<html>
<head>
	<title>SRG | Seguridad</title>
	<?php
    	include('header.php');
  	?>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
	<div class="wrapper">
	  <?php
      include("navbar.php");
    ?>
    <?php
      include("sidebar.php");
    ?>
    <div class="content-wrapper">
    	<section class="content-header">
    		<h1>
		        Reportes de Seguridad Formato 2
		        <small>Sistema de Reportes Generales</small>
      		</h1>
			<ol class="breadcrumb">
				<li><a href="dashboard-seguridad.php"><i class="fa fa-dashboard"></i> Dashboard-Seguridad</a></li>
				<li class="active">Reportes de Seguridad 2</li>
			</ol>
    	</section>
    	<!-- END Content Header (Page header) -->
    	<!-- Contenedor principal -->
    	<section class="content">
			<ol class="breadcrumb" style="background-color: black; color: white;">
				<li><a href="dashboard-seguridad.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Reportes de Seguridad 2</li>
			</ol>
			<div class="alert alert-info alert-dismissible" style="background: green;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i>Ayuda</h4>
				De click sobre el ícono: <i class="fa fa-external-link" aria-hidden="true"></i> Para ver el reporte.<br/>
			</div>
			<div class="row">
			
				<div class="input-field col-sm-12">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Listado de Reportes</h3>
						</div>
						<div class="box-body">
							<div class="col-sm-12">
								<button class="btn btn-primary" id="btnReportesSeguridad2" onclick="reportesTodosFormato2()" style="background-color: #00c853; color: white;">Refrescar</button>
							</div>
						</div>
					</div>

				</div>
			</div>
<span id="tablaResultados"></span>
<span id="modalReporteSeg2"></span>
    	</section>
    </div>
    <?php
    	include("control-sidebar.php");
  	?>
	</div>
	<?php
  		include('footer.php');
	?>
<script type="text/javascript" src="assets/js/reportes-seguridad2.js"></script>
</body>
</html>
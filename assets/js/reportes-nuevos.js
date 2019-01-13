const nuevaBusqueda = function(){
  let aPaterno = document.getElementById('txtApaterno').value;
  let aMaterno = document.getElementById('txtAmaterno').value;
  let nombre = document.getElementById('txtNombre').value;
  let folio = document.getElementById('txtFolio').value;
  if(aPaterno === ''){
    aPaterno = '""';
  }
  if(aMaterno === ''){
    aMaterno = '""';
  }
  if(nombre === ''){
    nombre = '""';
  }
  if(folio === ''){
    folio = '""';
  }
  reporte(aPaterno,aMaterno,nombre,folio);
}
const reporte = function(aPaterno,aMaterno,nombre,folio){
  $("#tablaResultados").empty();
  $("#tablaResultados").append(`<br><table class='table'>
  <thead>
  <tr class='bg-primary'>
  <th>Folio</th>
  <th>Nombre</th>
  <th>Apellido Paterno</th>
  <th>Apellido Materno</th>
  <th>Fecha Elaboracion</th>
  <th>Detalles</th>
  </tr>
  </thead>
  <tbody id="bodyTable">`);
  $.ajax({
    type: "GET",
    url: 'http://localhost/API-CUCEI-SRG/index.php/reporte/reportenpp/'+aPaterno+'/'+aMaterno+'/'+nombre+'/'+folio,
    dataType: "json",
    success: function(data){
      $.each(data,function(key, registro) {
        $("#bodyTable").append(`
        <tr>
        <input type="hidden" id="folioId" value="`+registro.folio+`"/>
        <td>`+registro.folio+`</td>
        <td>`+registro.nombre+`</td>
        <td>`+registro.a_paterno+`</td>
        <td>`+registro.a_materno+`</td>
        <td>`+registro.fecha_elaboracion+`</td>
        <td><button class='btn btn-primary' id="btnVerReporte" data-toggle="modal" data-target="#myModal" onclick="regSel('`+registro.folio+`','`+this+`')">Ver</button></td>
        </tr>
        `);
      });
      $("#container").append(`</tbody>
        </table>`);
    },
    error: function(data) {
      console.log(data);
      $("#bodyTable").append(`<p style="color: red;">No Hay Resultados Para Mostrar.</p>`);
    }
  });
}
function regSel(value,object){
    let selectedFolio = object.innerHTML = value;
    generateModal(selectedFolio);
}
function generateModal(selectedFolio){
$("#modal").empty();
$("#modal").append(`<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="background-color: #FAAC58">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Datos del Reporte:</h4>
    </div>
    <div class="modal-body" style="background-color: #F5ECCE" id="bodyModal">`);
    $.ajax({
      type: "GET",
      url: 'http://localhost/API-CUCEI-SRG/index.php/reporte/reporteindpp/'+selectedFolio,
      dataType: "json",
      success: function(data){
        $.each(data,function(key, registro) {
          let ds;
          if (registro.descripcion_servicio === '1') {
            ds = "Aire Acondicionado";
          }else
          if (registro.descripcion_servicio === '2') {
            ds = "Carpinteria";
          }else
          if (registro.descripcion_servicio === '3') {
            ds = "Cristales y/o estructura de aluminio";
          }else
          if (registro.descripcion_servicio === '4') {
            ds = "Eléctrico";
          }else
          if (registro.descripcion_servicio === '5') {
            ds = "Herrería";
          }else
          if (registro.descripcion_servicio === '6') {
            ds = "Hidráulico";
          }else
          if (registro.descripcion_servicio === '7') {
            ds = "Infraestructura";
          }else
          if (registro.descripcion_servicio === '8') {
            ds = "Jardinería";
          }else
          if (registro.descripcion_servicio === '9') {
            ds = "Limpieza";
          }else
          if (registro.descripcion_servicio === '10') {
            ds = "Pintura";
          }else {
            ds = registro.descripcion_servicio;
          }
          $("#modal").find(".modal-body").append(`<div class="row">
            <div class="col-sm-2" style="background-color:gray;">
              <input class="form-control" id="txtFolioR" value="`+registro.folio+`" style="color: white;" disabled>
              <label for="txtFolioR" style="color: black;">Folio</label>
            </div>
            <div class="col-sm-4">
              <input class="form-control" id="txtFecha" value="`+registro.fecha_elaboracion+`" disabled>
              <label for="txtFecha" style="color: black;">Fecha de Elaboracion</label>
            </div>
            <div class="col-sm-4">
              <input class="form-control" id="txtRecibe" value="`+registro.recibe+`" disabled>
              <label for="txtRecibe" style="color: black;">Recibe</label>
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="txtFechaRecepcion" value="`+registro.fecha_recepcion+`">
                <label for="txtFechaRecepcion" style="color: black;"><small style="color: blue">*</small>Fecha de Recepcion</label>
            </div>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="txtFechaAsignacion" value="`+registro.fecha_asignacion+`">
              <label for="txtFechaAsignacion" style="color: black;"><small style="color: blue">*</small>Fecha de Asignacion</label>
            </div>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="txtFechaReparacion" value="`+registro.fecha_reparacion+`">
              <label for="txtFechaReparacion" style="color: black;"><small style="color: blue">*</small>Fecha de Reparacion</label>
            </div>
            <div class="col-sm-4">
              <input class="form-control" id="txtNombre" value="`+registro.nombre+`" disabled>
              <label for="txtNombre" style="color: black;">Nombre</label>
            </div>
            <div class="col-sm-4">
              <input class="form-control" id="txtApaterno" value="`+registro.a_paterno+`" disabled>
              <label for="txtApaterno" style="color: black;">Apellido Paterno</label>
            </div>
            <div class="col-sm-4">
              <input class="form-control" id="txtAmaterno" value="`+registro.a_materno+`" disabled>
              <label for="txtAmaterno" style="color: black;">Apellido Materno</label>
            </div>
            <div class="col-sm-3">
              <input class="form-control" id="txtTelefono" value="`+registro.telefono+`" disabled>
              <label for="txtTelefono" style="color: black;">Teléfono</label>
            </div>
            <div class="col-sm-3">
              <input class="form-control" id="txtAreaSolicitante" value="`+registro.area_solicitante+`" disabled>
              <label for="txtAreaSolicitante" style="color: black;">Área Solicitante</label>
            </div>
            <div class="col-sm-6">
              <input class="form-control" id="txtUbicacionServicio" value="`+registro.ubicacion_servicio+`" disabled>
              <label for="txtUbicacionServicio" style="color: black;">Ubicación del Servicio</label>
            </div>
            <div class="col-sm-12">
              <hr style="color: black; border: 1px dotted;">
            </div>
            <div class="col-sm-6">
<textarea rows="4" cols="50" id="txtAnotacionExtra" style="background-color: #F7D358;" disabled>`+registro.anotacion_extra+`</textarea>
              <label for="txtAnotacionExtra" style="color: black;">Anotación extra</label>
            </div>
            <div class="col-sm-6">
<textarea rows="4" cols="50" id="txtAnotacionExtra" style="background-color: #F7D358;" disabled>`+registro.descripcion_problema+`</textarea>
              <label for="txtDescripcionProblema" style="color: black;">Descripcion del Problema</label>
            </div>
            <div class="col-sm-12">
              <input class="form-control" id="txtDescripcionServicio" value="`+ds+`" disabled>
              <label for="txtDescripcionServicio" style="color: black;">Descripcion del Servicio</label>
            </div>
            `);
        });
        let fechaRecepcion = document.getElementById('txtFechaRecepcion').value;
        let fechaAsignacion = document.getElementById('txtFechaAsignacion').value;
        let fechaReparacion = document.getElementById('txtFechaReparacion').value;
        let fer = new Date(fechaRecepcion);
        let fa = new Date(fechaAsignacion);
        let fr = new Date(fechaReparacion);
        if (!isNaN(fer)) {
          document.getElementById("txtFechaRecepcion").disabled = true;
        }
        if (!isNaN(fa)) {
          document.getElementById("txtFechaAsignacion").disabled = true;
        }
        if (!isNaN(fr)) {
          document.getElementById("txtFechaReparacion").disabled = true;
        }
        $("#modal").find(".modal-body").append(`</div><div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="background-color: green; color: white;"><i class="fa fa-print" aria-hidden="true">Imprimir</i></button>
          <button type="button" class="btn btn-danger" style="background-color: red; color: white;" onclick="cancelarReporte()"><i class="fa fa-ban" aria-hidden="true"></i>Cancelar Reporte</button>
          <button type="button" class="btn btn-secondary" style="background-color: orange; color: white;"><i class="fa fa-user" aria-hidden="true"></i>Asignar Encargado</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="guardarReporte()" style="background-color: blue; color: white;"><i class="fa fa-floppy-o" aria-hidden="true"></i>Guardar Cambios</button>
        </div>
        </div>
        </div>
        </div>`);
      },
      error: function(data) {
      }
    });
}
function guardarReporte(){
  let token = localStorage.getItem("token");
  let folio = document.getElementById('txtFolioR').value;
  let fechaRecepcion = document.getElementById('txtFechaRecepcion').value;
  let fechaAsignacion = document.getElementById('txtFechaAsignacion').value;
  let fechaReparacion = document.getElementById('txtFechaReparacion').value;
  let datos = {
    "token" : token,
    "folio" : folio,
    "fecha-recepcion" : fechaRecepcion,
    "fecha-asignacion" : fechaAsignacion,
    "fecha-reparacion" : fechaReparacion
  }
  console.log(JSON.stringify(datos));
  $.ajax({
    type: 'POST',
    url: 'http://localhost/API-CUCEI-SRG/index.php/reporte/modreporte',
    data: JSON.stringify(datos),
    contentType: 'application/json; charset=utf-8',
    dataType: 'json',
    success: function(data){
      swal("¡Registro Modificado!", "Se ha Modificado correctamente el reporte.", "success");
      $('#myModal').modal('hide');
    },
    error: function(data) {
      swal("Reporte de Mantenimiento",data.responseJSON.mensaje, "info");
    }
  });
}
const cancelarReporte = function(){
  swal("¿Estás Seguro de Cancelar el reporte?", {
    buttons: {
    catch: {
      text: "SI",
      value: "OK",
      },
      no: true,
    },
  }).then((value) => {
  switch (value) {
    case "OK":
      let token = localStorage.getItem("token");
      let folio = document.getElementById('txtFolioR').value;
      let datos = {
        "token" : token,
        "folio" : folio
      }
      $.ajax({
        type: 'POST',
        url: 'http://localhost/API-CUCEI-SRG/index.php/reporte/cancelar',
        data: JSON.stringify(datos),
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function(data){
          console.log(data);
          swal("¡Registro Modificado!", "Se ha Cancelado correctamente el reporte.", "success");
          $('#myModal').modal('hide');
        },
        error: function(data) {
          swal("Reporte de Mantenimiento",data.responseJSON.mensaje, "info");
        }
      });
    break;
    case "no":
    swal("Reporte de Mantenimiento","No se realizó ningun cambio", "info");
    break;
  }
 });
}
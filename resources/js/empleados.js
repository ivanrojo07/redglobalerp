// Empleado
$(document).ready(function(){
  $(":text").keyup(function(){
var sucursal=$("#tipo").prop('value');
var numero=$("#consecutivo").prop('value');
  $("#identificador").prop('value','RGC'+sucursal+numero);

   });

$("#tipo").change(function(){
  var sucursal=$("#tipo").prop('value');
var numero=$("#consecutivo").prop('value');
  $("#identificador").prop('value','RGC'+sucursal+numero);
  });
});
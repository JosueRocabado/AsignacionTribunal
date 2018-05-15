/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function alerta(f){
   
  var ok = true;
  var msg = "Debes escribir contenido en los campos:\n";
  if(f.elements[0].value == "")
  {
      alert('estoy aqui'); 
   // msg += "- Marca 1\n";
   // ok = false;
  }
  if(ok == false)
    alert(msg);
  return ok;
//    if (document.form_id.nombre_usr.value.length == 0) {
//        alert("Tiene que escribir su nombre")
//        alertify.alert("<b>Blog Reaccion Estudio</b> probando Alertify", function () {
//    })
//        document.formulario.nombre.focus()
//        return 0;
//    }

    
}
/**cambio de tema para seleccionar esta en la vista segun area**/
//$('#cambiar_titulo').change(function () {
//    alert( $(this).val() );
//    window.location.href = 'index.php?r=site%2Fsegun_area&code='+$(this).val();
////    if ($(this).val() !== '') {
////        alert("estoy aqui");
////        $('#link-uso-control-vacacion').prop('disabled', false);
////        calcularDiasRestantesReal();
////    } else {
////        alert("estoy aqui");
////        $('#link-uso-control-vacacion').prop('disabled', true);
////    }
//});


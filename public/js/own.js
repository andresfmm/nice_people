function eliminarUsuario(id){
        window.swal({
  title: 'Deseas eliminar este empleado?',
  text: "No se podra deshacer esta accion",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminarlo!',
  cancelButtonText: 'No, cancelar!',
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false
}).then(function () {
  
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         type:'POST',
         url:'deleteUsuario',
         data:{id:id},
         success:function(dato){
            swal(
            'Eliminado!',
            'Tu registro ha sido eliminado con exito.',
            'success'
            )
         }
    })
    
  
}, function (dismiss) {
  // dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  if (dismiss === 'cancel') {
    swal(
      'Cancelado',
      'Registro a salvo :)',
      'error'
    )
  }
 });
}




function getup(){
             // var url = 'getupdateusuarios';
             // alert(id);
             // axios.get(url,{
                 
             // }).then( response => {
             //  alert(response.data);
             //    this.adminusuarios.Uid = response.data[0].id;
             //    this.adminusuarios.nombre = response.data[0].name;
             //    this.adminusuarios.email = response.data[0].email;
             //    this.adminusuarios.listas = response.data;
             // }).catch( error => {

             // });
      } /* closed brackets getupdateusuarios */
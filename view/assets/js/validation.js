
/*==============================================================
=            Validation before delete some register            =
==============================================================*/


function confirmDelete() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
          swal({
            title: "¿Está seguro?",
            text: "Aun está a tiempo antes de eliminarlo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, Eliminar!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
        function(isConfirm){
          if (isConfirm) {
            form.submit();          // submitting the form when user press yes            
          } else {
            swal("Cancelado", "El registro no fue eliminado :)", "error");            
            
    }
  });
}

/*=====  End of Validation before delete some register  ======*/

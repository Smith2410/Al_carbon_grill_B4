<?php
	session_start();
	include '../library/configServer.php';
	include '../library/consulSQL.php';

	$dniChef=consultasSQL::clean_string($_POST['chef-dni']);
	$cons=ejecutarSQL::consultar("SELECT * FROM producto WHERE Cocinero_dni='$dniChef'");
	if(mysqli_num_rows($cons)<=0)
	{
	    if(consultasSQL::DeleteSQL('cocinero', "DNI='".$dniChef."'"))
	    {
	        echo '<script>
			    swal({
					title: "Cocinero eliminado",
					text: "Los datos del cocinero se eliminaron con exito",
					type: "success",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Aceptar",
					cancelButtonText: "Cancelar",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {
						location.reload();
					} else {
						location.reload();
					}
			    });
			</script>';
	    }else{
	       echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>'; 
	    }
	}else{
	    echo '<script>swal("ERROR", "Lo sentimos no podemos eliminar el cocinero ya que existen platillos asociados a este cocinero", "error");</script>';
	}
	mysqli_free_result($cons);
?>
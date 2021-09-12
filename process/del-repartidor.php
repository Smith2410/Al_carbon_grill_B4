<?php
	session_start();
	include '../library/configServer.php';
	include '../library/consulSQL.php';

	$dniRepart=consultasSQL::clean_string($_POST['repar-dni']);
	$cons=ejecutarSQL::consultar("SELECT * FROM venta WHERE Repartidor_dni='$dniRepart'");
	if(mysqli_num_rows($cons)<=0)
	{
	    if(consultasSQL::DeleteSQL('administrador', "DNI='".$dniRepart."'"))
	    {
	        echo '<script>
			    swal({
					title: "Repartidor eliminado",
					text: "Los datos del repartidor se eliminaron con exito",
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
	    echo '<script>swal("ERROR", "Lo sentimos no podemos eliminar el repartidor ya que existen platillos asociados a este repartidor", "error");</script>';
	}
	mysqli_free_result($cons);
?>	
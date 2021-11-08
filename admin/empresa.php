<?php
include('includes/connection.php');
include('includes/adminheader.php');
include ('includes/adminnav.php');

if (isset($_SESSION['role'])) {
	$currentrole = $_SESSION['role'];
}
if ( $currentrole == 'user' OR $currentrole == 'administrador' ) {
	echo "<script> alert('Solo los Administradores pueden agregar Usuarios');
	window.location.href='./index.php'; </script>";
}
else {
	//ACCIONES

}
?>

<!-- CONTENEDOR AGREGAR Y TABLA DE CONSULTA -->
<div class="container-fluid">
	<!--SOLO EL ROL SUPERADMINISTRADOR PUEDE ACCEDER A ESTA SESION -->
	<?php if($_SESSION['role'] == 'superadmin')  
	{ ?>
		<div class="row">
			<div class="col-lg-12">
				Crear empresas
			</div>
		</div>
	<?php }?>
</div> 
</div><!-- DIV QUE CIERRA EL CONTENEDOR DEL NAV -->
<script type="text/javascript">
	$(document).ready(function(){
	if (window.history.replaceState) { // verificamos disponibilidad
		window.history.replaceState(null, null, window.location.href);
	}
}
</script>

<?php include ('includes/adminfooter.php');?>

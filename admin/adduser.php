<!-- AGREGAR LA CLASE GUMP CUANDO TENGAMOS EL NUEVO SERVIDOR Y ASI PODER PONER RESTRINGCIONES EL EL TEXTO PW Y DEMAS -->
<?php
include('includes/connection.php');
include('includes/adminheader.php');
include ('includes/adminnav.php');
if (isset($_SESSION['role'])) {
	$currentrole = $_SESSION['role'];
}
if ( $currentrole == 'user') {
	echo "<script> alert('Solo los Administradores pueden agregar Usuarios');
	window.location.href='./index.php'; </script>";
}
else {
	if (isset($_POST['add'])) {
		if ($_POST['password'] !== $_POST['cpassword']) 
		{
			echo  "<center><font color='red'>Las contraseñas no coinciden </font></center>";
		}
		else {
			$id_usuario=$_POST['id_usuario'];
			$username = $_POST['username'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			$pass = $_POST['password'];
			$password = password_hash("$pass" , PASSWORD_DEFAULT);
			$query = "INSERT INTO users(username,firstname,lastname,email,password,role) VALUES ('$username' , '$firstname' , '$lastname' , '$email', '$password' , '$role')";
			$result = pg_query($query);
			if (pg_affected_rows($result) > 0) {
				echo "<script>swal('Nuevo Usuario Agregado');
				window.location.href='index.php';</script>";
			}
			else {
				echo "<script>swal('Ocurrio un error, inténtalo nuevamente');</script>";
			}
		}
	}
}
?>

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-lg-8 col-md-8">
			<h3 class="page-header">
				Agregar nuevo Usuario
			</h3>

			<form role="form" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="user_title">Identificacion</label>
					<input type="number" name="id_usuario" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="user_title">Usuario</label>
					<input type="text" name="username" class="form-control" required>
				</div>



				<div class="form-group">
					<label for="user_author">Nombre</label>
					<input type="text" name="firstname" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="user_status">Apellido</label>
					<input type="text" name="lastname" class="form-control" required>
				</div>

				<div class="input-group">
					
					<select class="form-control" name="role" id="">
						<label for="user_role">Rol</label>
						<?php

						echo "<option value='admin'>Administrador</option>";
						echo "<option value='user'>Usuario</option>";
						echo "<option value='superadmin'>Super Usuario</option>";
						?>

					</select>

				</div>
				<br>
				<div class="form-group">
					<label for="user_tag">Correo</label>
					<input type="email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="user_tag">Contraseña</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="user_tag">Confirmar Contraseña</label>
					<input type="password" name="cpassword" class="form-control" required>
				</div>


				<button type="submit" name="add" class="btn btn-primary" value="Add User">Agregar Usuario</button>

			</form>
		</div>
		<div class="col-md-2"></div>
		
		<?php
		include('includes/adminfooter.php');
		?>

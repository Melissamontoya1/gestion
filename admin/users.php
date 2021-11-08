<?php include ('includes/connection.php'); 
include "includes/adminheader.php";
include "includes/adminnav.php";
if (isset($_SESSION['role'])) {
    $currentrole = $_SESSION['role'];
}
if ( $currentrole == 'user') {
    echo "<script> alert('SOLO EL ADMINISTRADOR PUEDE VER USUARIOS');
    window.location.href='./index.php'; </script>";
}
else if ($currentrole == 'superadmin') {
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <h3 class="page-header">
                <div class="col-xs-4">
                    <a href="adduser.php" class="btn btn-primary">Agregar Usuario</a>
                </div>
                <center>
                    Todos los Usuarios
                </center>
            </h3>
                <table id="tabla_usuarios" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Cambiar Rol</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $query = "SELECT * FROM users";
                        $select_users = pg_query($conn, $query);
                        if (pg_num_rows($select_users) > 0 ) {
                            while ($row = pg_fetch_array($select_users)) {
                                $user_id = $row['id_usuario'];
                                $username = $row['username'];
                                $user_firstname = $row['firstname'];
                                $user_lastname = $row['lastname'];
                                $user_email = $row['email'];
                                $user_role = $row['role'];
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$username</td>";
                                echo "<td>$user_firstname</td>";
                                echo "<td>$user_lastname</td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_role</td>";
                                echo "<td><a href='users.php?change_to_admin=$user_id''>Volver Administrador</a></td>";
                                echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('¿Estás seguro de que deseas eliminar a este usuario?')\" href='users.php?delete=$user_id'><i  class='bi bi-trash'></i></a></td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>

                    <?php 
                }

                if (isset($_GET['delete'])) {
                    $the_user_id = $_GET['delete'];
                    $query0 = "SELECT role FROM users WHERE id_usuario = '$the_user_id'";
                    $result = pg_query($conn , $query0);
                    if (pg_num_rows($result) > 0 ) {
                        $row = pg_fetch_array($result);
                        $id1 = $row['role'];
                    }
                    if ($id1 == 'superadmin') {
                        echo "<script>swal('El Perfil Super Administrador no puede ser cambiado');</script>";
                    }
                    else {

                        $query = "DELETE FROM users WHERE id_usuario = '$the_user_id'";

                        $delete_query = pg_query($conn, $query);
                        if (pg_affected_rows($delete_query) > 0 ) {
                            echo "<script>swal('Usuario borrado satisfactoriamente');
                            window.location.href= 'users.php';</script>";
                        }
                    }
                }


                if (isset($_GET['change_to_admin'])) {
                    $the_user_id = $_GET['change_to_admin'];

                    $query0 = "SELECT role FROM users WHERE id_usuario = '$the_user_id'";
                    $result = pg_query($conn , $query0);
                    if (pg_num_rows($result) > 0 ) {
                        $row = pg_fetch_array($result);
                        $id1 = $row['role'];
                    }
                    if ($id1 == 'admin') {
                        echo "<script>swal('Este Usuario ya es Administrador');</script>";
                    }
                    else if ($id1 == 'superadmin') {
                        echo "<script>swal('No se puede cambiar el rol de superadministrador');</script>";
                    }
                    else {
                        $query = "UPDATE users SET role = 'admin' WHERE id_usuario = '$the_user_id'";

                        $change_to_admin_query = pg_query($conn, $query);
                        if (pg_affected_rows($conn) > 0 ) {
                            echo "<script>swal('Good job!', 'Usuario cambiado a perfil Administrador con éxito', 'success');
                            window.location.href= 'users.php'; </script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php 
}
else {
    ?>
   


        <?php include "includes/adminnav.php"; ?>

        

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Todos los Usuarios
                        </h1>



                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th>Rol</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php 

                                $query = "SELECT * FROM users";
                                $select_users = pg_query($conn, $query);
                                if (pg_num_rows($select_users) > 0 ) {
                                    while ($row = pg_fetch_array($select_users)) {
                                        $user_id = $row['id_usuario'];
                                        $username = $row['username'];
                                        $user_firstname = $row['firstname'];
                                        $user_lastname = $row['lastname'];
                                        $user_email = $row['email'];
                                        $user_role = $row['role'];
                                        echo "<tr>";
                                        echo "<td>$user_firstname</td>";
                                        echo "<td>$user_lastname</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_role</td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>

                            <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

}
?>


<?php include ('includes/adminfooter.php');?>

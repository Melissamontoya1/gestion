<?php 
include 'includes/adminheader.php';
include 'includes/adminnav.php';
?>


<!-- Content Row -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
        </div>
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                $user_num = mysqli_num_rows($result);
                                ?>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo "{$user_num}"; ?></div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <br>
                                    <a href="users.php">  <span class="pull-left">Ver todos los Usuarios</span></a> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div><!-- DIV QUE CIERRA EL CONTENEDOR DEL NAV -->
    <?php include ('includes/adminfooter.php');?>



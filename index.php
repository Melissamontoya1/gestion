<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A&L Sistema de Gestión</title>

    <!-- Custom fonts for this template-->
    <link href="admin/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <br>
            <div class="pt-5 col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body pt-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="pt-5 col-lg-6 d-none d-lg-block">
                      
                                <center><img src="admin/img/logo.png" class="img-fluid pt-5 ml-3"></center>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Ingresar al Sistema</h1>
                                    </div>
                                    <form method="POST" action="login.php">
                                        <div class="">
                                           <input name="user_name" type="text" class="form-control" placeholder="Usuario" required>
                                           <br>
                                       </div>

                                       <div class="input-group">
                                        <input name="user_password" type="password" class="form-control" placeholder="Contraseña" required>
                                        <br>
                                        <span class="input-group-btn">
                                            <button name="login" class="btn btn-primary" type="submit">
                                                Ingresar
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="admin/js/jquery/jquery.min.js"></script>
<script src="admin/js/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="admin/js/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
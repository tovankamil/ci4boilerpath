<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url() ?>/dist/css/core.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/dist/css/admin.css">
    <title> Login Admin</title>
</head>

<body class="d-flex flex-col justify-content-center  align-items-center min-vw-100 min-vh-100">
    <section class="d-flex flex-col justify-content-center  align-items-center container w-100">
        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block loginadmin">
                            <img src="<?php echo base_url() ?>/dist/img/herbal.jpg" alt="">
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"> Admin!</h1>
                                </div>
                                <form class="user" method='post' action="<?php echo base_url() ?>/loginadmin/auth">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name='username' placeholder="Username" require>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="password" id="Password" placeholder="Password" require>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </section>

</body>

</html>
<?php

use App\Controllers\Utils;

$utils = new Utils();
$username = $utils->getAdminSession();
function connectDatabase()
{
    return $db  = \Config\Database::connect();
}

function dataweb()
{
    $db = connectDatabase();
    $query = $db->query("select * from data_web ");
    //$db->close();
    return $query->getResultArray();
}
$data = dataweb();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data[0]['nama_web'] ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/dist/fonts/fontawesome-free-6.1.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/dist//css/admin_global.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/dist//css/admin_editprofile.css">


</head>

<body id="page-top">
    <!-- Modal -->
    <!-- Button trigger modal -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center logo" href="index.html">
                <div class="logo_box_image">
                    <img src="<?php echo base_url() ?>/dist/img/logox.png" alt="">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url() ?>/dashboard">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamitra" aria-expanded="true" aria-controls="datamitra">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Profile</span>
                </a>
                <div id="datamitra" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-transparent py-2 collapse-inner rounded">

                        <a class="collapse-item" href="<?php echo base_url() ?>/editprofile"><i class="fa-solid fa-pen-ruler"></i>
                            Edit Profile</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    <span>Berita</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-transparent  py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>/adminpost"><i class="fa-solid fa-layer-group"></i>
                            Post</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>/adminberita"><i class="fa-solid fa-layer-group"></i>
                            Input Berita</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>/adminimages">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Images</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>/adminyoutube">
                    <i class="fa-solid fa-arrow-down-up-across-line"></i>
                    <span>Youtubes</span></a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>/loginadmin/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="d-flex namaheader">
                        <h5><?php echo $username ?></h5>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php echo $data[0]['url_web'] ?> 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Modal -->
    <div class="modal fade" id="transferpin" tabindex="-1" aria-labelledby="transferpinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="transferpinLabel">Transfer Pin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row px-4 py-2">

                        <div class="form-group row mb-5 ">
                            <label for="">ID Penerima</label>
                            <div class="col-sm-12 mb-3 mb-sm-3">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan ID yang akan diterima">
                            </div>
                            <label for="">Jumlah Pin</label>
                            <div class="col-sm-12 mb-3 mb-sm-3">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukan jumlah pin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <!-- Modal -->

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/dist/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/dist/js/sb-admin-2.js"></script>

    <script>
        $('#summernote').summernote({
            height: 600,
            width: 600,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript', 'fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['Insert', ['picture']]
            ],
            styleTags: [
                'p',
                {
                    title: 'Blockquote',
                    tag: 'blockquote',
                    className: 'blockquote',
                    value: 'blockquote'
                },
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ],

            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
            fontSizeUnits: ['px', 'pt'],
            maxWidth: 300

        });
    </script>

</body>

</html>
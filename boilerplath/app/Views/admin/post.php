<?= $this->extend('admin/main_admin'); ?>
<?= $this->section('content');

use App\Controllers\Utils;

$allFunction = new Utils();
?>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<div class="row">

    <div class="col-12 mb-3">
        <h3 class="title">Berita </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>





    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Data Berita</h5>
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Judul Berita
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Dibaca
                                </th>
                                <th>
                                    Fokust Berita
                                </th>
                                <th>
                                    Running Text
                                </th>
                                <th>
                                    Peliput
                                </th>
                                <th>
                                    Action
                                </th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($berita as $beritas) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['judul'] ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['tanggal'] ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['dibaca'] ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['fokus_berita'] ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['running_text'] ?>
                                    </td>
                                    <td>
                                        <?php echo $beritas['peliput'] ?>
                                    </td>
                                    <td>
                                        <div class="ml-3 d-flex justify-content-start align-items-center">
                                            <a href="<?php echo base_url() ?>/adminberita/update/<?php echo $beritas['id_berita']  ?>" class="btn btn-warning  btn-sm  w-50 mb-3 text-center mx-2">
                                                Update
                                            </a>
                                            <a href="<?php echo base_url() ?>/adminberita/delete/<?php echo $beritas['id_berita']  ?>" class="btn btn-danger btn-sm w-50 mb-3 text-center">
                                                Delete
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
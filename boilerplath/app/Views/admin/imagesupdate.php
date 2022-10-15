<?= $this->extend('admin/main_admin'); ?>
<?= $this->section('content');

use App\Controllers\Utils;

$allFunction = new Utils();
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<div class="row">

    <div class="col-12 mb-3">
        <h3 class="title">Images </h3>
    </div>


    <div class="col-12 mb-3">
        <div class="card">
            <div class="card-body">
                <?php foreach ($imagesbyid as $imagesbyids) { ?>
                    <form action="<?php echo base_url() ?>/adminimages/updateimage" method="post" enctype="multipart/form-data">
                        <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                            <label for="caridata" class="mb-2">Judul</label>
                            <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Judul" name="judul" value="<?php echo $imagesbyids['judul'] ?>" required>
                            <input type="hidden" value="<?php echo $imagesbyids['id'] ?>" name="id">
                        </div>
                        <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                            <label for="caridata" class="mb-2">Judul Gambar</label>
                            <input type="file" class="form-control form-control-user mr-2 mb-4" placeholder="Gambar" name="userfile">

                        </div>
                        <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-start align-items-baseline">
                            <label for="caridata" class="mb-2 labelisiberita"></label>
                            <textarea name="keterangan" id="summernote" cols="30" rows="10"><?php echo $imagesbyids['keterangan'] ?></textarea>

                            <script>
                                $('#summernote').summernote({
                                    placeholder: 'Masuk Keterangan Images',
                                    tabsize: 2,
                                    height: 100
                                });
                            </script>

                        </div>
                        <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                            <label for="caridata" class="mb-2">Fotografer</label>
                            <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Fotografer" name="Fotografer" value="<?php echo $imagesbyids['fotografer'] ?>">

                        </div>

            </div>
            <hr>
            <div class="ml-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary w-25 mb-3 text-center">
                    Update Gambar
                </button>
            </div>

            </form>
        <?php } ?>
        </div>
    </div>



    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Data Images</h5>
                <div class="table-responsive-sm">
                    <style>
                        .table tr td img {
                            width: 128px;
                            object-fit: contain;
                        }
                    </style>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Gambar
                                </th>
                                <th>
                                    Fotografer
                                </th>
                                <th>
                                    Action
                                </th>


                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($images as $image) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no ?>
                                    </td>
                                    <td>
                                        <?php echo $image['judul'] ?>
                                    </td>
                                    <td>
                                        <?php echo $image['tanggal'] ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url() ?>/uploads/<?php echo $image['gambar'] ?>" alt="">
                                    </td>
                                    <td>
                                        <?php echo $image['fotografer'] ?>
                                    </td>
                                    <td>
                                        <div class="ml-3 d-flex justify-content-start align-items-center">
                                            <a href="<?php echo base_url() ?>/adminimages/update/<?php echo $image['id']  ?>" class="btn btn-warning  w-50 mb-3 text-center mx-2">
                                                Update
                                            </a>
                                            <a href="<?php echo base_url() ?>/adminimages/delete/<?php echo $image['id']  ?>" class="btn btn-danger w-50 mb-3 text-center">
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
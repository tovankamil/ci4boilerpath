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
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </nav>
    </div>


    <div class="col-12 mb-3 ">
        <div class="card">
            <div class="card-body p-0 pt-2 pl-2 p-sm-4">
                <form action="<?php echo base_url() ?>/adminberita/input" method="post" enctype="multipart/form-data">

                    <div class="d-flex flex-column flex-sm-row justify-between">
                        <div class="col-12 col-sm-8 border pt-4">
                            <!-- Isi Judul -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                <label for="caridata" class="mb-2">Judul Berita</label>
                                <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Judul Berita" name="judul" required>
                            </div>

                            <!-- Isi Berita -->
                            <div class="formCariDataMitra d-flex flex-1 mb-4 flex-column flex-sm-row justify-content-between align-items-baseline w-100 overflow-hidden">
                                <label for="caridata" class="mb-2 labelisiberita w-12">Isi Berita</label>
                                <textarea name="isi" id="summernote" cols="30" rows="10" class="flex-1"></textarea>
                            </div>
                        </div>


                        <div class="col-12 col-sm-4">

                            <!-- Kategori -->
                            <div class="formCariDataMitra d-flex w-full mb-4 flex-column flex-sm-row justify-content-start align-items-baseline">
                                <label for="caridata" class="mb-2 ">Kategori</label>
                                <select name="kategori" id="" required class="p-2 ">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $kategoridata) { ?>
                                        <option value="<?php echo  $kategoridata['id'] ?>"><?php echo ucfirst($kategoridata['nama_kategori']) ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <!-- Fokus Berita / Running text -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-start align-items-baseline">
                                <label for="caridata" class="mb-2 ">Fokus</label>

                                <select name="fokus" id="" required class="p-2">
                                    <option value="">Pilih Fokus</option>
                                    <option value="1">Fokus Berita</option>
                                    <option value="2">Running Text</option>
                                </select>


                            </div>


                            <!-- Gambar -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                <label for="caridata" class="mb-2">Gambar</label>
                                <input type="file" class="form-control form-control-user mr-2 mb-4" placeholder="Gambar" name="userfile" required>
                            </div>



                            <!-- Slug -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                <label for="caridata" class="mb-2 w-25">Slug</label>
                                <input type="text" class="form-control form-control-user  mb-4" placeholder="Slug" name="slug">

                            </div>


                            <!-- Tag -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                <label for="caridata" class="mb-2">Tag</label>
                                <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Tag" name="tag">

                            </div>


                            <!-- Peliput -->
                            <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                <label for="caridata" class="mb-2">Reporter</label>
                                <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Peliput" name="peliput">

                            </div>
                        </div>
                    </div>





                    <!-- <textarea name="editor"></textarea>
                    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('editor');
                    </script> -->


            </div>

            <div class="ml-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary text-center mb-2">
                    Input Berita
                </button>
            </div>

            </form>
        </div>
    </div>

</div>



<?= $this->endSection() ?>
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
    </div>



    <div class="col-12 mb-3 ">
        <div class="card">
            <div class="card-body p-0 pt-2 pl-2 p-sm-4">
                <?php foreach ($beritabyid as $beritabyids) { ?>
                    <form action="<?php echo base_url() ?>/adminberita/updateberita" method="post" enctype="multipart/form-data">

                        <div class="d-flex flex-column flex-sm-row justify-between">
                            <div class="col-12 col-sm-8 border pt-4">
                                <!-- Isi Judul -->
                                <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                    <label for="caridata" class="mb-2">Judul Berita</label>
                                    <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Judul Berita" name="judul" value="<?php echo $beritabyids['judul'] ?>" required>
                                    <input type="hidden"  name="id" value="<?php echo $beritabyids['id_berita'] ?>" required>
                                </div>

                                <!-- Isi Berita -->
                                <div class=" d-flex flex-1 mb-4 flex-column flex-sm-row justify-content-between  align-items-around align-content-start w-100 overflow-hidden ">
                                    <label for="caridata" class="mb-2  text-left ">Isi Berita</label>
                                    <textarea name="isi" id="summernote" cols="30" rows="10"><?php echo $beritabyids['isi'] ?></textarea>

                                </div>
                            </div>


                            <div class="col-12 col-sm-4">

                                <!-- Gambar -->
                                <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                    <label for="caridata" class="mb-2">Gambar</label>
                                    <input type="file" class="form-control form-control-user mr-2 mb-4" placeholder="Gambar" name="userfile">
                                </div>

                                <!-- Kategori -->
                                <div class="formCariDataMitra d-flex w-full mb-4 flex-column flex-sm-row justify-content-start align-items-baseline">
                                    <label for="caridata" class="mb-2 ">Kategori</label>
                                    <select name="kategori" id="" required class="p-2">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $kategoridata) {
                                            if (
                                                $beritabyids['id_kategori']
                                                == $kategoridata['id']
                                            ) {                                            ?>

                                                <option value="<?php echo  $kategoridata['id'] ?>" selected><?php echo ucfirst($kategoridata['nama_kategori']) ?></option>
                                            <?php  } else { ?>
                                                <option value="<?php echo  $kategoridata['id'] ?>"><?php echo ucfirst($kategoridata['nama_kategori']) ?></option>
                                        <?php }
                                        } ?>
                                    </select>

                                </div>

                                <!-- Fokus Berita / Running text -->
                                <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-start align-items-baseline">
                                    <label for="caridata" class="mb-2 ">Fokus</label>

                                    <select name="fokus" id="" required class="p-2">
                                        <option value="">Pilih Fokus</option>
                                        <?php if (
                                            $beritabyids['fokus_berita']
                                            == 'y'
                                        ) {
                                        ?>
                                            <option value="1" selected>Fokus Berita</option>
                                            <option value="2">Running Text</option>
                                        <?php  } else { ?>
                                            <option value="1">Fokus Berita</option>
                                            <option value="2" selected>Running Text</option>
                                        <?php
                                        } ?>
                                    </select>


                                </div>

                                <!-- Slug -->
                                <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                    <label for="caridata" class="mb-2">Slug</label>
                                    <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Slug" name="slug" value="<?php echo $beritabyids['judul_seo'] ?>">

                                </div>


                                <!-- Tag -->
                                <div class="formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                    <label for="caridata" class="mb-2">Tag</label>
                                    <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Tag" name="tag" value="<?php echo $beritabyids['tag'] ?>">

                                </div>


                                <!-- Peliput -->
                                <div class=" formCariDataMitra d-flex mb-4 flex-column flex-sm-row justify-content-center align-items-baseline">
                                    <label for="caridata" class="mb-2">Reporter</label>
                                    <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Peliput" name="peliput" value="<?php echo $beritabyids['peliput'] ?>">

                                </div>
                            </div>
                        </div>





                        <!-- <textarea name="editor"></textarea>
                    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('editor');
                    </script> -->


            </div>
            <hr>
            <div class="ml-3 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary text-center mb-2">
                    Update Berita
                </button>
            </div>

            </form>
        <?php } ?>
        </div>
    </div>

</div>



<?= $this->endSection() ?>
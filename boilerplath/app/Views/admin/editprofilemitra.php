<?= $this->extend('admin/main_admin'); ?>
<?= $this->section('content');

use App\Controllers\Utils;

$allFunction = new Utils();
?>
<div class="row">

    <div class="col-12 mb-3">
        <h3 class="title">Edit Profile </h3>
    </div>


    <div class="col-12 mb-3">
    <?php $error = $allFunction->getSessionItem('adminfaileduupdatedata');
        if ($error) {
            echo '<div class="alert alert-danger" role="alert">
                             ' . $error . '
                            </div>';
        }

        $success = $allFunction->getSessionItem('adminsuccessuupdatedata');
        if ($success) {
            echo '<div class="alert alert-success" role="alert">
                             ' . $success . '
                            </div>';
        }?>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo base_url() ?>/editprofile/updateData" method='post'>
                    <div class="formCariDataMitra d-flex mb-0 flex-column flex-sm-row justify-content-center align-items-baseline">
                        <label for="caridata" class="mb-2"> Password</label>
                        <input type="text" class="form-control form-control-user mr-2 mb-4" placeholder="Masukan Password Baru" name='password'>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<?= $this->endSection() ?>
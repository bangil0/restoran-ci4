<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . " => " . $value;
            echo "<br>";
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h3><?= $judul ?></h3>
</div>

<div class="col-8">
    <form action="<?= base_url('/admin/user/ubah') ?>" method="post">
        <div class="form-group">
            <input type="hidden" value="<?= $user['iduser'] ?>" name="iduser" required class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" value="<?= $user['email'] ?>" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control" name="level" id="level">
                <?php foreach ($level as $key) : ?>
                    <option <?php if ($user['level']===$key) {
                        echo "selected";
                    } ?> value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>

<?= $this->endsection() ?>
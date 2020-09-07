<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>Login Page</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto">
                <div class="col">
                    <?php
		                if (!empty($info)) {
			                echo '<div class="alert alert-danger" role="alert">';
			                echo $info;
			            echo '</div>';
		                }
	                ?>
                </div>
                <span><h1>LOGIN ADMIN</h1></span>
                <hr>
                <form action="<?= base_url('/admin/login') ?>" method="post">
                    <label for="email">Email</label>
                    <div class="form-group">
                        <input type="text" name="email" required class="form-control">
                    </div>
                    <label for="password">Password</label>
                    <div class="form-group">
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="login" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
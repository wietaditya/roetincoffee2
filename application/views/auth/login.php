<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Roetin Coffee | login</title>

	<style>

			.border-md {
				border-width: 2px;
			}

			.btn-facebook {
				background: #405D9D;
				border: none;
			}

			.btn-facebook:hover, .btn-facebook:focus {
				background: #314879;
			}

			.btn-twitter {
				background: #42AEEC;
				border: none;
			}

			.btn-twitter:hover, .btn-twitter:focus {
				background: #1799e4;
			}

			body {
				min-height: 100vh;
			}

			.form-control:not(select) {
				padding: 1.5rem 0.5rem;
			}

			select.form-control {
				height: 52px;
				padding-left: 0.5rem;
			}

			.form-control::placeholder {
				color: #ccc;
				font-weight: bold;
				font-size: 0.9rem;
			}
			.form-control:focus {
				box-shadow: none;
			}

			.content {
				background-color: #fbf8f5;
			}

	</style>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
	
</head>
<body>
	<div class="content">
	<!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-center">
            <!-- Navbar Brand -->
            <a href="<?= base_url('home') ?>" class="navbar-brand">
                <img src="<?= base_url() ?>assets/img/roetin-logo.png" alt="logo" width="100">
            </a>
        </div>
    </nav>
</header>


<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h3>Login ke Roetin Coffee</h3>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
			<?= $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="row">

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <input id="phoneNumber" type="tel" name="no_telp" placeholder="Nomor Telpon" class="form-control bg-white border-md border-left-0">
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" value="login" class="btn btn-primary btn-block py-2" onclick="validate()">
                            <span class="font-weight-bold">Login</span>
						</button>
                    </div>

                    <div class="text-center w-100 mt-3">
                        <p class="text-muted font-weight-bold">Belum punya akun? <a href="<?= base_url('auth/signup') ?>" class="text-primary">Daftar disini</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
	// For Demo Purpose [Changing input group text on focus]
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});

function validate() {
	var no_telp = $('#phoneNumber').val();
	var password = $('#password').val();

	if (no_telp == '' || password == '') {
		alert("Nomor telpon dan Password wajib diisi!");
	}

};

</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Roetin Coffee | store</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>css/custom.css" rel="stylesheet" />
		<style>
			
		</style>
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-lower">Roetin Coffee Shop</span>
            </h1>
        </header>
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="bg-faded text-center rounded">
							<div class="d-flex justify-content-around p-2 bd-highlight ">
								<?php foreach ($produk as $pdk) : ?>
								<div class="row">
									<div class="card m-4 p-3" style="width: 18rem;">
									<img src="../assets/images/<?= $pdk->gambar ?>" class="card-img-top" alt="product-04">
										<div class="card-body">
											<h5 class="card-title"><?= $pdk->nama ?></h5>
											<small class="card-text"><?= $pdk->keterangan ?></small>
											<br>
											<span class="badge rounded-pill bg-success mt-2">Rp <?= number_format($pdk->harga,0,',','.') ?></span>
											<br>
											<div class="btn-grup mt-2">
												<a href="<?php echo base_url().'tambah_ke_keranjang/'.$pdk->id ?>" class="btn btn-sm btn-primary">Tambah ke Keranjang</a>
												<a href="<?php echo base_url().'detail_product/'.$pdk->id ?>" class="btn btn-sm btn-success" >Detail</a>
												
											</div>
										</div>
									</div>
								</div>

								<?php endforeach; ?>

							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
			<div class="container"><p class="m-0 small">Copyright &copy; Roetin Coffee 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url()?>js/scripts.js"></script>
    </body>
</html>

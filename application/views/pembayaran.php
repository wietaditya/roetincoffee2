<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Roetin Coffee | pembayaran</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<link href="css/custom.css" rel="stylesheet" />
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
                        <div class="bg-faded rounded p-2">
							<h5 class="text-center">Pembayaran</h5>
							<div class="row">
								<div class="col-md-2">
									
								</div>
								<div class="col-md-8">
									<?php
										$grand_total = 0;
										if($keranjang = $this->cart->contents()) {
											foreach ($keranjang as $item) {
												$grand_total = $grand_total + $item['subtotal'];
											}
										
									?>
									<h4 class="text-center">Total pembayaran : Rp <?php echo number_format($grand_total,0,',','.'); ?></h4>
									<hr class="sidebar-divider my-3">

									<!-- form pembayaran -->
									<h5>Detail Pengiriman dan Pembayaran</h5>
									<form action="<?php echo base_url()?>proses_pesanan" method="post">
										<div class="form-group m-2">
											<label for="nama" class="text-start">Nama Lengkap</label>
											<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap Anda">
										</div>
										<div class="form-group m-2">
											<label for="alamat" class="text-start">Alamat Lengkap</label>
											<textarea type="text" id="alamat" name="nama" class="form-control" placeholder="Alamat Lengkap Anda"></textarea>
										</div>
										<div class="form-group m-2">
											<label for="no_telp" class="text-start">No. Telepon</label>
											<input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon Anda">
										</div>
										<div class="form-group m-2">
											<label for="kurir" class="text-start">No. Telepon</label>
											<select name="kurir" id="kurir" class="form-control">
												<option value="lion">Lion Express (Gratis Ongkir)</option>
												<option value="gojek">Gojek</option>
											</select>
										</div>

										<button type="submit" class="btn btn-sm btn-primary m-2">Pesan</button>
									</form>
									<?php
										} else { ?>
										<div class="container text-center">
											<h4 class="">Keranjang Anda Masih Kosong!</h4>
											<a href="<?php echo base_url()?>store" class="btn btn-sm btn-primary">Belanja Sekarang</a>
										</div>
										<?php } ?>
								</div>
								<div class="col-md-2">

								</div>
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
        <script src="js/scripts.js"></script>
    </body>
</html>

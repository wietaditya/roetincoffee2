<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Roetin Coffee | keranjang</title>
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
                        <div class="bg-faded text-center rounded p-2">
							<h5>Daftar Keranjang</h5>
							<table class="table table-bordered table-striped table-hover">
								<thead class="text-center">
									<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Jumlah</th>
									<th scope="col">Harga</th>
									<th scope="col">Sub-total</th>
									</tr>
								</thead>
								<tbody class="text-center">
								<?php
									$no = 1; 
									$total = $this->cart->total();
									foreach ($this->cart->contents() as $item) : ?>	
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $item['name'] ?></td>
										<td><?= $item['qty'] ?></td>
										<td align="right">Rp <?= number_format($item['price'],0,',','.') ?></td>
										<td align="right">Rp <?= number_format($item['subtotal'],0,',','.') ?></td>
									</tr>
									<?php endforeach; ?>
									<tr>
										<td colspan="4" align="right"></td>
										<td align="right">Rp <?= number_format($total,0,',','.') ?></td>
									</tr>
								</tbody>
							</table>
							<div align="right">
								<a href="<?php echo base_url('hapus_keranjang')?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
								<a href="<?php echo base_url('store')?>" class="btn btn-sm btn-primary">Lanjutkan Belanja</a>
								<a href="<?php echo base_url('pembayaran')?>" class="btn btn-sm btn-success">Pembayaran</a>
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

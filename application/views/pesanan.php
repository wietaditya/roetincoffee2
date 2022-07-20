<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Roetin Coffee | pesanan</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('css/custom.css') ?>" rel="stylesheet" />
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
							<h5 class="mb-4">Daftar Pesanan</h5>
							<table class="table table-bordered table-striped table-hover">
								<thead class="text-center">
									<tr>
									<th scope="col">Nama Produk</th>
									<th scope="col">Harga</th>
									</tr>
								</thead>
								<tbody class="text-center">
								<?php
									$total = 0;
									$id = '';
									if($pesanan) {
									foreach ($pesanan as $psn) : 
										$ongkir = $psn->ongkir;
										$id = $psn->id_invoice;
									endforeach;
									$total += $ongkir;
									}
									foreach ($pesanan as $psn) : 
									$total += $psn->harga;
									?>	
									<tr>
										<td scope="row"><?= $psn->nama_pdk ?></td>
										<td scope="row"><?= $psn->harga ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<h4 class="mt-4">Total yang harus dibayarkan</h4>
							<h4><strong>Rp <?= number_format($total,0,',','.') ?></strong></h4>
							<div align="right">
								<a href="<?php echo base_url().'batalkan_pesanan/'.$id ?>" class="btn btn-sm btn-danger">Batalkan Pesanan</a>
								<a href="<?php echo base_url().'proses_pesanan_bayar' ?>" class="btn btn-sm btn-success">Bayar</a>
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
        <script src="<?= base_url('js/scripts.js') ?>"></script>
    </body>
</html>

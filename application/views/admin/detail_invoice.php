<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Roetin Coffee - Detail Invoice</title>

    <!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
	<link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/admincontroller/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('admin/admincontroller/data_produk') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Barang</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
			<a class="nav-link" href="<?php echo base_url('admin/admincontroller/invoices') ?>">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Invoices</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       <!-- Nav Item - User Information -->
					   <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url('assets/img/undraw_profile.svg') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-start justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Invoice <span class="badge rounded-pill bg-success">No. Invoice <?php echo $invoice->id  ?></span></h1>
						<?php if($invoice->status == '1') { ?>
							<a href="<?php echo base_url().'admin/admincontroller/konfirmasi_pembayaran/'. $invoice->id?>" class="btn btn-sm btn-primary">Konfirmasi</a>
								<?php } else { ?>
								
						<?php } ?>
                    </div>

					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th>Id Produk</th>
							<th>Nama Produk</th>
							<th>Jumlah Pesanan</th>
							<th>Harga Satuan</th>
							<th>Subtotal</th>
							<th>Bukti Pembayaran</th>
						</tr>

						<?php
						$total = 0;
						foreach ($pesanan as $psn) :
							$subtotal = $psn->jumlah * $psn->harga;
							$total += $subtotal;
						
						?>

						<tr>
							<td><?= $psn->id_pdk ?></td>
							<td><?= $psn->nama_pdk ?></td>
							<td><?= $psn->jumlah ?></td>
							<td align="right">Rp <?= number_format($psn->harga,0,',','.') ?></td>
							<td align="right">Rp <?= number_format($subtotal,0,',','.') ?></td>
							<td>
								<?php if($invoice->status == '1' || $invoice->status == '2') { ?>
								<img src="<?= base_url('assets/bukti_tf/'.$invoice->bukti_pembayaran)?>" alt="bukti_tf" width=170">
								<?php } else { ?>
								-
								<?php } ?>
							</td>
						</tr>

						<?php endforeach; ?>

						<tr>
							<td colspan="5" align="right">Grand Total</td>
							<td align="right">Rp <?= number_format($total,0,',','.') ?></td>
						</tr>

					</table>

				</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Modal -->
	<div class="modal fade" id="tambah_produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="<?= base_url().'admin/admincontroller/add_produk' ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama">Nama Produk</label>
					<input type="text" name="nama" class="form-control">	
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input type="text" name="keterangan" class="form-control">	
				</div>
				<div class="form-group">
					<label for="kategori">Kategori</label>
					<input type="text" name="kategori" class="form-control">	
				</div>
				<div class="form-group">
					<label for="harga">Harga</label>
					<input type="text" name="harga" class="form-control">	
				</div>
				<div class="form-group">
					<label for="stok">Stok</label>
					<input type="text" name="stok" class="form-control">	
				</div>
				<div class="form-group">
					<label for="gambar">Gambar</label><br>
					<input type="file" name="gambar">	
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan Produk</button>
			</div>
		</form>
		</div>
	</div>
	</div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>


</body>

</html>

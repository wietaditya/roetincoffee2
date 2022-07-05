<?php $no_telp = $this->session->userdata('no_telp'); ?>
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="<?= base_url() ?>home">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>home">Home</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>about">About</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>products">Products</a></li>
                <!-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>store">Store</a></li> -->
                <li class="nav-item px-lg-2">
					<li class="nav-item dropdown">
						<a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Store
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?= base_url() ?>kategori/kopi">Kopi</a></li>
							<li><a class="dropdown-item" href="<?= base_url() ?>kategori/merch">Merchandise</a></li>
							<li><a class="dropdown-item" href="<?= base_url() ?>store">Semua</a></li>
						</ul>
					</li>
				</li>
                <li class="nav-item px-lg-4">
					<a class="nav-link text-uppercase" href="<?= base_url() ?>keranjang">
						<?php $items = $this->cart->total_items(); ?>
						<i class="fa-solid fa-cart-shopping"></i>&nbsp <?php echo $items; ?>&nbsp items
					</a>
				</li>
				<li class="nav-item px-lg-2"><a class="nav-link text-uppercase" href="<?= base_url() ?>daftar_pesanan?>">Pesanan</a></li>
				<li class="nav-item px-lg-2">
					<li class="nav-item dropdown">
						<a class="nav-link text-uppercase dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa-solid fa-user"></i>&nbsp 
							<?php if($this->session->userdata('nama')) {
							echo $this->session->userdata('nama'); } else {
								echo "Login";
							}?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php if($this->session->userdata('nama')) { ?>
							<li><a class="dropdown-item" href="<?= base_url() ?>auth/logout">Logout</a></li>
							<?php } else { ?>
								<li><a class="dropdown-item" href="<?= base_url() ?>auth/login">Login</a></li>
							<?php } ?>
						</ul>
					</li>
				</li>
            </ul>
        </div>
    </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="<?= base_url() ?>home">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>home">Home</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>about">About</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>products">Products</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>store">Store</a></li>
                <li class="nav-item px-lg-4">
					<a class="nav-link text-uppercase" href="<?= base_url() ?>keranjang">
						<?php $items = $this->cart->total_items(); ?>
						<i class="fa-solid fa-cart-shopping"></i>&nbsp <?php echo $items; ?>&nbsp items
					</a>
				</li>
            </ul>
        </div>
    </div>
</nav>


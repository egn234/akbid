<!DOCTYPE html>
<html lang="en">

<head>
	<?php $data['title'] = "Akbid - Kerjasama" ?>
	<?php $this->load->view('homepage/header_assets', $data); ?>
</head>

<body>
	<!-- Back to top button -->
	<div class="back-to-top"></div>
	<header>
		<?php $this->load->view('homepage/navbar'); ?>
		<div class="container">
			<div class="page-banner">
				<div class="row justify-content-center align-items-center h-100">
					<div class="col-md-6">
						<nav aria-label="Breadcrumb">
							<ul class="breadcrumb justify-content-center py-0 bg-transparent">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active">Kerjasama</li>
							</ul>
						</nav>
						<h1 class="text-center">Kerjasama</h1>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12 py-3">
					<h2 class="title-section">Kerjasama</h2>
					<div class="divider"></div>
					<?php
					$allData = $this->session->all_data;
					foreach ($allData as $data) {
						if ($data->status == "aktif") {
							echo $data->deskripsi_kerja_sama;
						}
					}
					?>
				</div>
				<!-- <div class="col-lg-6 py-3">
					<div class="img-fluid py-3 text-center">
						<img src="<?= base_url() ?>/assets/seogram/assets/img/about_frame.png" alt="">
					</div>
				</div> -->
			</div>
		</div>
	</div>

	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<script type="text/javascript">
		document.getElementById("kerja_sama").setAttribute("class", "nav-link active");
	</script>
</body>

</html>

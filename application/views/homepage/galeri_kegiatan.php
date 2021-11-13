<!DOCTYPE html>
<html lang="en">

<head>
	<?php $data['title'] = "Akbid - Blog" ?>
	<?php $this->load->view('homepage/header_assets', $data); ?>
</head>

<body>

	<!-- Back to top button -->
	<div class="back-to-top"></div>

	<header>
		<?php $this->load->view('homepage/navbar', $data); ?>

		<div class="container">
			<div class="page-banner">
				<div class="row justify-content-center align-items-center h-100">
					<div class="col-md-6">
						<nav aria-label="Breadcrumb">
							<ul class="breadcrumb justify-content-center py-0 bg-transparent">
								<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active">Galeri Kegiatan</li>
							</ul>
						</nav>
						<h1 class="text-center">Galeri Kegiatan</h1>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-section">
		<div class="container">
			<center>
				<div class="row my-3 p-3">
					<?php
					$allData = $this->session->all_data;

					foreach ($allData as $data) {
					?>
						<div class="col-sm-4 p-3">
							<a data-toggle="modal" data-target="#myModal" data-id="<?= $data->galeri_kegiatan_id; ?>">
								<img src="<?= base_url(); ?>upload/galeri_kegiatan/<?= $data->foto; ?>" class="img-fluid" style="max-height: 265px;" alt="Responsive image">
							</a>
						</div>
					<?php } ?>
				</div>
			</center>
		</div>

		<div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">DETAIL GAMBAR</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="fetched-data"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<?php $this->load->view('homepage/js/galerik_detail'); ?>
	<script type="text/javascript">
		document.getElementById("galeri").setAttribute("class", "nav-link active");
	</script>
</body>

</html>

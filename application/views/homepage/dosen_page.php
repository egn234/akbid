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
								<li class="breadcrumb-item active">Dosen</li>
							</ul>
						</nav>
						<h1 class="text-center">Dosen</h1>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-section">
		<div class="container">
			<!-- <div class="row">
				<div class="col-sm-10">
					<form action="#" class="form-search-blog">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter keyword..">
						</div>
					</form>
				</div>
				<div class="col-sm-2 text-sm-right">
					<button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
				</div>
			</div> -->

			<div class="container">
				<div class="row">
					<ul class="list-group">
						<li class="list-group-item border-0">Daftar Dosen yang mengajar di Akademi Kebidanan <b>(Klik Nama Untuk Melihat Detail)</b>:</li>
					</ul>
				</div>
			</div>
			<?php
			$allData = $this->session->all_data;
			$start = 0;
			foreach ($allData as $data) {
				if ($data->status == "aktif") {
					$no = 1 + $start;
			?>
					<div class="container">
						<div class="row">
							<ul class="list-group">
								<li class="list-group-item border-right-0 border-left-0 border-0 text-lg"><?= $no; ?>.</li>
							</ul>
							<ul class="list-group">
								<li class="list-group-item border-right-0 border-left-0 border-0 text-lg"><span data-toggle="modal" data-target="#myModal" data-id="<?= $data->dosen_id; ?>"> <?= $data->nama; ?></span></li>
							</ul>
						</div>
					</div>
			<?php $start = 1 + $start;
				}
			} ?>

		</div>
		<div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">DETAIL DOSEN</h4>
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
	<?php $this->load->view('homepage/js/dosen_detail'); ?>
	<script type="text/javascript">
		document.getElementById("pegawai").setAttribute("class", "nav-link dropdown-toggle active");
		document.getElementById("dosen").setAttribute("class", "dropdown-item active");
	</script>
</body>

</html>

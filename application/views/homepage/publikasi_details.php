<!DOCTYPE html>
<html lang="en">

<head>
	<?php $data['title'] = "Akbid - Blog Details" ?>
	<?php $this->load->view('homepage/header_assets', $data); ?>
</head>

<body>

	<!-- Back to top button -->
	<div class="back-to-top"></div>

	<header>
		<?php $this->load->view('homepage/navbar'); ?>

	</header>

	<div class="page-section pt-5">
		<div class="container">
			<nav aria-label="Breadcrumb">
				<ul class="breadcrumb p-0 mb-0 bg-transparent">
					<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?= base_url('page/publikasi'); ?>">Publikasi</a></li>
					<li class="breadcrumb-item active"><?= $data[0]->judul_publikasi ?></li>
				</ul>
			</nav>

			<div class="row">
				<div class="col-lg-8">
					<div class="blog-single-wrap">
						<?php
						$val = strtotime($data[0]->date_created);
						$date = date("d-m-Y", $val);
						?>
						<span class="mai-calendar"></span> <?= $date ?>
						<!-- <span class="mai-person"></span> Admin -->
						<h1 class="post-title"><?= $data[0]->judul_publikasi ?></h1>

						<div class="post-content">
							<p><?= $data[0]->deskripsi_publikasi ?></p>
							<a href="<?= base_url() ?>upload/publikasi/<?= $data[0]->file_upload ?>" target="_blank"><?= $data[0]->file_upload ?>
						</div>
					</div>

				</div>
				<div class="col-lg-4">
					<div class="widget">
						<!-- Widget recent post -->
						<div class="widget-box">
							<h4 class="widget-title">Publikasi Terbaru</h4>
							<div class="divider"></div>
							<?php
							$allData = $this->session->recentData;
							foreach ($allData as $row) {
							?>
								<div class="blog-item">
									<center>
										<a class="post-thumb" href="">
											<img src="<?= base_url() ?>upload/publikasi_default.jpg" alt="">
										</a>
									</center>
									<div class="content">
										<h6 class="post-title"><a href="<?= base_url(); ?>page/publikasi_details/<?= $row->publikasi_id ?>"><?= $row->judul_publikasi ?></a></h6>
										<div class="meta">
											<?php
											$val = strtotime($row->date_created);
											$date = date("d-m-Y", $val);
											?>
											<a href="<?= base_url(); ?>page/publikasi_details/<?= $row->publikasi_id ?>"><span class="mai-calendar"></span> <?= $date ?></a>
											<!-- <a href="#"><span class="mai-person"></span> Admin</a> -->
										</div>
									</div>
								</div>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<script type="text/javascript">
		document.getElementById("prestasi").setAttribute("class", "nav-link dropdown-toggle active");
		document.getElementById("publikasi").setAttribute("class", "dropdown-item active");
	</script>
</body>

</html>

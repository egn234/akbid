<!DOCTYPE html>
<html lang="en">

<head>
	<?php $data['title'] = "Akbid - Home" ?>
	<?php $this->load->view('homepage/header_assets', $data); ?>
</head>

<body>

	<!-- Back to top button -->
	<div class="back-to-top"></div>
	<header>
		<?php $this->load->view('homepage/navbar', $data); ?>

		<div class="container">
			<center>
				<div id="g_utama" class="carousel slide" data-ride="carousel">
					<?php if(isset($galeri_utama[0])){ ?>
						<ol class="carousel-indicators">
							<li data-target="#g_utama" data-slide-to="0" class="active"></li>
							<?php for ($i = 1; $i < count($galeri_utama); $i++) { ?>
								<li data-target="#g_utama" data-slide-to="<?= $i ?>"></li>
							<?php } ?>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?= base_url() ?>upload/galeri_utama/<?= $galeri_utama[0]->foto ?>" class=" d-block w-100" src="..." style="max-height: 620px; max-width: 980px;" alt="<?= $galeri_utama[0]->judul ?>">
							</div>
							<?php for ($j = 1; $j < count($galeri_utama); $j++) { ?>
								<div class="carousel-item">
									<img src="<?= base_url() ?>upload/galeri_utama/<?= $galeri_utama[$j]->foto ?>" class=" d-block w-100" src="..." style="max-height: 620px; max-width: 980px;" alt="<?= $galeri_utama[$j]->judul ?>">
								</div>
							<?php } ?>
						<?php }?>
					</div>
					<a class="carousel-control-prev" href="#g_utama" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#g_utama" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</center>
			<!-- <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a> -->
		</div>
	</header>

	<div class="page-section" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 py-3 wow fadeInUp">
					<span class="subhead">About us</span>
					<h2 class="title-section"><?php if(isset($data_about[0])){echo $data_about[0]->judul_about; }else{ echo "no one here but us, chikens!"; }  ?></h2>
					<div class="divider"></div>
					<?php if(isset($data_about[0])){echo $data_about[0]->deskripsi_about; ?>
					<p>Kenali kami lebih dalam</p>
					<a href="<?= base_url() ?>page/detail_about/<?= $data_about[0]->about_id ?>" class="btn btn-primary mt-3">Read More</a>
					<?php }else{ echo "no one here but us, chikens!"; }  ?>
				</div>
				<div class="col-lg-6 py-3 wow fadeInRight">
					<div class="img-fluid py-3 text-center">
						<img src="<?= base_url() ?>upload/akbid_logo_t.png" style="max-width: 360px;" alt="">
					</div>
				</div>
			</div>
		</div> <!-- .container -->
	</div> <!-- .page-section -->

	<!-- layanan -->
	<div class="page-section bg-light">
		<div class="container">
			<div class="text-center wow fadeInUp">
				<div class="subhead">Layanan Kami</div>
				<h2 class="title-section">Bagaimana Kami Melayani</h2>
				<div class="divider mx-auto"></div>
			</div>

			<div class="row">
				<?php foreach ($data_layanan as $data) { ?>
					<div class="col-lg-4 py-3 wow fadeInUp">
						<div class="card-blog">
							<div class="header">
								<center>
									<div class="post-thumb">
										<img src="<?= base_url() ?>upload/layanan_default.jpg" alt="">
									</div>
								</center>
							</div>
							<div class="body">
								<h5 class="post-title"><a href="<?= base_url(); ?>page/layanan_details/<?= $data->layanan_id ?>"><?= $data->judul_layanan ?></a></h5>
								<?php
								$val = strtotime($data->date_created);
								$date = date("d-m-Y", $val);
								?>
								<div class="post-date">Posted on <a href="<?= base_url(); ?>page/layanan_details/<?= $data->layanan_id ?>"><?= $date ?></a></div>
							</div>
						</div>
					</div>
				<?php } ?>

			</div>
			<div class="col-12 mt-4 text-center wow fadeInUp">
				<a href="<?= base_url(); ?>page/layanan" class="btn btn-primary">Lihat Layanan</a>
			</div>

		</div> <!-- .container -->
	</div> <!-- .page-section -->

	<!-- Pencapaian -->
	<div class="page-section">
		<div class="container">
			<div class="text-center wow fadeInUp">
				<div class="subhead">Pencapaian Kami</div>
				<h2 class="title-section">Lihat Pencapaian Terbaru</h2>
				<div class="divider mx-auto"></div>
			</div>
			<div class="row mt-5">
				<?php foreach ($data_pencapaian as $data) { ?>
					<div class="col-lg-4 py-3 wow fadeInUp">
						<div class="card-blog">
							<div class="header">
								<center>
									<div class="post-thumb">
										<img src="<?= base_url() ?>upload/pencapaian/<?= $data->foto ?>" alt="">
									</div>
								</center>
							</div>
							<div class="body">
								<h5 class="post-title"><a href="<?= base_url(); ?>page/pencapaian_details/<?= $data->pencapaian_id ?>"><?= $data->judul_pencapaian ?></a></h5>
								<?php
								$val = strtotime($data->date_created);
								$date = date("d-m-Y", $val);
								?>
								<div class="post-date">Posted on <a href="<?= base_url(); ?>page/pencapaian_details/<?= $data->pencapaian_id ?>"><?= $date ?></a></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-12 mt-4 text-center wow fadeInUp">
				<a href="<?= base_url(); ?>page/pencapaian" class="btn btn-primary">Lihat Pencapaian</a>
			</div>
		</div> <!-- .container -->
	</div> <!-- .page-section -->

	<!-- Posts -->
	<div class="page-section bg-light">
		<div class="container">
			<div class="text-center wow fadeInUp">
				<div class="subhead">Postingan Kami</div>
				<h2 class="title-section">Baca Berita Terbaru</h2>
				<div class="divider mx-auto"></div>
			</div>
			<div class="row mt-5">
				<?php foreach ($data_posts as $data) { ?>

					<div class="col-lg-4 py-3 wow fadeInUp">
						<div class="card-blog">
							<div class="header">
								<center>
									<div class="post-thumb">
										<img src="<?= base_url() ?>upload/posts/<?= $data->foto ?>" alt="">
									</div>
								</center>
							</div>
							<div class="body">
								<h5 class="post-title"><a href="<?= base_url(); ?>page/posts_details/<?= $data->posting_id ?>"><?= $data->judul_posting ?></a></h5>
								<?php
								$val = strtotime($data->date_created);
								$date = date("d-m-Y", $val);
								?>
								<div class="post-date">Posted on <a href="<?= base_url(); ?>page/posts_details/<?= $data->posting_id ?>"><?= $date ?></a></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="col-12 mt-4 text-center wow fadeInUp">
				<a href="<?= base_url(); ?>page/posts" class="btn btn-primary">Lihat Posts</a>
			</div>
		</div>
	</div>

	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<script type="text/javascript">
		document.getElementById("home").setAttribute("class", "nav-link active");
	</script>
</body>

</html>

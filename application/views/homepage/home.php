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
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="<?= base_url() ?>upload/layanan_default.jpg" class=" d-block w-100" src="..." style="max-height: 620px; max-width: 980px;" alt="First slide">
						</div>
						<div class="carousel-item">
							<img src="<?= base_url() ?>upload/publikasi_default.jpg" class="d-block w-100" src="..." style="max-height: 620px; max-width: 980px;" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img src="<?= base_url() ?>upload/layanan_default.jpg" class="d-block w-100" src="..." style="max-height: 620px; max-width: 980px;" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</center>
			<!-- <a href="#about" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a> -->
		</div>
	</header>

	<div class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="card-service wow fadeInUp">
						<div class="header">
							<img src="<?= base_url() ?>assets/seogram/assets/img/services/service-1.svg" alt="">
						</div>
						<div class="body">
							<h5 class="text-secondary">SEO Consultancy</h5>
							<p>We help you define your SEO objective & develop a realistic strategy with you</p>
							<a href="service.html" class="btn btn-primary">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-service wow fadeInUp">
						<div class="header">
							<img src="<?= base_url() ?>assets/seogram/assets/img/services/service-2.svg" alt="">
						</div>
						<div class="body">
							<h5 class="text-secondary">Content Marketing</h5>
							<p>We help you define your SEO objective & develop a realistic strategy with you</p>
							<a href="service.html" class="btn btn-primary">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card-service wow fadeInUp">
						<div class="header">
							<img src="<?= base_url() ?>assets/seogram/assets/img/services/service-3.svg" alt="">
						</div>
						<div class="body">
							<h5 class="text-secondary">Keyword Research</h5>
							<p>We help you define your SEO objective & develop a realistic strategy with you</p>
							<a href="service.html" class="btn btn-primary">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- .container -->
	</div> <!-- .page-section -->

	<div class="page-section" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 py-3 wow fadeInUp">
					<span class="subhead">About us</span>
					<h2 class="title-section">The number #1 SEO Service Company</h2>
					<div class="divider"></div>

					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
					<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
					<a href="about.html" class="btn btn-primary mt-3">Read More</a>
				</div>
				<div class="col-lg-6 py-3 wow fadeInRight">
					<div class="img-fluid py-3 text-center">
						<img src="<?= base_url() ?>assets/seogram/assets/img/about_frame.png" alt="">
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

	<!-- <div class="page-section banner-seo-check">
		<div class="wrap bg-image" style="background-image: url(<?= base_url() ?>assets/seogram/assets/img/bg_pattern.svg);">
			<div class="container text-center">
				<div class="row justify-content-center wow fadeInUp">
					<div class="col-lg-8">
						<h2 class="mb-4">Check your Website SEO</h2>
						<form action="#">
							<input type="text" class="form-control" placeholder="E.g google.com">
							<button type="submit" class="btn btn-success">Check Now</button>
						</form>
					</div>
				</div>
			</div>  .container -->
	<!-- </div> .wrap -->
	<!-- </div> .page-section -->

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

	<!-- Banner info -->
	<!-- <div class="page-section banner-info">
		<div class="wrap bg-image" style="background-image: url(<?= base_url() ?>assets/seogram/assets/img/bg_pattern.svg);">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
						<h2 class="title-section">SEO to Improve Brand <br> Visibility</h2>
						<div class="divider"></div>
						<p>We're an experienced and talented team of passionate consultants who breathe with search engine marketing.</p>

						<ul class="theme-list theme-list-light text-white">
							<li>
								<div class="h5">SEO Content Strategy</div>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
							</li>
							<li>
								<div class="h5">B2B SEO</div>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
							</li>
						</ul>
					</div>
					<div class="col-lg-6 py-3 wow fadeInRight">
						<div class="img-fluid text-center">
							<img src="<?= base_url() ?>assets/seogram/assets/img/banner_image_2.svg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div> <!-- .wrap -->
	<!-- </div> .page-section -->

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

</body>

</html>

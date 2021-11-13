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
								<li class="breadcrumb-item active">Posts</li>
							</ul>
						</nav>
						<h1 class="text-center">Posts</h1>
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

			<div class="row my-5">
				<?php
				$allData = $this->session->all_data;
				$previous = $halaman - 1;
				$next = $halaman + 1;
				foreach ($allData as $data) {
				?>
					<div class="col-lg-4 py-3">
						<div class="card-blog">
							<div class="header">
								<center>
									<div class="post-thumb">
										<img src="<?= base_url(); ?>upload/posts/<?= $data->foto ?>" alt="">
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

			<nav aria-label="Page Navigation">
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link" <?php if ($halaman > 1) {
													echo "href='?halaman=$previous'";
												} ?> tabindex="-1" aria-disabled="true">Previous</a>
					</li>
					<?php
					$jumlah = 1;
					if ($total_halaman % 10 == 0) {
						$jumlah = $jumlah + $total_halaman;
					}
					for ($x = $jumlah; $x <= $total_halaman; $x++) {
					?>
						<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?= $x; ?></a></li>
					<?php } ?>
					<li class="page-item">
						<a class="page-link" <?php if ($halaman < $total_halaman) {
													echo "href='?halaman=$next'";
												} ?>>Next</a>
					</li>
				</ul>
			</nav>

		</div>
	</div>

	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<script type="text/javascript">
		document.getElementById("posts").setAttribute("class", "nav-link active");
	</script>
</body>

</html>

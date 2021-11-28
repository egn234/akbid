<!DOCTYPE html>
<html lang="en">

<head>
	<?php $data['title'] = "Akbid - Contact" ?>
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
								<li class="breadcrumb-item active">Contact</li>
							</ul>
						</nav>
						<h1 class="text-center">Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="page-section">
		<div class="container">
			<div class="row text-center align-items-center">
				<div class="col-lg-4 py-3">
					<div class="display-4 text-center text-primary"><span class="mai-pin"></span></div>
					<p class="mb-3 font-weight-medium text-lg">Address</p>
					<p class="mb-0 text-secondary">Jl. Karanggan No. 30, Puspasari, Citeureup, Bogor, Jawa Barat, Indonesia</p>
				</div>
				<div class="col-lg-4 py-3">
					<div class="display-4 text-center text-primary"><span class="mai-call"></span></div>
					<p class="mb-3 font-weight-medium text-lg">Phone</p>
					<p class="mb-0"><a href="#" class="text-secondary">+62 822 9944 4490</a></p>
				</div>
				<div class="col-lg-4 py-3">
					<div class="display-4 text-center text-primary"><span class="mai-mail"></span></div>
					<p class="mb-3 font-weight-medium text-lg">Email Address</p>
					<p class="mb-0"><a href="#" class="text-secondary">akbid.annisajaya@gmail.com</a></p>
				</div>
			</div>
		</div>
	</div>


	<?php $this->load->view('homepage/footer'); ?>
	<?php $this->load->view('homepage/footer_assets'); ?>
	<script type="text/javascript">
		document.getElementById("contact").setAttribute("class", "nav-link active");
	</script>
</body>

</html>

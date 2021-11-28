<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
	<div class="container">
		<a href="<?= base_url(); ?>" class="navbar-brand">Ak<span class="text-primary">Bid.</span></a>

		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse collapse" id="navbarContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a id="home" class="nav-link" href="<?= base_url(); ?>">Home</a>
				</li>
				<!-- <li class="nav-item">
					<a id="about" class="nav-link" href="<?= base_url('page/detail_about'); ?>">About</a>
				</li> -->
				<li class="nav-item">
					<a id="visi_misi" class="nav-link" href="<?= base_url('page/Visimisi'); ?>">Visi-Misi</a>
				</li>
				<li class="nav-item">
					<a id="kerja_sama" class="nav-link" href="<?= base_url('page/kerjasama'); ?>">Kerjasama</a>
				</li>
				<li class="nav-item">
					<a id="posts" class="nav-link" href="<?= base_url('page/posts'); ?>">Posts</a>
				</li>
				<li class="nav-item">
					<a id="layanan" class="nav-link" href="<?= base_url('page/layanan'); ?>">Layanan</a>
				</li>
				<li class="nav-item">
					<a id="galeri" class="nav-link" href="<?= base_url('page/galeri_kegiatan'); ?>">Galeri</a>
				</li>
				<li class="nav-item dropdown">
					<a id="pegawai" class="nav-link dropdown-toggle" href="#" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Pegawai
					</a>
					<div class="dropdown-menu" aria-labelledby="services">
						<a id="dosen" class="dropdown-item" href="<?= base_url('page/dosen'); ?>">Dosen</a>
						<a id="staff" class="dropdown-item" href="<?= base_url('page/staff'); ?>">Staff</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a id="prestasi" class="nav-link dropdown-toggle" href="#" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Prestasi
					</a>
					<div class="dropdown-menu" aria-labelledby="services">
						<a id="publikasi" class="dropdown-item" href="<?= base_url('page/publikasi'); ?>">Publikasi</a>
						<a id="pencapaian" class="dropdown-item" href="<?= base_url('page/pencapaian'); ?>">Pencapaian</a>
					</div>
				</li>
				<li class="nav-item">
					<a id="contact" class="nav-link" href="<?= base_url('page/contact'); ?>">Contact</a>
				</li>
				<!-- <li class="nav-item">
					<a class="btn btn-primary ml-lg-2" href="#">Free Analytics</a>
				</li> -->
			</ul>
		</div>

	</div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
	<div class="container">
		<a href="<?= base_url(); ?>" class="navbar-brand">
			<img src="<?=base_url()?>upload/akbid_logo_t.png" width="50">
			&nbsp
			Ak<span class="text-primary">Bid</span> Annisa Jaya
		</a>

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
				<li class="nav-item dropdown">
					<a id="media" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Media
					</a>
					<div class="dropdown-menu" aria-labelledby="media">
						<a id="posts" class="dropdown-item" href="<?= base_url('page/posts'); ?>">Posts</a>
						<a id="galeri" class="dropdown-item" href="<?= base_url('page/galeri_kegiatan'); ?>">Galeri</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a id="prestasi" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Prestasi
					</a>
					<div class="dropdown-menu" aria-labelledby="prestasi">
						<a id="publikasi" class="dropdown-item" href="<?= base_url('page/publikasi'); ?>">Publikasi</a>
						<a id="pencapaian" class="dropdown-item" href="<?= base_url('page/pencapaian'); ?>">Pencapaian</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a id="pegawai" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Pegawai
					</a>
					<div class="dropdown-menu" aria-labelledby="pegawai">
						<a id="dosen" class="dropdown-item" href="<?= base_url('page/dosen'); ?>">Dosen</a>
						<a id="staff" class="dropdown-item" href="<?= base_url('page/staff'); ?>">Staff</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a id="tentang" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tentang Kami
					</a>
					<div class="dropdown-menu" aria-labelledby="tentang">
						<a id="visi_misi" class="dropdown-item" href="<?= base_url('page/Visimisi'); ?>">Visi-Misi</a>
						<a id="kerja_sama" class="dropdown-item" href="<?= base_url('page/kerjasama'); ?>">Kerjasama</a>
						<a id="layanan" class="dropdown-item" href="<?= base_url('page/layanan'); ?>">Layanan</a>
						<a id="contact" class="dropdown-item" href="<?= base_url('page/contact'); ?>">Kontak</a>
					</div>
				</li>
			</ul>
		</div>

	</div>
</nav>

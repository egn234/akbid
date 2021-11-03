  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Tambah Foto Galeri Utama</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
  						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/main_gallery">Galeri Utama</a></li>
  						<li class="breadcrumb-item active">Tambah Foto</li>
  					</ol>
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>
  	<!-- /.content-header -->

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<div class="card">
  				<div class="card-header">
  					<h2 class="card-title">Tambah Foto Baru</h2>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<?= $this->session->flashdata('notif_action'); ?>
  					<form id="addGalerik" class="form" action="<?= base_url() ?>admin/main_gallery/save_galeriut" method="POST" enctype="multipart/form-data">
  						<div class="form-group">
  							<div class="input-group input-group mb-3">
  								<div class="input-group-prepend">
  									<span class="input-group-text" id="basic-addon1">Judul</span>
  								</div>
  								<input type="text" class="form-control" name="judul" value="<?= $this->session->flashdata('judul'); ?>" aria-label="judul" aria-describedby="basic-addon1">
  							</div>
  						</div>
  						<div class="form-group">
  							<div class="input-group input-group mb-3">
  								<div class="input-group-prepend">
  									<span class="input-group-text" id="foto artikel">Foto Thumbnail</span>
  								</div>
  								<div class="custom-file">
  									<input type="file" class="custom-file-input" id="fileupload1" name="foto" accept="image/png, image/jpg, image/jpeg">
  									<label class="custom-file-label">Choose file</label>
  								</div>
  							</div>
  						</div>
  					</form>
  				</div>
  				<div class="card-footer">
  					<a href="<?= base_url() ?>admin/act_gallery/list" class="btn btn-default">Kembali</a>
  					<a href="#" data-toggle="modal" data-target="#konfirmasi" class="float-right btn btn-primary">Simpan</a>
  				</div>
  				<!-- /.card-body -->
  			</div>

  			<!-- /.row -->
  		</div>
  		<!-- /.container-fluid -->
  	</section>
  	<!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="konfirmasi">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Konfirmasi</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<p>Tambah Foto?</p>
  			</div>
  			<div class="modal-footer justify-content-between">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
  				<button type="submit" form="addGalerik" class="btn btn-primary">Tambah</button>
  			</div>
  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php $this->load->view('admin/foot_asset'); ?>
  <script type="text/javascript">
  	document.getElementById("datagaleri").setAttribute("class", " nav-item has-treeview menu-open");
  	document.getElementById("galeriut").setAttribute("class", "nav-link active");
  	$('#fileupload1').on('change', function() {
  		//get the file name
  		var fileName = $(this).val();
  		//replace the "Choose a file" label
  		var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
  		$(this).next('.custom-file-label').html(cleanFileName);
  	});
  </script>
  </body>

  </html>

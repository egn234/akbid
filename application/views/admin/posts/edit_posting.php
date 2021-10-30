  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Dashboard</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active">Dashboard</li>
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
  					<h2 class="card-title">Tambah Artikel Baru</h2>
            <div class="btn-group float-right">
              <a href="<?=base_url()?>admin/posting/list" class="btn btn-xs btn-default">Kembali</a>
              <a href="#" data-toggle="modal" data-target="#konfirmasi" class=" btn btn-xs btn-primary">Simpan</a>
            </div>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
            <?= $this->session->flashdata('notif_posting'); ?>
            <form id="editPostingan" class="form" action="<?=base_url()?>admin/posts/edit_proc/<?=$editPos->postingan_id?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-group input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Judul Artikel</span>
                  </div>
                  <input type="text" class="form-control" name="judul_posting" value="<?=$editPos->judul_posting;?>" aria-label="judul_posting" aria-describedby="basic-addon1">
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
              <div class="form-group">
                <textarea id="desc_post" name="deskripsi_posting"><?=$editPos->deskripsi_posting;?></textarea>
              </div>
            </form>
  				</div>
          <div class="card-footer">
            <a href="<?=base_url()?>admin/posting/list" class="btn btn-default">Kembali</a>
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
          <p>Ubah Artikel?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" form="editPostingan" class="btn btn-primary">Ubah</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php $this->load->view('admin/foot_asset'); ?>
  <script type="text/javascript">
  	document.getElementById("dashboard").setAttribute("class", "nav-link active");
    $('#desc_post').summernote({
      placeholder: 'Tulis artikel disini....',
      disableDragAndDrop: true,
      height: 1000,
      minHeight: null,
      maxHeight: null,
      toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline']],
      ['font', ['superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['view', ['fullscreen','help']]
      ]
    });
  </script>
  </body>

  </html>

  <div class="content-wrapper" style="margin-top: 49px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Publikasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/publikasi/list">Publikasi</a></li>
              <li class="breadcrumb-item active">Tambah publikasi</li>
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
            Tambah Publikasi
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('notif_publikasi'); ?>
            <form id="addPublikasi" class="form-horizontal" action="<?=base_url()?>admin/publikasi/add_proc" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="l_nama">Judul Publikasi</label><span class="text-danger">*</span>
                <input id="l_nama" type="text" name="judul_publikasi" class="form-control" value="<?=$this->session->flashdata('judul_publikasi');?>" required>
              </div>
              <div class="form-group">
                <label for="l_deskripsi">Deskripsi</label><span class="text-danger">*</span>
                <input id="l_deskripsi" type="text" name="deskripsi_publikasi" class="form-control" value="<?=$this->session->flashdata('deskripsi_publikasi');?>" required>
              </div>
              <div class="form-group">
                <label>File/Lampiran</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileupload1" name="file_upload" accept="image/png, image/jpg, image/jpeg, .pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx">
                    <label class="custom-file-label" for="fileupload1">Pilih File...</label>
                  </div>
                </div>
              </div>
              
            </form>
            <span class="text-xs text-danger">
              *Wajib Diisi
            </span>
          </div>
          <div class="card-footer">
            <a href="<?=base_url()?>admin/publikasi/list" class="btn btn-default">Kembali</a>
            <a href="#" data-toggle="modal" data-target="#konfirmasi" class="float-right btn btn-primary">Simpan</a>
          </div>
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
        <p>Tambah Publikasi?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" form="addPublikasi" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php $this->load->view('admin/foot_asset'); ?>

<script type="text/javascript">
  document.getElementById("publikasi").setAttribute("class", "nav-link active");
  $('.dtable').DataTable();
  $('#fileupload1').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
  });
</script>

</body>
</html>

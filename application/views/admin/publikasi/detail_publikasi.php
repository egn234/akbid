  <div class="content-wrapper" style="margin-top: 49px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Publikasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/publikasi/list">Publikasi</a></li>
              <li class="breadcrumb-item active">Detail Publikasi</li>
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
            Detail Publikasi
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('notif_publikasi'); ?>
            <div class="row">
              <div class="col-lg-8 border-left border-right">
                <table class="table">
                  <tr>
                    <td width="20%">Judul Publikasi</td>
                    <td width="5%">:</td>
                    <td><?=$pub->judul_publikasi?></td>
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?=$pub->deskripsi_publikasi?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Unggah</td>
                    <td>:</td>
                    <td><?=$pub->date_created?></td>
                  </tr>
                </table>
                <hr>
              </div>
              <div class="col-lg-4">
                <img src="<?=base_url()?>upload/publikasi/<?=$pub->foto?>" style="width: 90%; margin: 5%" class="align-middle">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?=base_url()?>admin/publikasi/list" class="btn btn-default">Kembali</a>
            <a href="<?=base_url()?>admin/publikasi/edit/<?=$pub->publikasi_id?>" class="float-right btn btn-primary">Ubah Data</a>
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
<?php $this->load->view('admin/foot_asset'); ?>

<script type="text/javascript">
  document.getElementById("publikasi").setAttribute("class", "nav-link active");
  $('.dtable').DataTable();
</script>

</body>
</html>

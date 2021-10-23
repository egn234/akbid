  <div class="content-wrapper" style="margin-top: 49px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Publikasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Publikasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php $admin_id = $this->session->userdata('admin_id_sess'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            Daftar Publikasi
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('notif_publikasi'); ?>
            <div class="row">
              <div class="col-lg-12 my-1">
                <a href="<?=base_url()?>admin/publikasi/add" class="btn btn-primary btn-flat">
                  <i class="fas fa-plus"></i> Tambah Publikasi
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 my-3">
                <table class="dtable table table-sm table-bordered table-striped">
                  <thead>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($listPub as $a){ ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$a->judul_publikasi?></td>
                      <td><?=$a->deskripsi_publikasi?></td>
                      <td><?=$a->date_created?></td>
                      <td align="center">
                        <a href="<?=base_url()?>admin/publikasi/detail/<?=$a->publikasi_id?>" class="btn btn-xs btn-info">
                          <i class="fas fa-book"></i> Detail
                        </a>
                        <a href="<?= base_url(); ?>admin/publikasi/delete/<?=$a->publikasi_id?>/<?=$a->admin_id?>" class="btn btn-danger " onclick="return confirm('Ingin Menghapus?')">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    <?php $i = $i + 1;?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card-footer">

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $this->load->view('admin/foot_asset'); ?>

<script type="text/javascript">
  document.getElementById("publikasi").setAttribute("class", "nav-link active");
  $('.dtable').dataTable();
</script>

</body>
</html>

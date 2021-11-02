  <div class="content-wrapper" style="margin-top: 49px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Foto Galeri Kegiatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Foto kegiatan</li>
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
            Daftar Galeri Kegiatan
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('notif_galerik'); ?>
            <div class="row">
              <div class="col-lg-12 my-1">
                <a href="<?=base_url()?>admin/act_gallery/add" class="btn btn-primary btn-flat">
                  <i class="fas fa-plus"></i> Tambah Foto
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 my-3">
                <table class="dtable table table-sm table-bordered table-striped">
                  <thead>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($galeri as $a){ ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$a->judul?></td>
                      <td>
                      	<img src="<?=base_url()?>upload/galeri_kegiatan/<?=$foto?>" height="200">
                      </td>
                      <td><?=$a->date_created?></td>
                      <!-- <td align="center">
                        <a href="<?=base_url()?>admin/act_gallery/edit/<?=$a->galeri_kegiatan_id?>" class="btn btn-xs btn-info">
                          <i class="fas fa-book"></i> Edit
                        </a>
                      </td> -->
                      <td align="center">
                        <a href="<?= base_url(); ?>admin/act_gallery/delete/<?=$a->galeri_kegiatan_id?>/<?=$a->admin_id?>" class="btn btn-danger btn-xs" onclick="return confirm('Ingin menghapus foto?')">
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
  document.getElementById("galerik").setAttribute("class", "nav-link active");
  $('.dtable').dataTable();
</script>

</body>
</html>

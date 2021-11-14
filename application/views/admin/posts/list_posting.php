  <div class="content-wrapper" style="margin-top: 49px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post dan Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Post dan Artikel</li>
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
            Daftar Post/Artikel
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('notif_posting'); ?>
            <div class="row">
              <div class="col-lg-12 my-1">
                <a href="<?=base_url()?>admin/posts/add" class="btn btn-primary btn-flat">
                  <i class="fas fa-plus"></i> Tambah Artikel
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 my-3">
                <table class="dtable table table-sm table-bordered table-striped">
                  <thead>
                    <th>No.</th>
                    <th>Judul Post</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                    <?php foreach($posting as $a){ ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$a->judul_posting?></td>
                      <td><?=$a->date_created?></td>
                      <td>
                      	<div class="btn btn-flat btn-secondary">N/A</div>
                      </td>
                      <td align="center">
                        <a href="<?=base_url()?>admin/posting/edit/<?=$a->posting_id?>" class="btn btn-xs btn-info">
                          <i class="fas fa-book"></i> Edit
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
  document.getElementById("posting").setAttribute("class", "nav-link active");
  $('.dtable').dataTable();
</script>

</body>
</html>

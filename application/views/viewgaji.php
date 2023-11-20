<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <?php $this->load->view('include/base_css'); ?>
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- navbar -->
    <?php $this->load->view('include/base_nav'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Gaji</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="<?php echo base_url('gaji') ?>">List Gaji</a></li>
                <li class="breadcrumb-item active">View Gaji</li>
              </ol>
            </div>
          </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Kode Petugas</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url('gaji/tambahgaji') ?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                          <label for="nama">Kode Petugas</label>
                            <input type="text" class="form-control" id="" placeholder="Kode Petugas" required="" name="kd_petugas" readonly value="<?php echo $gaji['kd_petugas'] ?>" name="kd_petugas">
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" class="form-control" id="" placeholder="Nama Petugas" required="" name="nama" readonly value="<?php echo $gaji['nama_petugas'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="">Gaji Pokok</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Gaji Pokok" name="gaji_pokok" readonly value="<?php echo $gaji['gaji_pokok'] ?>"name="gaji_pokok">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="">Biaya Makan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Biaya Makan" name="biaya_makan" readonly value="<?php echo $gaji['biaya_makan'] ?>"name="biaya_makan">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="">Biaya Transport</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Biaya Transport" name="biaya_transport" readonly value="<?php echo $gaji['biaya_transport'] ?>"name="biaya_transport">
                              </div>
                          </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <a href="<?php echo base_url('gaji') ?>" class="btn btn-primary pull-right">Kembali</a>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- footer -->

          </div>
          <!-- ./wrapper -->
          <!-- script -->
          <?php $this->load->view('include/base_js'); ?>
          <!-- InputMask -->
          <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.js"></script>
          <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
          <script src="<?php echo base_url('assets') ?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
          <script src="<?php echo base_url('assets/dist/') ?>jquery.mask.min.js"></script>
        </body>
      </html>
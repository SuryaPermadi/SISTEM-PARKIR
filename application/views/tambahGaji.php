<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Tambah Gaji Petugas </title>
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
              <h1>Tambah Gaji</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('gaji') ?>">List Gaji</a></li>
                <li class="breadcrumb-item active">Tambah Gaji</li>
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
                    <h3 class="card-title">Tambah Gaji</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo site_url('gaji/tambahGaji'); ?>" method="post">
                    <div class="card-body">
                          <div class="form-group">
                            <label for="nama">Kode Petugas</label>
                            <input type="text" class="form-control" id="" placeholder="Kode Petugas" required="" name="kd_petugas" >
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" class="form-control" id="" placeholder="Nama Petugas" required="" name="nama_petugas" >
                          </div>
                          <div class="form-group">
                            <label for="">Gaji Pokok</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Gaji Pokok" name="gaji_pokok">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="">Biaya Makan</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Biaya Makan" name="biaya_makan" readonly value="25000">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="">Biaya Transport</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><b>Rp</b></span>
                                </div><input type="number" class="form-control" id="" placeholder="Biaya Transport" name="biaya_transport" readonly value="15000">
                              </div>
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <a href="<?php echo base_url('gaji') ?>" class="btn btn-default">Kembali</a>
                          <input type="submit" class="btn btn-primary pull-right" value="Buat Gaji">
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
            <?php $this->load->view('include/base_footer'); ?>
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
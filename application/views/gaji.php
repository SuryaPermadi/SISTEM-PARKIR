<!-- Contoh penggunaan di dalam file views -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gaji Petugas Lapangan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->
  <?php $this->load->view('include/base_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.css">
</head>

<body>

  <body class="hold-transition sidebar-mini">
    <!-- navbar -->
    <?php $this->load->view('include/base_nav'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-3">
            <div class="col-sm-6">
              <h1>Gaji Petugas Lapangan</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><a href="<?php echo base_url('gaji/tambahGajiView') ?>" class="btn btn-primary">Tambah Gaji</a></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode Petugas</th>
                  <th>Nama Petugas</th>
                  <th>Gaji Pokok</th>
                  <th>Biaya Makan</th>
                  <th>Biaya Transport</th>
                  <th>Total Gaji</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php if (is_array($gajiPetugas)) { ?>
                  <?php foreach ($gajiPetugas as $row) { ?>
                    <tr>
                      <td><?php echo $row['kd_petugas'] ?></td>
                      <td><?php echo $row['nama_petugas'] ?></td>
                      <td><?php echo $row['gaji_pokok'] ?></td>
                      <td><?php echo $row['biaya_makan'] ?></td>
                      <td><?php echo $row['biaya_transport'] ?></td>
                      <td><?php echo $row['total_gaji'] ?></td>
                      <td><a href="<?php echo base_url('gaji/view/' . $row['kd_petugas']) ?>" class="btn btn-default">VIEW</a> | <a href="<?php echo base_url('gaji/delete/' . $row['kd_petugas']) ?>"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->


    </div>
    <!-- ./wrapper -->

    <!-- script -->
    <!-- DataTables -->

    <?php $this->load->view('include/base_js'); ?>
    <script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>

</html>
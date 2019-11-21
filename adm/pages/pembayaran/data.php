
<div class="row">
        <div class="col-lg-12 mt-3">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List pembayaran</h3>

              <div class="box-tools pull-right">
                
                
              </div>
            </div>
             
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No tagihan</th>
                  <th>Nama pengirim</th>
                  <th>Email</th>
                  <th>Bank asal</th>
                  <th>Tgl transfer</th>
                  <th>Bank tujuan</th>
                  <th>Jumlah transfer</th>
                  <th>Pesan</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $pembayaran =new Konfirmasi();
                    $rows_pembayaran = $pembayaran->selectall();

                    foreach ($rows_pembayaran as $row)
                    {
                  ?>
                <tr>
                  <td><?php echo $row['notagihan']; ?></td>
                  <td><?php echo $row['namapengirim']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['bankasal']; ?></td>
                  <td><?php echo $row['tgltransfer']; ?></td>
                  <td><?php echo $row['banktujuan']; ?></td>
                  <td><?php echo $row['jumlahtransfer']; ?></td>
                  <td><?php echo $row['pesan']; ?></td>
                  

                </tr>
                
              </div>
                <?php }?>
                </tfoot>
              </table>
                          
                          <!-- /.box-footer -->
            </div>
          </div>
       </div>
    </div>
        <!-- right col -->
</div>

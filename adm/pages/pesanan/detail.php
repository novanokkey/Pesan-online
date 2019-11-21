
<div class="row">
        <div class="col-lg-12 mt-3">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List pesanan masuk</h3>

              <div class="box-tools pull-right">
                                
              </div>
            </div>
             
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">No. tagihan</th>
                  <th>Nama pemesan</th>
                  <th>No. HP</th>
                  <th>Metode pembayaran</th>
                  <th>Status</th>
                  <th>Total tagihan</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                    $notagihan = $_REQUEST['id'];
                    
                    $pesanan =new Keranjang();
                    $row = $pesanan->selectDetailtagihan($notagihan);

                    
                  ?>
                <tr>
                  <td><?php echo $row['notagihan']; ?></td>
                  <td><?php echo $row['nama_lengkap']; ?></td>
                  <td><?php echo $row['nohp']; ?></td>
                  <td><?php echo $row['metode_pembayaran']; ?></td>
                  <td><?php if($row['status_pembayaran']=='Y'){echo '<span class="right badge badge-success">sudah bayar</span>';}else{echo '<span class="badge badge-danger">belum bayar</span>';} ?></td>
                  <td>Rp. <?php echo number_format($row['totaltagihan'],0,',','.'); ?></td>
                  
                  

                </tr>
                
              </div>
          
                </tfoot>
              </table>

              <hr>
              Detail pesanan
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nama produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Sub total</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $pesanan =new Keranjang();
                    $rows_pesanan = $pesanan->selectDaftarPesanan($notagihan);

                    foreach ($rows_pesanan as $row)
                     
                    {

                       $idproduk = $row['idproduk'];
                      $idpelanggan = $row['idpelanggan'];

                      $hit_produk = $pesanan->selectCountDetailpesanan($idproduk,$idpelanggan,$notagihan);
                  ?>
                <tr>
                  
                  <td><?php echo $row['nama_produk']; ?></td>
                  <td>Rp. <?php echo number_format($row['harga'],0,',','.'); ?></td>
                  <td><?php echo $hit_produk['idproduk']; ?> 
                  <td>
                                    Rp. 
                                    <?php 
                                      echo number_format($row['harga'] * $hit_produk['idproduk'],0,',','.'); 
                                      
                                    ?>
                                   
                                </td>
                  
                  
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
<!----------------------------------------------------------------------------->


        <div class="modal modal-default fade" id="modal-success">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Add New</h4>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                              <form id="form" action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                <div class="container-fluid">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="idkatproduk" class="form-control select2" style="width: 100%;">
                                    <?php
                    
                                    $katproduk =new Produk();
                                    $rows_katproduk = $katproduk->selectallkategori();

                                    foreach ($rows_katproduk as $row1)
                                    {
                                  ?>
                                      <option value="<?php echo $row1['idkatproduk']; ?>"><?php echo $row1['nama_kategori']; ?></option>
                                  <?php } ?>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Nama produk</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                      </div>
                                      <input type="text" class="form-control" name="nama_produk" placeholder="nama_produk">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Harga</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="harga" placeholder="harga">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Deskripsi</label>

                                    <div class="input-group">
                                      
                                      <textarea name="deskripsi" rows="5" class="ckeditor" required></textarea>
                                      
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah tersedia</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="stok" placeholder="stok">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Gambar 1</label>
                                    <input type="file" name="gambar1"  id="exampleInputFile" required>
                                  </div>

                                  <div class="form-group">
                                    <label>Gambar 2</label>
                                    <input type="file" name="gambar2"  id="exampleInputFile" required>
                                  </div>

                                  <div class="form-group">
                                    <label>Gambar 3</label>
                                    <input type="file" name="gambar3"  id="exampleInputFile" required>
                                  </div>
                                </div>

                                </div>
                                <div class="modal-footer">
                                  <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                          </form>
                          </div>
                          </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

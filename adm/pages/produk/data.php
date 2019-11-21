
<div class="row">
        <div class="col-lg-12 mt-3">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Produk</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-info btn-flat" data-toggle="modal" data-target="#modal-success">
                <i class="fa fa-plus"></i>
              </button>
                
              </div>
            </div>
             
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">Images</th>
                  <th>Nama produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $produk =new Produk();
                    $rows_produk = $produk->selectall();

                    foreach ($rows_produk as $row)
                    {
                  ?>
                <tr>
                  <td width="20%"><img src="../img/produk/<?php echo $row['gambar1']?>" width="100%" alt="<?php echo $row['judul']; ?>"></td>
                  <td><?php echo $row['nama_produk']; ?></td>
                  <td><?php echo $row['nama_kategori']; ?></td>
                  <td><?php echo $row['harga']; ?></td>
                  <td><?php echo $row['stok']; ?></td>
                  
                  <td>
                    <a href="#" type="button" class="btn btn-sm btn-info btn-flat" data-toggle="modal" data-target="#myModal<?php echo $row['idproduk']; ?>"><i class="fa fa-pencil"></i></a>
                    <a href="hapus7-<?php echo $row['idproduk']?>" onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
                <div class="modal fade" id="myModal<?php echo $row['idproduk']; ?>" role="dialog">
                  <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Data</h4>
                  </div>
                  <div class="modal-body">
                  <form action="" class="form-horizontal" method="post">

                  <?php
                      $id = $row['idproduk']; 
                      $produk = new Produk();
                      $result = $produk->selectByid($id);
                  ?>

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
                                      <option value="<?php echo $row1['idkatproduk']; ?>" <?php if ($row1['idkatproduk']==$result['idkatproduk']){ echo"selected";}?>><?php echo $row1['nama_kategori']; ?></option>
                                  <?php } ?>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Nama produk</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                      </div>
                                      <input type="text" class="form-control" value="<?php echo $result['nama_produk']; ?>"  name="nama_produk" placeholder="nama_produk">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Harga</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="harga" value="<?php echo $result['harga']; ?>" placeholder="harga">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Deskripsi</label>

                                    <div class="input-group">
                                      
                                      <textarea name="deskripsi" rows="5" class="ckeditor" required><?php echo $result['deskripsi']; ?></textarea>
                                      
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Jumlah tersedia</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="stok" value="<?php echo $result['stok']; ?>" placeholder="stok">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  
                                </div>

                                <div class="modal-footer">  
                                <input type="hidden" class="form-control" name="id" value="<?php echo $result['idproduk']; ?>">
                                <button type="submit" class="btn btn-success" name="update">Update</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                      
                          </form>
                      </div>
                  </div>

                 </div>
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

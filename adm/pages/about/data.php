
<div class="row">
        <div class="col-lg-12 mt-3">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Config About Company</h3>

              <div class="box-tools pull-right">
                
              </button>
                
              </div>
            </div>
             
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">Logo</th>
                  <th>Name Of Company</th>
                  <th>No. Telephone</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Map</th>
                  <th>Onboard</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $config =new Config();
                    $rows_config = $config->selectAll();

                    foreach ($rows_config as $row)
                    {
                  ?>
                <tr>
                  <td width="5%"><img src="../img/logo/<?php echo $row['logo']?>" width="40%" alt="<?php echo $row['nama_instansi']; ?>"></td>
                  <td><?php echo $row['nama_instansi']; ?></td>
                  <td><?php echo $row['no_telp']; ?></td>
                  <td><?php echo $row['no_fax']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['map']; ?></td>
                  <td><?php echo $row['onboard']; ?></td>

                  <td>
                    <a href="#" type="button" class="btn btn-sm btn-info btn-flat" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                  </td>

                </tr>
                <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
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
                      $id = $row['id']; 
                      $config = new Config();
                      $result = $config->selectByid($id);

                  ?>

                      <div class="container-fluid">
                                  
                                  <div class="form-group">
                                    <label>Name Of Company</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                      </div>
                                      <input type="text" class="form-control" value="<?php echo $result['nama_instansi']; ?>"  name="nama_instansi" placeholder="nama_instansi">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Telephone Number</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="no_telp" value="<?php echo $result['no_telp']; ?>" placeholder="no_telp">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="email" value="<?php echo $result['no_fax']; ?>" placeholder="Email">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <div class="form-group">
                                    <label>ALamat</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="alamat" value="<?php echo $result['alamat']; ?>" placeholder="alamat">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <div class="form-group">
                                    <label>Map</label>

                                    <div class="input-group">
                                      
                                    <textarea rows="6" cols="90" name="map"><?php echo $result['map']; ?></textarea>
                                      
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Onboard</label>

                                    <div class="input-group">
                                      
                                      <textarea name="onboard" rows="5" class="ckeditor" required><?php echo $result['onboard']; ?></textarea>
                                      
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  
                                </div>

                                <div class="modal-footer">  
                                <input type="hidden" class="form-control" name="id" value="<?php echo $result['id']; ?>">
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
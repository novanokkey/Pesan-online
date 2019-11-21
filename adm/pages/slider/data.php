
<div class="row">
        <div class="col-lg-12 mt-3">

        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Slider Images</h3>

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
                  <th>Chapter</th>
                  <th>URL</th>
                  <th>Status</th>
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $slider =new Slider();
                    $rows_slider = $slider->selectall();

                    foreach ($rows_slider as $row)
                    {
                  ?>
                <tr>
                  <td width="20%"><img src="../img/slider/<?php echo $row['file']?>" width="100%" alt="<?php echo $row['judul']; ?>"></td>
                  <td><?php echo $row['judul']; ?></td>
                  <td><?php echo $row['url']; ?></td>
                  <td><?php if($row['status']==1){echo 'Actived';}else{echo 'Not Actived';} ?></td>
                  <td>
                    <a href="#" type="button" class="btn btn-sm btn-info btn-flat" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                    <a href="hapus3-<?php echo $row['id']?>" onclick="return confirm('Are you sure ?')" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-trash"></i></a>
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
                      $slider = new Slider();
                      $result = $slider->selectByid($id);

                  ?>

                      <div class="container-fluid">
                                  <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                      
                                      <option value="1" <?php if ($result['status']=="1"){ echo"selected";}?>>Activ</option>
                                      <option value="0" <?php if ($result['status']=="0"){ echo"selected";}?>>Non Active</option>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Chapter</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                      </div>
                                      <input type="text" class="form-control" value="<?php echo $result['judul']; ?>"  name="judul" placeholder="Chapter">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>URL</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="url" value="<?php echo $result['url']; ?>" placeholder="URL">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Content</label>

                                    <div class="input-group">
                                      
                                      <textarea name="konten" rows="5" class="ckeditor" required><?php echo $result['konten']; ?></textarea>
                                      
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
                                    <label>Status</label>
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                      
                                      <option value="1">Activ</option>
                                      <option value="0">Non Active</option>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Chapter</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                      </div>
                                      <input type="text" class="form-control" name="judul" placeholder="Chapter">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>URL</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-bomb"></i>
                                      </div>
                                      <input type="text" class="form-control" name="url" placeholder="URL">
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Content</label>

                                    <div class="input-group">
                                      
                                      <textarea name="konten" rows="5" class="ckeditor"></textarea>
                                      
                                    </div>
                                    <!-- /.input group -->
                                  </div>

                                  <div class="form-group">
                                    <label>Images</label>
                                    <input type="file" name="file"  id="exampleInputFile">
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

<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">All Sliders</h4>
            <a type="button" href="/admin/add-slide" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Slider</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>SUBTITLE</th>
                        <th>SLIDE</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </thead>
                  <tbody>

                     <? while ($slide = mysqli_fetch_object($Slides)) : ?>
                        <tr>
                           <td><?= $slide->id; ?></td>
                           <td><?= $slide->title ?></td>
                           <td><?= $slide->subtitle ?></td>
                           <td><img src="<?= $slide->slide; ?>" style="height:50px ;" /></td>
                           <td>
                              <div class="d-flex">
                                 <a href="/admin/delete-slide/slide/<?= $slide->id; ?>" class="btn btn-danger shadow btn-xs"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                           </td>
                        </tr>
                     <? endwhile; ?>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>SUBTITLE</th>
                        <th>SLIDE</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
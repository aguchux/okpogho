<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">All Registrations</h4>
            <a type="button" href="#" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Member</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>


                        <th>ID</th>
                        <th>SURNAME</th>
                        <th>OTHER NAMES</th>
                        <th>MOBILE</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>

                     </tr>
                  </thead>
                  <tbody>

                     <? while ($member = mysqli_fetch_object($Members)) : ?>
                        <tr>
                           <td><?= $member->id; ?></td>
                           <td><?= $member->surmname ?></td>
                           <td><?= $member->othernames ?></td>
                           <td><?= $member->mobile; ?></td>
                           <td>
                              <div class="d-flex">
                                 <a href="/admin/members/<?= $member->id; ?>/edit" class="btn btn-success shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> Edit</a>
                                 <a href="/admin/members/<?= $member->id; ?>/delete" class="btn btn-danger shadow btn-xs"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                           </td>

                        </tr>
                     <? endwhile; ?>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>SURNAME</th>
                        <th>OTHER NAMES</th>
                        <th>MOBILE</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Manage Project & Dues</h4>
            <a type="button" href="/admin/add-project" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Project/Due</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>

                        <th>ID</th>
                        <th>TITLE</th>
                        <th>TOTAL</th>
                        <th>RAISED</th>
                        <th>UNPAID</th>
                        <th>PAID</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>

                     </tr>
                  </thead>
                  <tbody>

                     <? while ($due = mysqli_fetch_object($Projects)) :  ?>
                        <tr>
                           <td><?= $due->id; ?></td>
                           <td><?= $due->title ?></td>
                           <td><?= $Core->ToMoney($due->total) ?></td>
                           <td><?= $Core->ToMoney($due->amount_raised) ?></td>
                           <td><a class="text-link text-danger" href="/admin/dues/<?= $due->id; ?>/unpaid">Unpaid (<?= $Core->UnpaidMembers($due->id) ?>)</a></td>
                           <td><a class="text-link text-danger" href="/admin/dues/<?= $due->id; ?>/paid">Paid (<?= $Core->PaidMembers($due->id) ?>)</a></td>
                           <td>
                              <div class="d-flex">
                                 <a href="/admin/dues/<?= $due->id; ?>/edit" class="btn btn-success shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> Edit</a>
                                 <a href="/admin/dues/<?= $due->id; ?>/delete" class="btn btn-danger shadow btn-xs"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                           </td>
                        </tr>
                     <? endwhile; ?>

                  </tbody>

                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>TOTAL</th>
                        <th>RAISED</th>
                        <th>UNPAID</th>
                        <th>PAID</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>

               </table>
            </div>
         </div>
      </div>
   </div>
</div>
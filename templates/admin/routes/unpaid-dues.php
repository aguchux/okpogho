<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title"><strong><?= $ProjectInfo->title ?></strong> - Unpaid</h4>
            <a type="button" href="/admin/dues" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Dues</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>


                        <th>ID</th>
                        <th>MEMBER</th>
                        <th>AMOUNT</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>

                     </tr>
                  </thead>
                  <tbody>

                     <? while ($member = mysqli_fetch_object($Members)) :
                        if (in_array($member->id, $UnpaidMembers) && !in_array($member->id, $PaidMembers)) : ?>
                           <tr>
                              <td><?= $member->id; ?></td>
                              <td><?= "{$member->surname} {$member->othernames}" ?></td>
                              <td><?= $Core->ToMoney($ProjectInfo->amount) ?></td>
                              <td>
                                 <div class="d-flex">
                                    <a href="/admin/dues/<?= $member->id; ?>/<?= $member->id; ?>/edit" class="btn btn-success shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> Paid</a>
                                 </div>
                              </td>
                           </tr>
                     <? endif;
                     endwhile; ?>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>MEMBER</th>
                        <th>AMOUNT</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
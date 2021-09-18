<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">Manage Donations</h4>
            <a type="button" href="/admin/add-project" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Project/Due</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>

                        <th>ID</th>
                        <th>MEMBER</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>

                     </tr>
                  </thead>
                  <tbody>

                     <? while ($donation = mysqli_fetch_object($Donations)) :
                        $MemberInfo = $Core->MemberInfo($member->memberid);
                     ?>
                        <tr>
                           <td><?= $donation->id; ?></td>
                           <td><?= "{$MemberInfo->surname} {$MemberInfo->othernames}" ?></td>
                           <td><?= $Core->ToMoney($member->amount) ?></td>
                           <td><?= $member->completed; ?></td>
                           <td>
                              <div class="d-flex">
                                 <a href="/admin/donations/<?= $donation->id; ?>/view" class="btn btn-success shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> View</a>
                              </div>
                           </td>

                        </tr>
                     <? endwhile; ?>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>MEMBER</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
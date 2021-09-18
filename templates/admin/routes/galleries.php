<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Gallaries</h4>
                <a type="button" href="/admin/add-gallary" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Gallery</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>PHOTO</th>
                                <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                            <? while ($gallary = mysqli_fetch_object($Gallaries)) : ?>
                                <tr>
                                    <td><?= $gallary->id; ?></td>
                                    <td><?= $gallary->title ?></td>
                                    <td><img src="<?= $gallary->photo; ?>" style="height:50px ;" /></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/admin/edit-gallery/gallery/<?= $gallary->id; ?>" class="btn btn-danger shadow btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <? endwhile; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>PHOTO</th>
                                <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
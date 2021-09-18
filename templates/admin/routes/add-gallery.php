<div class="container-fluid">
    <div class="col-xl-12 col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Gallary</h4>
                <a type="button" href="/admin/gallaries" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Gallaries</a>
            </div>
            <div class="card-body">

                <form action="/ajax/add-gallery" method="POST" enctype="multipart/form-data">

                    <?= $Me->tokenize() ?>

                    <div class="row">

                        <div class="col-12 col-md-6 form-group">
                            <label for="title">Gallary Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Gallary Title">
                        </div>

                        <div class="col-12 col-md-2 form-group">
                            <label for="photogallary">Photos</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="photogallary" value="1" name="photogallary" checked="checked" /> Set Photo Gallary
                            </label>
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <label for="projectgallary">Projects</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="projectgallary" value="1" name="projectgallary" /> Set Project Gallary
                            </label>
                        </div>
                        <div class="col-12 col-md-2 form-group">
                            <label for="servicegallary">Services</label><br />
                            <label class="checkbox-inline mt-2">
                                <input type="checkbox" id="servicegallary" value="1" name="servicegallary" /> Set Service Gallary
                            </label>
                        </div>

                    </div>

                    <div class="row">


                        <div class="col-6 col-md-6 col-lg-6 form-group">
                            <label for="gallaryphoto">Gallary Photo</label>
                            <input name="gallaryphoto" id="gallaryphoto" required aria-required="true" class="form-control form-control-lg" type="file" />
                        </div>

                        <div class="col-6 col-md-6 col-lg-6 form-group">
                            <label class="col-12 col-md-12" for="parent">Linked Page</label>
                            <select name="parent" id="parent" class="form-control form-control-lg">
                                <option value="#"> - No Link (#) - </option>
                                <?php while ($pr = mysqli_fetch_array($parents)) : ?>
                                    <option value="<?= $pr['pageid'] ?>"><?= $pr['menutitle'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 form-group">
                            <textarea class="form-control tinymce-classic" name="contents" id="contents" style="width:100%;"></textarea>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Create Gallary</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>
</div>
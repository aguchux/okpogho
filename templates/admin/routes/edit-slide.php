<div class="container-fluid">
    <div class="col-xl-12 col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Slider</h4>
                <a type="button" href="/admin/slides" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Slides</a>
            </div>
            <div class="card-body">

                <form action="/ajax/add-slide" method="POST" enctype="multipart/form-data">

                    <?= $Me->tokenize() ?>

                    <div class="row">

                        <div class="col-12 col-md-6 form-group">
                            <label for="title">Slide Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Gallary Title">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <label for="subtitle">Slide Sub Title</label>
                            <input required name="subtitle" id="subtitle" class="form-control form-control-lg" type="text" placeholder="Gallary Sub Title">
                        </div>

                    </div>

                    <div class="row">


                        <div class="col-4 col-md-4 col-lg-4 form-group">
                            <label for="sliderphoto">Slider Photo</label>
                            <input name="sliderphoto" required aria-required="true" id="sliderphoto" class="form-control form-control-lg" type="file" />
                        </div>

                        <div class="col-4 col-md-4 col-lg-4 form-group">
                            <label for="buttontext">Button Text</label>
                            <input required name="buttontext" id="buttontext" class="form-control form-control-lg" type="text" placeholder="Button Text">
                        </div>

                        <div class="col-4 col-md-4 col-lg-4 form-group">
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
                            <button type="submit" class="btn btn-primary btn-lg">Create Slide</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>
</div>
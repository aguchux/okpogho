<div class="container-fluid">
    <div class="col-xl-12 col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Project/Due</h4>
                <a type="button" href="/admin/dues" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Manage Dues</a>
            </div>
            <div class="card-body">

                <form action="/ajax/add-project" method="POST" enctype="multipart/form-data">

                    <?= $Me->tokenize() ?>

                    <div class="row">

                        <div class="col-12 col-md-12 form-group">
                            <label for="title">Project Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Project/Dues Title">
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-12 col-md-3 form-group">
                            <label for="title">Total Fund</label>
                            <input required name="total" id="total" class="form-control form-control-lg" type="number" placeholder="Total">
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label for="title">Donation Amount</label>
                            <input required name="amount" id="amount" class="form-control form-control-lg" type="number" placeholder="Amount">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 form-group">
                                    <label for="method">Shared Dues</label><br />
                                    <label class="radio-inline mt-2">
                                        <input type="radio" checked value="due" name="method" /> Share on members
                                    </label>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="method">Wishful Donations</label><br />
                                    <label class="radio-inline mt-2">
                                        <input type="radio" value="donation" name="method" /> Member donations
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Create Project/Due</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>

    </div>
</div>
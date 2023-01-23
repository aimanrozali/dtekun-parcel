<section>
    <div class="col-12">

        <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Welcome to D'Tekun Parcel </div>
                Please enter your tracking number to see your parcel status.
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <form action="<?= base_url() ?>Parcel/trackParcel" method="POST">
                    <input class="col-6 mb-4" type="text" placeholder="Enter tracking number" name="searchTrackingNum">
                    <button class=" btn btn-primary" type="submit" name="search">Search</button>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
</section>
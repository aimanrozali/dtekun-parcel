<section>
  <div class="col-12">

    <div class="col-6 m-auto alert alert-info alert-has-icon">
      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      <div class="alert-body">
        <div class="alert-title">Welcome to D'Tekun Parcel </div>
        Please enter your tracking number to see your parcel status.
      </div>
    </div>


    <div class="card mt-4">
      <div class="card-body">
        <form action="">
          <div class="form-group">
            <div class="col-6 m-auto input-group mb-3">
              <input type="text" class="form-control" placeholder="Enter tracking number" name="trackingNum" required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </div>
          </div>
        </form>

        <?php $i = 1;

        if ($search != 1) { ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center"> Tracking Number </th>
                  <th class="text-center"> Customer Name</th>
                  <th class="text-center"> Courier Type</th>
                  <th class="text-center"> Date Arrived</th>
                  <th class="text-center"> Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($search as $row) { ?>
                  <tr>
                    <!-- Trackin Number -->
                    <td class="text-center">
                      <?php echo $row->tracking_number; ?>
                    </td>
                    <!-- Customer name -->
                    <td class="text-center">
                      <?php echo $row->parcel_name; ?>
                    </td>
                    <!-- Courier type -->
                    <td class="text-center">
                      <?php echo $row->parcel_courier; ?>
                    </td>
                    <!-- Date arrived -->
                    <td class="text-center">
                      <?php echo $row->date_arrived; ?>
                    </td>
                    <!-- Parcel status -->
                    <td class="text-center">
                      <?php if ($row->parcel_status == '1') { ?>
                        <span class="badge badge-success parcel_status" ?>Claimed</span>
                      <?php } else { ?>
                        <span class="badge badge-warning parcel_status">Arrived</span>
                      <?php } ?>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        <?php } ?>
      <?php } elseif ($search == 1) { ?>
        <table class="m-auto">
          <thead>
            <tr>
              <th class="text-center"> Parcel cannot be found </th>
            </tr>
          </thead>
        </table>
      <?php } ?>

      </div>
    </div>
  </div>
  </div>
  </div>
</section>
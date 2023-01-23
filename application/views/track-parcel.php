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


        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
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
              foreach ($data as $data) {
                ?>
                <tr>

                  <td class="text-center"><?php echo $data->tagID; ?></td>
                  <td class="text-center">
                    <?php echo $data->parcel_name; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $data->parcel_courier; ?>
                  </td>
                  <td class="text-center">
                    <?php echo $data->date_arrived; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($data->parcel_status == '1') { ?>
                      <div class="badge badge-success badge-shadow">Claimed</div>
                    <?php } else { ?>
                      <div class="badge badge-warning badge-shadow">Arrived</div>
                    <?php } ?>
                  </td>

                </tr>

              <?php } ?>

              <!-- <tr>

                <td class="text-center"> ABC124</td>
                <td class="text-center">
                  Aiman Rozali
                </td>
                <td class="text-center">
                  JNT
                </td>
                <td class="text-center">2018-01-20</td>
                <td class="text-center">
                  <div class="badge badge-warning badge-shadow">Arrived</div>
                </td>

              </tr>

              <tr>

                <td class="text-center"> ABC125</td>
                <td class="text-center">
                  Irdina
                </td>
                <td class="text-center">
                  JNT
                </td>
                <td class="text-center">2018-01-20</td>
                <td class="text-center">
                  <div class="badge badge-warning badge-shadow">Arrived</div>
                </td>

              </tr>

              <tr>

                <td class="text-center"> ABC125</td>
                <td class="text-center">
                  Alya Mazlan
                </td>
                <td class="text-center">
                  JNT
                </td>
                <td class="text-center">2018-01-20</td>
                <td class="text-center">
                  <div class="badge badge-success badge-shadow">Claimed</div>
                </td>

              </tr> -->


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
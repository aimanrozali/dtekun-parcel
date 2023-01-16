<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Parcel List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th class="text-center"> Tracking Number </th>
                    <th class="text-center"> Customer Name</th>
                    <th class="text-center"> Courier Type</th>
                    <th class="text-center"> Size</th>
                    <th class="text-center"> Date Arrived</th>
                    <th class="text-center"> Status</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $data) {
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $i; ?></td>
                      <td class="text-center">
                        <?php echo $data->tracking_number; ?>
                      </td>
                      <td class="text-center"><?php echo $data->parcel_name; ?></td>
                      <td class="text-center">
                        <?php echo $data->parcel_courier; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $data->parcel_size; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $data->date_arrived; ?>
                      </td>
                      <td class="text-center">
                        <?php if ($data->parcel_status == '1') { ?>

                          <button type="button" data-toggle="modal" data-target="#basicModal"
                            class="btn btn-success parcel_status" uid="<?php echo $data->parcel_id; ?>"
                            ustatus="<?php echo $data->parcel_status; ?>">Claimed</button>

                        <?php } else { ?>

                          <button type="button" data-toggle="modal" data-target="#basicModal"
                            class="btn btn-warning parcel_status" uid="<?php echo $data->tracking_number; ?>"
                            ustatus="<?php echo $data->parcel_status; ?>">Arrived</button>

                        <?php } ?>


                      </td>
                    </tr>


                    <?php $i++;
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).on('click', '.parcel_status', function () {

    var tracking_number = $(this).attr('uid'); //get attribute value in variable
    var parcel_status = $(this).attr('ustatus'); //get attribute value in variable

    $('#parcel_id').val(tracking_number); //pass attribute value in ID
    $('#parcel_status').val(parcel_status);  //pass attribute value in ID

  });
</script>

<form action="<?php echo base_url(); ?>Parcel/change_status" method="post">
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verify Parcel Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          Do you want to change the parcel status?

          <input type="hidden" name="parcel_id" id="parcel_id" value="">
          <input type="hidden" name="status" id="parcel_status" value="">
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" id="swal-2" name="submit" class="btn btn-primary">Change</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>

</form>

</div>
</div>
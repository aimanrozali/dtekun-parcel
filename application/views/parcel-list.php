<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

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
                    <th class="text-center"> Actions</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1; 
                  foreach ($parcelList as $row) { //retrieve parcel record from database and display in table
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $i; ?></td>
                      <td class="text-center">
                        <?php echo $row->tracking_number; ?>
                      </td>
                      <td class="text-center"><?php echo $row->parcel_name; ?></td>
                      <td class="text-center">
                        <?php echo $row->parcel_courier; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $row->parcel_size; ?>
                      </td>
                      <td class="text-center">
                        <?php echo $row->date_arrived; ?>
                      </td>
                      <!--Display Button According to Status-->
                      <td class="text-center"> 
                        <?php if ($row->parcel_status == '1') { ?>
                          <button type="button" data-toggle="modal" data-target="#basicModal" class="btn btn-success parcel_status" uid="<?php echo $row->tracking_number; ?>" ustatus="<?php echo $row->parcel_status; ?>">Claimed</button>
                        <?php } else { ?>
                          <button type="button" data-toggle="modal" data-target="#basicModal" class="btn btn-warning parcel_status" uid="<?php echo $row->tracking_number; ?>" ustatus="<?php echo $row->parcel_status; ?>">Arrived</button>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                      <!--Delete Button-->
                        <button type="button" class="btn btn-danger btn-sm confirm-delete" value="<?php echo $row->tracking_number ?>">
                          <i class="fa fa-trash"></i></button>
                      <!--Edit Button-->
                        <button type="button" class="btn btn-primary btn-sm edit-btn" data-tagid="<?= $row->tagID;?>" data-tracknum="<?= $row->tracking_number;?>" data-name="<?= $row->parcel_name;?>" data-phone="<?= $row->parcel_phone;?>" data-courier="<?= $row->parcel_courier;?>" data-size="<?= $row->parcel_size;?>"><i class="fa fa-edit"></i></button>
                      </td>
                    </tr>

                  <?php $i++; //increment for each parcel data
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

<!--Get parcel status based on tracking number-->
<script type="text/javascript">
  $(document).on('click', '.parcel_status', function() {

    var tracking_number = $(this).attr('uid'); //get attribute value in variable
    var parcel_status = $(this).attr('ustatus'); //get attribute value in variable

    $('#tracking_number').val(tracking_number); //pass attribute value in ID
    $('#parcel_status').val(parcel_status); //pass attribute value in ID

  });
</script>

<!-- Modal Verify Parcel Status-->
<form action="<?php echo base_url(); ?>Parcel/change_status" method="post">
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <input type="hidden" name="tracking_number" id="tracking_number" value="">
          <input type="hidden" name="parcel_status" id="parcel_status" value="">
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" id="swal-2" name="submit" class="btn btn-primary">Change</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>

</form>
</div>
</div>
<!-- End Modal Verify Parcel Status -->

<script>
  $(document).ready(function() {

    $('.confirm-delete').click(function(e) {

      e.preventDefault();

      var trackingNum = $(this).val();
      confirmDialog = confirm("Are you sure you want to delete this data?");

      if (confirmDialog) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url("Parcel/delete/"); ?>" + trackingNum,
          dataType: "json",
          success: function(response) {
            if (response.status == true) {
              alert("Data deleted successfully");
              location.reload();
            } else {
              alert("Error deleting data");
            }
          }
        });
      }
    });
  });
</script>

<!-- Modal Edit Parcel-->
<form action="<?php echo base_url(); ?>Parcel/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Parcel Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="alert d-none"></div>
                <div class="form-group">
                    <label>Tag ID</label>
                    <input type="text" class="form-control tagID" name="tagID" placeholder="Tag ID" required>
                </div>

                <div class="form-group">
                    <label>Tracking Number</label>
                    <input type="text" class="form-control tracking_number" name="tracking_number" placeholder="Tracking Number" disabled>
                </div>
             
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control parcel_name" name="parcel_name" placeholder="Customer Name" required>
                </div>
                 
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control parcel_phone" name="parcel_phone" placeholder="Phone Number" required>
                </div>
 
                <div class="form-group">
                    <label>Courier</label>
                    <select name="parcel_courier" class="form-control parcel_courier" required>
                        <option value=""><?= $row->parcel_courier;?></option>
                        <option>J&T Express</option>
                        <option>Shopee Express</option>
                        <option>DHL</option>
                        <option>Pgeon</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Parcel Size</label>
                    <select name="parcel_size" class="form-control parcel_size" required>
                        <option value=""><?= $row->parcel_size;?></option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="tracking_number" class="tracking_number">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_update" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Parcel-->

<script>
    $(document).ready(function(){
        // get Edit Parcel
        $('.edit-btn').on('click',function(){
            // get data from button edit
            const tagID = $(this).data('tagid');
            const tracking_number = $(this).data('tracknum');
            const parcel_name = $(this).data('name');
            const parcel_phone = $(this).data('phone');
            const parcel_courier = $(this).data('courier');
            const parcel_size = $(this).data('size');
            
            // Set data to Form Edit
            $('.tagID').val(tagID);
            $('.tracking_number').val(tracking_number);
            $('.parcel_name').val(parcel_name);
            $('.parcel_phone').val(parcel_phone);
            $('.parcel_courier').val(parcel_courier).trigger('change');
            $('.parcel_size').val(parcel_size).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        $('#btn_update').on('click', function(){
            $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Parcel/update",
            data: $('form').serialize(),
            success: function(){
                $('.alert').removeClass('d-none');
                $('.alert').html('Data updated successfully!').addClass('alert-success');
                setTimeout(function(){
                    $('.alert').addClass('d-none');
                    location.reload();
                }, 1300);
            }
        });
    });
         
    });
</script>
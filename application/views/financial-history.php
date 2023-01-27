<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Financial History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center"> Date</th>
                                        <th class="text-center"> Closing Manager </th>
                                        <th class="text-center"> Online Transaction (RM)</th>
                                        <th class="text-center"> Cash Transaction (RM)</th>
                                        <th class="text-center"> Total Sales (RM)</th>
                                        <th class="text-center"> Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($financehist as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <!-- Date Closing -->
                                            <td class="text-center">
                                                <?php echo $row->closing_date; ?>
                                            </td>
                                            <!-- PIC Closing -->
                                            <td class="text-center">
                                                <?php echo $row->closing_manager; ?>
                                            </td>

                                            <!-- Total Online -->
                                            <td class="text-center">
                                                <?php echo $row->total_online; ?>
                                            </td>
                                            <!-- Total Cash -->
                                            <td class="text-center">
                                                <?php echo $row->total_cash; ?>
                                            </td>
                                            <!-- Total Sales -->
                                            <td class="text-center">
                                                <?php echo $row->total_sales; ?>
                                            </td>

                                            <td class="text-center">

                                                <button type="button" class="btn btn-danger btn-sm confirm-delete"
                                                    value="<?php echo $row->closing_ID ?>">
                                                    <i class="fa fa-trash"></i></button>

                                                <button type="button" class="btn btn-primary btn-sm edit-btn"
                                                    data-cID="<?= $row->closing_ID; ?>"
                                                    data-tCash="<?= $row->total_cash; ?>"
                                                    data-cManager="<?= $row->closing_manager; ?>"
                                                    data-tOnline="<?= $row->total_online; ?>"
                                                    data-cDate="<?= $row->closing_date; ?>"><i
                                                        class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>

                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $('.confirm-delete').click(function (e) {

        e.preventDefault();

        var closingID = $(this).attr('value');
        confirmDialog = confirm("Are you sure you want to delete this data?");

        if (confirmDialog) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("Finance/delete/"); ?>" + closingID,
                dataType: "json",
                success: function (response) {
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
    $(document).ready(function () {
        $('#table-1').DataTable();
    });
</script>

<!-- Modal Edit Finance-->
<form action="<?php echo base_url(); ?>Finance/updateFinance" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Closing Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert d-none"></div>
                    <div class="form-group">
                        <label>Closing Date</label>
                        <input type="text" class="form-control closingDate" name="closingDate"
                            placeholder="Closing Date" disabled>
                    </div>

                    <div class="form-group">
                        <label>Closing Manager</label>
                        <input type="text" class="form-control closingManager" name="closingManager"
                            placeholder="Closing Manager" required>
                    </div>

                    <div class="form-group">
                        <label>Total Online Transaction</label>
                        <input type="text" class="form-control totalOnline" name="totalOnline"
                            placeholder="Total Online Transaction" required>
                    </div>

                    <div class="form-group">
                        <label>Total Cash</label>
                        <input type="text" class="form-control totalCash" name="totalCash" placeholder="Total Cash"
                            required>
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="closingID" class="closingID">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn_update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Finance-->

<script>

    // get Edit Finance
    $('.edit-btn').on('click', function () {
        // get data from button edit
        const closingID = $(this).attr('data-cID');
        const totalCash = $(this).attr('data-tCash');
        const closingManager = $(this).attr('data-cManager');
        const totalOnline = $(this).attr('data-tOnline');
        const closingDate = $(this).attr('data-cDate');

        console.log(closingID);

        // Set data to Form Edit
        $('.closingDate').val(closingDate);
        $('.closingManager').val(closingManager);
        $('.totalOnline').val(totalOnline);
        $('.totalCash').val(totalCash);
        $('.closingID').val(closingID);
        // Call Modal Edit
        $('#editModal').modal('show');
    });

    $('#btn_update').on('click', function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Finance/updateFinance",
            data: $('form').serialize(),
            success: function () {
                $('.alert').removeClass('d-none');
                $('.alert').html('Data updated successfully!').addClass('alert-success');
                setTimeout(function () {
                    $('.alert').addClass('d-none');
                    location.reload();
                }, 1300);
            }
        });
    });
    $(document).ready(function () {
        $('#table-1').DataTable();
    });
</script>
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
                                        <th class="text-center"> PIC </th>
                                        <th class="text-center"> Total Sales (RM)</th>
                                        <th class="text-center"> Online Transaction (RM)</th>
                                        <th class="text-center"> Cash Transaction (RM)</th>
                                        <th class="text-center"> Revenue (RM)</th>
                                        <th class="text-center"> Date</th>
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
                                            <!-- PIC Closing -->
                                            <td class="text-center">
                                                <?php echo $row->closing_manager; ?>
                                            </td>
                                            <!-- Total Sales -->
                                            <td class="text-center">
                                                <?php echo $row->total_sales; ?>
                                            </td>
                                            <!-- Total Online -->
                                            <td class="text-center">
                                                <?php echo $row->total_online; ?>
                                            </td>
                                            <!-- Total Cash -->
                                            <td class="text-center">
                                                <?php echo $row->total_cash; ?>
                                            </td>
                                            <!-- Total Revenue -->
                                            <td class="text-center">
                                                <?php echo $row->total_revenue; ?>
                                            </td>
                                            <!-- Date Closing -->
                                            <td class="text-center">
                                                <?php echo $row->closing_date; ?>
                                            </td>
                                            <td class="text-center">

                                                <button type="button" class="btn btn-danger btn-sm confirm-delete"
                                                    value="<?php echo $row->closing_ID ?>">
                                                    <i class="fa fa-trash"></i></button>

                                                <button type="button" class="btn btn-primary btn-sm"><i
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<section>
    <form id="form" class="section" method="post" action="<?= base_url() ?>Finance/submitClosing">
        <div class="section-body">
            <div class="card col-sm-6 m-auto">
                <div class="card-header">
                    <h4>Insert Closing Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">PIC Closing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="picClosing" name="picClosing"
                                placeholder="Enter Pic Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Closing Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="closingDate" name="closingDate"
                                value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Online Transaction</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="totalOnline" name="totalOnline"
                                placeholder="Enter Total" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Total Cash</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="totalCash" name="totalCash"
                                placeholder="Enter Total Cash" aria-required="true">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
    </form>
    </div>

    </div>
</section>
<script>
    $(document).ready(function () {
        $('#form').submit(function (e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.status == true) {
                        alert("Data Submitted");
                        document.getElementById("form").reset();
                        e.preventDefault();
                    } else {
                        alert("Error Submitting Data");
                    }
                }
            });
        });
    });
</script>
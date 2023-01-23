<section>
    <form class="section" method="post" action="<?= base_url() ?>Finance/submitClosing">
        <div class="section-body">
            <div class="card col-sm-6 m-auto">
                <div class="card-header">
                    <h4>Insert Closing Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">PIC Closing</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="picClosing"
                                placeholder="Enter Pic Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Closing Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputEmail3" name="closingDate"
                                value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Online Transaction</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputEmail3" name="totalOnline"
                                placeholder="Enter Total" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Total Cash</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputEmail3" name="totalCash"
                                placeholder="Enter Total Cash" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Total Opening Next Day</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputEmail3" name="totalOpening"
                                placeholder="Enter Opening Next Day" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Cash In Hand</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputEmail3" name="totalCashManager"
                                placeholder="Enter Total Cash to Manager" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Pass Cash to Manager</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="cashToManager"
                                placeholder="Enter Manager Name" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
    </form>
    </div>

    </div>
</section>
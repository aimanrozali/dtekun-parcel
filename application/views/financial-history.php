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
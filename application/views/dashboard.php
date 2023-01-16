<section class="section">
    <div class="section-body">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Parcel List</h5>
                                        <h2 class="mb-3 font-18">
                                            <?php
                                                $totalRows = $this->db->count_all('parcel');
                                                echo $totalRows;
                                            ?>
                                        </h2>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>/assets/img/packing-list.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15"> Parcel Received Today</h5>
                                        <h2 class="mb-3 font-18">
                                        <?php         
                                                $this->db->select('*');
                                                $this->db->from('parcel');
                                                $this->db->where('status', '0');
                                                $this->db->where("DATE(dateArrived) = CURDATE()", NULL, FALSE);
                                                echo $this->db->count_all_results();
                                            ?>
                                        </h2>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>/assets/img/just-in-time.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Parcel Claimed Today</h5>
                                        <h2 class="mb-3 font-18">
                                        <?php         
                                                $this->db->select('*');
                                                $this->db->from('parcel');
                                                $this->db->where('status', '1');
                                                $this->db->where("DATE(dateArrived) = CURDATE()", NULL, FALSE);
                                                echo $this->db->count_all_results();
                                            ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>/assets/img/claim.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Parcel Received by Months</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Revenue by Months</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="revChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
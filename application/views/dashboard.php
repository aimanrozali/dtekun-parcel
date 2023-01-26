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
                                            $totalRows = $this->db->count_all('Parcel');
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
                                            $this->db->from('Parcel');
                                            $this->db->where('parcel_status', '0');
                                            $this->db->where("DATE(date_arrived) = CURDATE()", NULL, FALSE);
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
                                            $this->db->from('Parcel');
                                            $this->db->where('parcel_status', '1');
                                            $this->db->where("DATE(date_arrived) = CURDATE()", NULL, FALSE);
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

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="mr-auto">Total Parcel Received in 7 days</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Revenue in 7 days</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="revChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<script src="<?php echo base_url(); ?>/assets/bundles/chartjs/chart.min.js"></script>
<script>


    var ctx = document.getElementById("myChart2").getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($parcel as $p) {
                echo '"' . $p->DateArrived . '",';
            } ?>
            ],
            datasets: [{
                label: 'Parcel Received',
                data: [<?php foreach ($parcel as $s) {
                    echo $s->total . ",";
                } ?>],
                borderWidth: 2,
                backgroundColor: '#6777ef',
                borderColor: '#6777ef',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        fontColor: "#9aa0ac", // Font Color
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: true
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });

    var ctx = document.getElementById("revChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($revenue as $rvd) {
                echo '"' . $rvd->DateClose . '",';
            } ?>
            ],
            datasets: [{
                label: 'Revenue',
                data: [<?php foreach ($revenue as $rvt) {
                    echo $rvt->total . ",";
                } ?>],
                borderWidth: 2,
                backgroundColor: '#6777ef',
                borderColor: '#6777ef',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 150,
                        fontColor: "#9aa0ac", // Font Color
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: true
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });

</script>
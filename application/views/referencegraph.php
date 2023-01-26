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
                                        <h5 class="font-15">New Booking</h5>
                                        <h2 class="mb-3 font-18" id="newOrder"><?php echo $new_count; ?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>assets/img/booking.png" alt="">
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
                                        <h5 class="font-15"> Total Success Booking</h5>
                                        <h2 class="mb-3 font-18"><?php echo $success_count; ?></h2>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>assets/img/list-items.png" alt="">
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
                                        <h5 class="font-15">Total Item In Today</h5>
                                        <h2 class="mb-3 font-18"><?php echo $item_in_today_count; ?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>assets/img/item-in.png" alt="">
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
                                        <h5 class="font-15">Total Item Out Today</h5>
                                        <h2 class="mb-3 font-18"><?php echo $item_out_today_count; ?></h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="<?php echo base_url(); ?>assets/img/item-out.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $month_list = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $curr_year = date("Y");
        $curr_month = date("m");
        $year_range = range(0, ($curr_year - 2022));
        $year_val = range(2022, $curr_year);
        $year_list = array_combine($year_range, $year_val); ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="mr-auto">Total item out</h4>
                        <select class="form-control date-dropdown-half total_item" id="total_item_month" name="input_year">
                        </select>
                        <select class="form-control date-dropdown-half total_item" id="total_item_year" name="input_year">
                            <option value=<?php echo '"' . $curr_year . '"' ?> disabled selected hidden>Year: <?php echo $curr_year ?></option>
                            <?php foreach ($year_list as $year) { ?>
                                <option value=<?php echo '"' . $year . '"' ?>><?php echo $year; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="item_out_graf" class="card-body">
                        <h6 hidden class="center-middle" id="no_graph">No purchase recorded</h6>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="mr-auto">Number of Booking by Staff and PTJ</h4>
                        <select class="form-control date-dropdown-half " id="staff_ptj_year" name="input_year">
                            <option value=<?php echo '"' . $curr_year . '"' ?> disabled selected hidden>Year: 2022</option>
                            <?php foreach ($year_list as $year) { ?>
                                <option value=<?php echo '"' . $year . '"' ?>><?php echo $year; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div id="year_purchase_graf"  class="card-body">
                        <canvas id="line-chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo base_url(); ?>assets/bundles/chartjs/chart.min.js"></script>

<!-- Custom chart goes here -->
<script>
    function getNewOrderCount() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/ajax_get_new_order_count'); ?>",
            success: function(response) {
                var new_order = document.getElementById('newOrder');
                setTimeout(getNewOrderCount, 3000);
                new_order.innerHTML = response;
            },
            error: function(response) {
                alert('something went wrong')
            }
        })
    }

    var month_arr = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']


    function set_item_graf(graph_info_in, graf_color) {

        document.getElementById("myChart").remove() // this is my <canvas> element
        $('#item_out_graf').append('<canvas id="myChart"><canvas>');
        var ctx = document.getElementById("myChart").getContext('2d');

        var graph_item_name = []
        var graph_item_code = []
        var graph_data = []
        graph_info_in.forEach(element => {
            graph_item_code.push(element.ITEM_CODE)
            graph_data.push(element.TOTAL_UNIT)
            graph_item_name.push(element.ITEM_NAME)
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: graph_item_name,
                datasets: [{
                    label: 'Unit Sold',
                    data: graph_data,
                    borderWidth: 2,
                    backgroundColor: graf_color,
                    borderColor: graf_color,
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        title: function(tooltipItem, graphData) {
                            return graphData.labels[tooltipItem[0].index];
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Number of Item (unit)',
                            fontFamily: "Poppins"

                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 20,
                            fontColor: "#9aa0ac", // Font Color
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Item Name',
                            fontFamily: "Poppins"

                        },
                        ticks: {
                            display: true,
                            callback: function(value, index, ticks) {
                                return graph_item_code[index];
                            },
                            fontColor: "#9aa0ac", // Font Color
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    }

    function set_year_graf(graf_info_ptj, graf_info_staf) {

        document.getElementById("line-chart3").remove() // this is my <canvas> element
        $('#year_purchase_graf').append('<canvas id="line-chart3"><canvas>');
        var ctx = document.getElementById("line-chart3").getContext('2d');

        var graph_purchase_month = []
        var graph_data_ptj = []
        var graph_data_staf = []

        graf_info_ptj.forEach((element, index) => {
            graph_purchase_month.push(month_arr[element.MONTH - 1])
            graph_data_ptj.push(element.TOTAL_COUNT)
            graph_data_staf.push(graf_info_staf[index].TOTAL_COUNT)
        });

        var staff_color = ctx.createLinearGradient(500, 0, 0, 0);
        var ptj_color = ctx.createLinearGradient(500, 0, 0, 0);
        staff_color_val = 'rgba(155, 89, 182, 1)';
        staff_color.addColorStop(0, staff_color_val);
        ptj_color_val = 'rgba(231, 76, 60, 1)';
        ptj_color.addColorStop(1, ptj_color_val);

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: graph_purchase_month,
                type: 'line',
                defaultFontFamily: 'Poppins',
                datasets: [{
                    label: "Staff",
                    data: graph_data_staf,
                    borderColor: staff_color,
                    pointBorderColor: staff_color,
                    pointBackgroundColor: staff_color,
                    pointHoverBackgroundColor: staff_color,
                    backgroundColor: staff_color,
                    pointHoverBorderColor: staff_color,
                    pointBorderWidth: 10,
                    pointHoverRadius: 10,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    fill: false,
                    borderWidth: 4,
                }, {
                    label: "PTJ",
                    data: graph_data_ptj,
                    borderColor: ptj_color,
                    pointBorderColor: ptj_color,
                    pointBackgroundColor: ptj_color,
                    pointHoverBackgroundColor: ptj_color,
                    backgroundColor: ptj_color,
                    pointHoverBorderColor: ptj_color,
                    pointBorderWidth: 10,
                    pointHoverRadius: 10,
                    pointHoverBorderWidth: 1,
                    pointRadius: 1,
                    fill: false,
                    borderWidth: 4,
                }]
            },
            options: {
                legend: {
                    display: false
                },

                tooltips: {
                    callbacks: {
                        labelColor: function(tooltipItem, chart) {
                            if (tooltipItem.datasetIndex === 0) {
                                return {
                                    backgroundColor: staff_color_val
                                }
                            } else {
                                return {
                                    backgroundColor: ptj_color_val
                                }
                            }
                        },
                    },

                    mode: 'index',
                    displayColors: true,
                    titleFontSize: 12,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    backgroundColor: '#000',
                    titleFontFamily: 'Poppins',
                    bodyFontFamily: 'Poppins',
                    cornerRadius: 3,
                    intersect: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "#9aa0ac", // Font Color
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Number of Bookings',
                            fontFamily: "Poppins"

                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Month',
                            fontFamily: "Poppins"

                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9aa0ac", // Font Color
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });
    }

    function set_month_option(curr_month) {
        var temp_month_val = curr_month;
        var temp_month_text = 'Month: ';

        if (!curr_month) {
            temp_month_val = 1
            temp_month_text = ''
        }

        $('#total_item_month').find('option').remove()
        $('#total_item_month').append($("<option></option>")
            .attr("disabled", true)
            .attr("selected", true)
            .attr("hidden", true)
            .attr("value", temp_month_val)
            .text(temp_month_text + month_arr[temp_month_val - 1]));

        for (let month_val = 1; month_val <= month_arr.length; month_val++) {
            if (curr_month && month_val == curr_month + 1) {
                break;
            }
            const element = month_arr[month_val];
            $('#total_item_month').append($('<option>', {
                value: month_val,
                text: month_arr[month_val - 1]
            }));

        }
    }

    $(document).ready(function() {
        getNewOrderCount()
        //Most item
        set_item_graf(<?php echo  json_encode($total_item_out->result()); ?>, '#5cb85c')
        //Line graf
        set_year_graf(<?php echo  json_encode($total_purchase_cur_year_ptj); ?>, <?php echo  json_encode($total_purchase_cur_year_staf); ?>)
        //Set month select option
        set_month_option(<?php echo $curr_month ?>)
    });

    $('#staff_ptj_year').on('change', function() {
        //ajax goes here
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/ajax_select_invoice_by_year'); ?>",
            data: {
                input_year_invoice: this.value,
                is_ptj: 1
            },
            dataType: 'json',
            success: function(response) {
                set_year_graf(response['ptj'], response['staf'])
            },
            error: function(response) {
                alert('error here')
            }
        })
    });

    function select_total_item_out_by_month_year(input_month, input_year) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/ajax_select_total_item_out_by_month_year'); ?>",
            data: {
                input_month_item_out: input_month,
                input_year_item_out: input_year
            },
            dataType: 'json',
            success: function(response) {
                if (response.length)
                document.getElementById("no_graph").hidden = true;
                else
                document.getElementById("no_graph").removeAttribute("hidden");
                set_item_graf(response, '#5cb85c')
            },
            error: function(response) {
                alert('error here')
            }
        })
    }

    $('#total_item_month').on('change', function() {
        //ajax goes here
        var input_month = $("#total_item_month option:selected").val()
        var input_year = $("#total_item_year option:selected").val()
        select_total_item_out_by_month_year(input_month, input_year)
        // alert(input_month + '/' + input_year)

    });

    $('#total_item_year').on('change', function() {
        //ajax goes here
        var input_month = $("#total_item_month option:selected").val()
        var input_year = $("#total_item_year option:selected").val()

        select_total_item_out_by_month_year(1, input_year)
        set_month_option(0)
    });
</script>
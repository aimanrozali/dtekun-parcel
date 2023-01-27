<section>
  <div class="col-12">
    <div class="col-6 m-auto alert alert-info alert-has-icon">
      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      <div class="alert-body">
        <div class="alert-title">Welcome to D'Tekun Parcel </div>
        Please enter your tracking number to see your parcel status.
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-body">
        <form action="">
          <div class="form-group">
            <div class="col-6 m-auto input-group mb-3">
              <input type="text" class="form-control" placeholder="Enter tracking number" name="trackingNum" required>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </div>
          </div>
        </form>

        <?php $i = 1;

        if ($search != 1) { ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center"> Tracking Number </th>
                  <th class="text-center"> Customer Name</th>
                  <th class="text-center"> Courier Type</th>
                  <th class="text-center"> Date Arrived</th>
                  <th class="text-center"> Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($search as $row) { ?>
                  <tr>
                    <!-- Tracking Number -->
                    <td class="text-center">
                      <?php echo $row->tracking_number; ?>
                    </td>
                    <!-- Customer name -->
                    <td class="text-center">
                      <?php echo $row->parcel_name; ?>
                    </td>
                    <!-- Courier type -->
                    <td class="text-center">
                      <?php echo $row->parcel_courier; ?>
                    </td>
                    <!-- Date arrived -->
                    <td class="text-center">
                      <?php echo $row->date_arrived; ?>
                    </td>
                    <!-- Parcel status -->
                    <td class="text-center">
                      <?php if ($row->parcel_status == '1') { ?>
                        <span class="badge badge-success parcel_status" ?>Claimed</span>
                      <?php } else { ?>
                        <span class="badge badge-warning parcel_status">Arrived</span>
                      <?php } ?>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        <?php } ?>
      <?php } elseif ($search == 1) { ?>
        <table class="m-auto">
          <thead>
            <tr>
               <!-- Parcel not in database -->
              <?php if ($empty == 2) { ?>
                <th class="text-center"></th>
              <?php } else { ?>
                <th class="text-center"> Parcel cannot be found </th>
              <?php } ?>
            </tr>
          </thead>
        </table>
      <?php } ?>
      
      </div>    
    </div>
  </div>
  </div>
  </div>

  <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="bootstrap snippet">
                      <section id="portfolio" class="gray-bg padding-top-bottom">
                        <div class="projects-container scrollimation in">
                          <div class="row">
                            <article class="col-md-4 col-sm-6 portfolio-item web-design apps psd">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center img-box" src="<?php echo base_url(); ?>assets/img/parcel-1.jpeg" alt="Parcel 1">
                                  <span class="project-title">How to claim your parcel</span>
                                  <span class="overlay-mask"></span>
                                </a>
                                <a class="enlarge cboxElement" href="#" title="Bills Project"><i
                                    class="fa fa-expand fa-fw"></i></a>
                                <a class="link" href="#"><i class="fa fa-eye fa-fw"></i></a>
                              </div>
                            </article>
                            <article class="col-md-4 col-sm-6 portfolio-item apps">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center img-box" src="<?php echo base_url(); ?>assets/img/parcel-2.jpeg" alt="Parcel 2">
                                  <span class="project-title">Customer alert!</span>
                                  <span class="overlay-mask"></span>
                                </a>
                                <a class="link centered" href="#"><i class="fa fa-eye fa-fw"></i></a>
                              </div>
                            </article>
                            <article class="col-md-4 col-sm-6 portfolio-item web-design psd">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center img-box" src="<?php echo base_url(); ?>assets/img/parcel-3.jpeg" alt="Parcel 3">
                                  <span class="project-title">Price list</span>
                                  <span class="overlay-mask"></span>
                                </a>
                                <a class="enlarge centered cboxElement" href="#" title="Get Colored"><i
                                    class="fa fa-expand fa-fw"></i></a>
                              </div>
                            </article>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


</section>

<style>
.img-box {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

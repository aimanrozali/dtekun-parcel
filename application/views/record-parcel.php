<section>


  <form class="section" method="post" action="<?=base_url()?>Parcel/data_insert"> 
  <div class="section-body">

<!--Success Alert when Data Inserted-->
  <?php if($this->session->flashdata('status')):?>
          <div class= "alert alert-success">
            <?= $this->session->flashdata('status');?>
        </div>
        <?php endif;?>

    <div class="card">
      <div class="card-header">
       <h4>Insert Parcel Details</h4>
      </div>
      <!--Input tagging number-->
      <div class="card-body">
      <div class="form-group row"> 
          <label for="inputTagNum" class="col-sm-3 col-form-label">Tagging Number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputTagNum" name= "parcelTag" placeholder="e.g. B3581" required>
          </div>
        </div>
      <!--Input tracking number-->
        <div class="form-group row">
          <label for="inputTrackNum" class="col-sm-3 col-form-label">Tracking Number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputTrackNum" name= "trackingNum" placeholder="Enter tracking number" required>
          </div>
        </div>
        <!--Input custName-->
        <div class="form-group row">
          <label for="inputCust" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputCust" name= "custName" placeholder="Enter Customer Name" required>
          </div>
        </div>
        <!--Input phoneNum-->
        <div class="form-group row">
          <label for="inputPhone" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPhone" name= "phoneNum" placeholder="Enter phone number" required>
          </div>
        </div>
        <!--Choose courier-->
        <fieldset class="form-group">
          <div class="row">
            <div class="col-form-label col-sm-3 pt-0">Courier</div>
            <div class="col-sm-9">
              <div class="form-group">
                <select class="form-control" name= courier required>
                  <option>Choose courier</option>
                  <option>J&T Express</option>
                  <option>Shopee Express</option>
                  <option>DHL</option>
                  <option>Pgeon</option>
                </select>
              </div>
            </div>
        </fieldset>
        <!--Select size-->
        <div class="form-group row">
          <div class="col-sm-3">Parcel Size</div>
          <div class="col-sm-9">
            <div class="form-group" name = "size" >
              <div class="form-check form-check-inline" >
                <input class="form-check-input" type="radio" id="small" value="S" name="size" required>
                <label class="form-check-label" for="small">Small</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="medium" value="M" name="size">
                <label class="form-check-label" for="medium">Medium</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="large" value="L" name="size">
                <label class="form-check-label" for="large">Large</label>
              </div>
            </div>
          </div>
        </div>
        <!--Submit form-->
        <button class="btn btn-primary float-right" type="submit" name="submit">Save</button>
        </form>
      </div>

</section>
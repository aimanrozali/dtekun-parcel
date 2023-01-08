<section class="section">
  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Insert Parcel Details</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Tracking Number</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Enter tracking number">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Phone Number</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Enter phone number">
          </div>
        </div>
        <fieldset class="form-group">
          <div class="row">
            <div class="col-form-label col-sm-3 pt-0">Courier</div>
            <div class="col-sm-9">
              <div class="form-group">
                <select class="form-control">
                  <option>Choose courier</option>
                  <option>J&T Express</option>
                  <option>Shopee Express</option>
                  <option>DHL</option>
                  <option>Pgeon</option>
                </select>
              </div>
            </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-3">Parcel Size</div>
          <div class="col-sm-9">
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="small" value="small" name="size">
                <label class="form-check-label" for="small">Small</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="medium" value="medium" name="size">
                <label class="form-check-label" for="medium">Medium</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="large" value="large" name="size">
                <label class="form-check-label" for="large">Large</label>
              </div>
            </div>
          </div>
        </div>

        <button class="btn btn-primary float-right">Save</button>
      </div>
</section>
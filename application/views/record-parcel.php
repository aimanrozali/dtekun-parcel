<section>

    <div class="card">
                <div class="card-header">
                    <h4>Parcel Information</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputTagNum">Tagging number</label>
                        <input type="text" class="form-control" id="inputTagNum" placeholder="e.g. #12345">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputTrackNum">Tracking number</label>
                        <input type="text" class="form-control" id="inputTrackNum" placeholder="Enter tracking no.">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputCust">Customer Name</label>
                        <input type="text" class="form-control" id="inputCust" placeholder="Enter customer name">
                      </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label>Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" placeholder="e.g. 0123456789">
                      </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputCourier">Courier Type</label>
                        <select id="inputCourier" class="form-control">
                          <option selected>Choose...</option>
                          <option>J&T Express</option>
                          <option>Pos Laju</option>
                          <option>Shopee Express</option>
                          <option>DHL Express</option>
                          <option>Citylink</option>
                          <option>GDex</option>
                          <option>Skynet Express</option>
                        </select>
                      </div>
                    <div class="form-group col-md-4">
                        <label for="inputStatus">Parcel Status</label>
                        <select id="inputStatus" class="form-control">
                          <option selected>Choose...</option>
                          <option>Arrived</option>
                          <option>Claimed</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                      <label>Date Arrived</label>
                      <input type="date" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Date Claimed</label>
                      <input type="date" class="form-control">
                    </div>
                    </div>
                    <div class="form-group mb-0">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>
                  </div>
                </div>

    </div>
</section>
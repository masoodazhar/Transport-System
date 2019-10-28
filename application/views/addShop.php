
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Shop</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>shop/shop_validation">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Shop Name</label>
                    <input type="text" class="form-control" name="tsname">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Retailer Name</label>
                    <input type="text" class="form-control" name="tsrname">
                  </div>
                </div>
                </div>

               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Contact Number</label>
                    <input type="text" class="form-control" name="tscontact">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="tsaddress">
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                   <select class="selectpicker"  data-style="select-with-transition" title="Shop Type" data-size="5" tabindex="-98" name="tstype">
                      <option value="tyre">Tyre</option>
                      <option value="oil">Oil</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                    <textarea class="form-control" name="tsdescription"></textarea>
                  </div>
                </div>
              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addshop" data-dismiss="modal">
                <input type="reset" class="btn btn-danger btn-round"  data-dismiss="modal">
              </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

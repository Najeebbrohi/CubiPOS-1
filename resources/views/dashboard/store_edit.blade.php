  @extends('dashboard.layout.master')
  @section('content')
      <section id="content">
          <div class="container">
              <div class="block-header">
                  <h2>Form Components</h2>

                  <ul class="actions">
                      <li>
                          <a href="#">
                              <i class="md md-trending-up"></i>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <i class="md md-done-all"></i>
                          </a>
                      </li>
                      <li class="dropdown">
                          <a href="#" data-toggle="dropdown">
                              <i class="md md-more-vert"></i>
                          </a>

                          <ul class="dropdown-menu dropdown-menu-right">
                              <li>
                                  <a href="#">Refresh</a>
                              </li>
                              <li>
                                  <a href="#">Manage Widgets</a>
                              </li>
                              <li>
                                  <a href="#">Widgets Settings</a>
                              </li>
                          </ul>
                      </li>
                  </ul>

              </div>

              <div class="card">
                  <div class="card-header">
                      <h2>Add Store</h2>
                  </div>

                  <form action="{{ url('store_update') }}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="card-body card-padding">
                          <div class="row">
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Name</label>
                                      <input type="hidden" name="id" value="{{ $store->id }}"
                                          class="form-control input-mask" placeholder="Name">

                                      <input type="text" name="name" value="{{ $store->name }}"
                                          class="form-control input-mask" placeholder="Name">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Code</label>
                                      <input type="text" name="code" value="{{ $store->code }}"
                                          class="form-control input-mask" placeholder="Code">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Email Address</label>
                                      <input type="email" name="email" value="{{ $store->email }}"
                                          class="form-control input-mask" placeholder="Email Address">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Phone</label>
                                      <input type="text" name="phone" value="{{ $store->phone }}"
                                          class="form-control input-mask" placeholder="Phone">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Address Line 1</label>
                                      <input type="text" name="address_line1" value="{{ $store->address_line1 }}"
                                          class="form-control input-mask" placeholder="Address Line 1">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Address Line 2</label>
                                      <input type="text" name="address_line2" value="{{ $store->address_line2 }}"
                                          class="form-control input-mask" placeholder="Address Line 2">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>City</label>
                                      <input type="text" name="city" value="{{ $store->city }}"
                                          class="form-control input-mask" placeholder="City">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>State</label>
                                      <input type="text" name="state" value="{{ $store->state }}"
                                          class="form-control input-mask" placeholder="State">
                                  </div>
                              </div>
                          </div>
                          <div class="row">

                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Postal Code</label>
                                      <input type="text" name="postal_code" value="{{ $store->postal_code }}"
                                          class="form-control input-mask" placeholder="Postal Code">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Country</label>
                                      <input type="text" name="country" value="{{ $store->country }}"
                                          class="form-control input-mask" placeholder="Country">
                                  </div>
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6 m-b-20">
                                  <div class="form-group fg-line">
                                      <label>Receipt Header</label>
                                      <input type="text" name="receipt_header" value="{{ $store->receipt_header }}"
                                          class="form-control input-mask" placeholder="Receipt Header">
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                  <p class="f-500 c-black m-b-20">Image</p>
                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                      <div>
                                          <span class="btn btn-info btn-file">
                                              <span class="fileinput-new">Select image</span>
                                              <span class="fileinput-exists">Change</span>
                                              <input type="file" name="image">
                                          </span>
                                          <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          @if ($store->image != '')
                                              <img style="width: 150px;" class="avatar-img rounded-circle" src="{{ asset('storage') }}/{{ $store->image ?? '' }}"> </td>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                  <button class="btn btn-primary">Update Store</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>
  @endsection

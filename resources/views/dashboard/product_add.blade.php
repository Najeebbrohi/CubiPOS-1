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
                <form action="{{ url('product_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h2>Add Product</h2>
                    </div>
                    <div class="card-body card-padding">
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Type</label>
                                    <select class="selectpicker form-control" name="type">
                                        <option>Standard</option>
                                        <option>Combo</option>
                                        <option>Service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control input-mask" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Code - <small>you can use product barcode as code</small></label>
                                    <input type="text" name="code" class="form-control input-mask" placeholder="Code">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Barcode Symbology</label>
                                    <select class="selectpicker form-control" name="bar_code_symbol">
                                        <option>C128</option>
                                        <option>C39</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Categories</label>
                                    <select class="selectpicker form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Cost</label>
                                    <input type="text" name="cost" class="form-control input-mask" placeholder="Cost">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control input-mask" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Product Tax - <small>Percentage without % sign</small></label>
                                    <input type="number" name="product_tax" class="form-control input-mask" placeholder="Product Tax">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Tax Mathod</label>
                                    <select class="selectpicker form-control" name="tax_method">
                                        <option>Inclusive</option>
                                        <option>Exclusive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control input-mask" placeholder="Quantity">
                                </div>
                            </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 m-b-20">
                                <div class="card-body">
                                    <p class="f-500 c-black m-b-20">Details</p>
                                    <textarea class="html-editor" name="details"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                <button class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

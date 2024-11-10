@extends('dashboard.layout.master')
@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Edit Product</h2>
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
                <form action="{{ url('product_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}" class="form-control input-mask"
                        placeholder="Name">
                    <div class="card-header">
                        <h2>Edit Product</h2>
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
                                    <input type="text" name="name" value="{{ $product->name }}"
                                        class="form-control input-mask" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Code - <small>you can use product barcode as code</small></label>
                                    <input type="text" name="code" value="{{ $product->code }}"
                                        class="form-control input-mask" placeholder="Code">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Barcode Symbology</label>
                                    <select class="selectpicker form-control" name="bar_code_symbol">
                                        <option>Code25</option>
                                        <option>Code39</option>
                                        <option>Code128</option>
                                        <option>EAN8</option>
                                        <option>EAN13</option>
                                        <option>UPC-A</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Cost</label>
                                    <input type="text" name="cost" value="{{ $product->cost }}"
                                        class="form-control input-mask" placeholder="Cost">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Price</label>
                                    <input type="text" name="price" name="cost" value="{{ $product->price }}"
                                        class="form-control input-mask" placeholder="Price">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Product Tax - <small>Percentage without % sign</small></label>
                                    <input type="text" name="product_tax" name="cost"
                                        value="{{ $product->product_tax }}" class="form-control input-mask"
                                        placeholder="Product Tax">
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
                                    <input type="text" name="quantity" value="{{ $product->quantity }}"
                                        class="form-control input-mask" placeholder="Quantity">
                                </div>
                            </div>
                            @if ($product->image != '')
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <p class="f-500 c-black m-b-20">Image</p>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('storage') }}/{{ $product->image ?? '' }}">
                                        </div>
                                    </div>
                            @endif
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
                    <!-- <div class="html-editor"></div> -->
                    <textarea class="html-editor" name="details">{!! html_entity_decode($product->details ?? '') !!}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                <button class="btn btn-success">Update Product</button>
            </div>
        </div>
    </section>
@endsection

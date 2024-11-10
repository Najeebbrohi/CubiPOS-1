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
                    <h2>Add Category</h2>
                </div>
                <form action="{{ url('category_store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body card-padding">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control input-mask" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 m-b-20">
                                <div class="form-group fg-line">
                                    <label>Code - <small>you can use category barcode as code</small></label>
                                    <input type="text" name="code" class="form-control input-mask" placeholder="Code">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 m-b-20">
                                <p class="f-500 c-black m-b-20">Image</p>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                    <div>
                                        <span class="btn btn-info btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image">
                                        </span>
                                        <a href="#" class="btn btn-danger fileinput-exists"
                                            data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                <button class="btn btn-primary">Add Category</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

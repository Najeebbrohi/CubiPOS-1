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
                        <form action="{{url('category_update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}" class="form-control input-mask" placeholder="Name">

                        <div class="card-body card-padding">
                            <div class="row"> 
                                <div class="col-sm-12 col-md-4 col-lg-4 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$category->name}}"  class="form-control input-mask" placeholder="Name">
                                    </div>
                                </div> 
                                <div class="col-sm-12 col-md-4 col-lg-4 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Code - <small>you can use category barcode as code</small></label>
                                        <input type="text" name="code" value="{{$category->code}}" class="form-control input-mask" placeholder="Code">
                                    </div>
                                </div> 
                                @if($category->image !='')
                            <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                <p class="f-500 c-black m-b-20">Image</p>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"> 
                                    <img  class="avatar-img rounded-circle" src="{{asset('storage')}}/{{$category->image ?? '' }}">
                                    </div>
                                    <div>
                                
                                             <div>
                                                
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
                                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                    <button class="btn btn-primary">Update Category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endsection
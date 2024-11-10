
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
                            <h2>Add Customer</h2>
                        </div>
                        <form action="{{url('customer_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body card-padding">
                            <div class="row"> 
                               
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control input-mask" placeholder="Name">
                                    </div>
                                </div> 
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Email Address</label>
                                        <input type="text" name="email" class="form-control input-mask" placeholder="Email Address">
                                    </div>
                                </div> 
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Phone</label>
                                        <input type="text" name="phone" phone="phone" class="form-control input-mask" placeholder="Phone">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                    <button class="btn btn-primary">Add Customer</button>
                                </div>
                            </div>
                        </div>
</from>
                    </div>
                </div>
            </section
            @endsection
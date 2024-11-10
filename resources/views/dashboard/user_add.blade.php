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
                            <h2>Add User</h2>
                        </div>
                        <form action="{{url('user_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body card-padding">
                            <div class="row"> 
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Role</label>
                                        <select class="selectpicker" name="role">
                                            <option value="admin">Admin</option>
                                            <option value="staff">Staff</option>
                                        </select>
                                    </div>  
                                </div>   
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>First Name</label>
                                        <input type="text" name="fname" class="form-control input-mask" placeholder="First Name">
                                    </div>
                                </div> 
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" class="form-control input-mask" placeholder="Last Name">
                                    </div>
                                </div> 
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control input-mask" placeholder="Phone">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Gender</label>
                                        <select name="gender" class="selectpicker">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>  
                                </div>  
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control input-mask" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control input-mask" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control input-mask" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control input-mask" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20">
                                    <div class="form-group fg-line">
                                        <label>Active</label>
                                        <select name="status" class="selectpicker">
                                            <option value="active">Active</option>
                                            <option value="unactive" >Unactive</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3 m-b-20"></div>
                                    <div class="form-group fg-line">
                                        <div class="toggle-switch" data-ts-color="green">
                                            <label for="ts4" class="ts-label">Notify User by Email</label>
                                            <input id="ts4" type="checkbox" hidden="hidden">
                                            <label for="ts4" class="ts-helper"></label>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: end;">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
</form>
                    </div>
                </div>
            </section>
            @endsection
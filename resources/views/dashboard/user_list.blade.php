@extends('dashboard.layout.master')
@section('content')
<section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Users list</h2>
                        
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
                            <h2>Users List <small></small></h2>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="data-table-selection" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                                        <th data-column-id="last_name">First Name</th>
                                        <th data-column-id="first_name">Last Name</th>
                                        <th data-column-id="email">Email</th>
                                        <th data-column-id="role">Role</th>
                                        <th data-column-id="store">Store</th>
                                        <th data-column-id="status">Status</th>
                                        <th data-column-id="actions" data-order="desc">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role}}</td>
                                        <td>POS</td>
                                        <td> @if($item->status =='active') <button class="btn btn-success btn-sm">active</button>
                                    
                                             @else
                                             <button class="btn btn-danger btn-sm">Unactive</button>

                                             @endif
                                    
                                    </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button> |
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            @endsection
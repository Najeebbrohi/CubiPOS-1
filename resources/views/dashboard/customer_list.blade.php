@extends('dashboard.layout.master')
@section('content')
<section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Customers List</h2>
                        
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
                            <h2>Customers List <small></small></h2>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="data-table-selection" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                                        <th data-column-id="name">Name</th>
                                        <th data-column-id="phone">Phone</th>
                                        <th data-column-id="email">Email</th>
                                        <th data-column-id="action" data-order="desc">Actiond</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->email}}</td>
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
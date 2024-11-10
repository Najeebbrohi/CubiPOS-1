

@extends('dashboard.layout.master')
@section('content')
<section id="content">
            <div class="container">
                <div class="block-header">
                    <h2>Products List</h2>

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
                        <h2>Products List <small></small></h2>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table-selection" class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                                    <th data-column-id="image">Image</th>
                                    <th data-column-id="code">Code</th>
                                    <th data-column-id="name">Name</th>
                                    <th data-column-id="type">Type</th>
                                    <th data-column-id="category">Category</th>
                                    <th data-column-id="quantity">Quantity</th>
                                    <th data-column-id="tax">Tax</th>
                                    <th data-column-id="method">Method</th>
                                    <th data-column-id="cost">Cost</th>
                                    <th data-column-id="price">Price</th>
                                    <th data-column-id="actions" data-order="desc">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td> <img style="width: 150px;" class="avatar-img rounded-circle" src="{{asset('storage')}}/{{$item->image ?? '' }}"> </td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->category->name??''}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->product_tax}}</td>
                                    <td>{{$item->tax_method}}</td>
                                    <td>{{$item->cost}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                    <a href="{{url('product_edit')}}/{{$item->id}}"><button class="btn btn-primary btn-sm">Edit</button> |</a>
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
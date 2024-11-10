@extends('dashboard.layout.master')
@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2 style="text-align:left;">Categories list</h2>

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
                    <h2 class="heading-text">Categories List </h2>
                    <a href="{{ url('category_add') }}" class="btn btn-success Btn-Float-End">Add Categories</a>
                </div>

                <div class="table-responsive">
                    <table id="data-table-selection" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                                <th data-column-id="image">Image</th>
                                <th data-column-id="name">Name</th>
                                <th data-column-id="code">Code</th>
                                <th data-column-id="action" data-order="desc">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td> <img style="width: 150px;" class="avatar-img rounded-circle"
                                            src="{{ asset('storage') }}/{{ $item->image ?? '' }}"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>

                                    <td>
                                        <a href="{{ url('category_edit') }}/{{ $item->id }}"> <button
                                                class="btn btn-primary btn-sm">Edit</button></a> |
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

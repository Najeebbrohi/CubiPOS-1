@extends('dashboard.layout.master')
@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2 style="text-align:left;">Stores List</h2>
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
                    <h2 class="heading-text">Stores List </h2>
                    <a href="{{ url('store_add') }}" class="btn btn-success Btn-Float-End">Add Store</a> 
                </div>

                <div class="table-responsive">
                    <table id="data-table-selection" class="table table-striped">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                                <th data-column-id="name">Name</th>
                                <th data-column-id="code">Code</th>
                                <th data-column-id="phone">Phone</th>
                                <th data-column-id="email">Email</th>
                                <th data-column-id="address">Address</th>
                                <th data-column-id="city">City</th>
                                <th data-column-id="action" data-order="desc">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($stores->isNotEmpty())
                                @foreach ($stores as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address_line1 }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>
                                        <button class="btn btn-icon command-edit"><i class="md md-remove-red-eye"></i></button> |
                                        <a href="{{ url('store_edit') }}/{{ $item->id }}" style="color:#777;"> 
                                            <button class="btn btn-icon command-edit"> <i class="md md-edit"> </i></button> 
                                        </a> |
                                        <button class="btn btn-icon command-delete" href="{{ url('delete_store') }}/{{ $item->id }}" id="delete"><i class="md md-delete"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                           @else
                                <tr>
                                    <td colspan="8" class="text-center">No data available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
<script>
    $(document).on('click', '#delete', function(event) {
        event.preventDefault();
        var deleteUrl = $(this).attr('href');
        // Show a confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Navigate to the delete URL
                window.location.href = deleteUrl;
            }
        });
    })
</script>
@endpush

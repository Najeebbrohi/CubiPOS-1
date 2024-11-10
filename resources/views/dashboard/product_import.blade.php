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
            <form action="{{url('product_import_process')}}" method="post" class="form-control" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <input type="file" class="form-control" name="import_product">
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Import</button>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection
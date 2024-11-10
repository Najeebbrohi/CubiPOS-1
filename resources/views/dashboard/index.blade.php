@extends('dashboard.layout.master')
@section('content')
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2 style="text-align:left;">Dashboard</h2>
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
                    <h2>Sales Statistics <small>Vestibulum purus quam scelerisque, mollis nonummy metus</small></h2>
                    <ul class="actions">
                        <li>
                            <a href="#">
                                <i class="md md-cached"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="md md-file-download"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="md md-more-vert"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#">Change Date Range</a>
                                </li>
                                <li>
                                    <a href="#">Change Graph Type</a>
                                </li>
                                <li>
                                    <a href="#">Other Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="chart-edge">
                        <div id="curved-line-chart" class="flot-chart "></div>
                    </div>
                </div>
            </div>

            <div class="mini-charts">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-cyan">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small>Products</small>
                                    <h2>987,459</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-lightgreen">
                            <div class="clearfix">
                                <div class="chart stats-bar-2"></div>
                                <div class="count">
                                    <small>Categories</small>
                                    <h2>356,785K</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-orange">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small>Users</small>
                                    <h2>$ 458,778</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small>Customers</small>
                                    <h2>23,856</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- Calendar -->
                    <div id="calendar-widget"></div>
                </div>

                <div class="col-sm-6">
                    <!-- Recent Items -->
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Items <small>Phasellus condimentum ipsum id auctor imperdie</small></h2>
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="md md-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Refresh</a>
                                        </li>
                                        <li>
                                            <a href="#">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#">Other Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body m-t-0">
                            <table class="table table-inner table-vmiddle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width: 60px">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="f-500 c-cyan">2569</td>
                                        <td>Samsung Galaxy Mega</td>
                                        <td class="f-500 c-cyan">$521</td>
                                    </tr>
                                    <tr>
                                        <td class="f-500 c-cyan">9658</td>
                                        <td>Huawei Ascend P6</td>
                                        <td class="f-500 c-cyan">$440</td>
                                    </tr>
                                    <tr>
                                        <td class="f-500 c-cyan">1101</td>
                                        <td>HTC One M8</td>
                                        <td class="f-500 c-cyan">$680</td>
                                    </tr>
                                    <tr>
                                        <td class="f-500 c-cyan">6598</td>
                                        <td>Samsung Galaxy Alpha</td>
                                        <td class="f-500 c-cyan">$870</td>
                                    </tr>
                                    <tr>
                                        <td class="f-500 c-cyan">4562</td>
                                        <td>LG G3</td>
                                        <td class="f-500 c-cyan">$690</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="recent-items-chart" class="flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

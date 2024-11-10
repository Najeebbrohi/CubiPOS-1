@inject('DNS1D', 'Milon\Barcode\Facades\DNS1DFacade')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS</title>
    <!-- Vendor CSS -->
    <link href="{{ asset('public/dashboard') }}/vendors/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="{{ asset('public/dashboard') }}/vendors/animate-css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('public/dashboard') }}/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
    <link href="{{ asset('public/dashboard') }}/vendors/summernote/summernote.css" rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('public/dashboard') }}/css/app.min.css" rel="stylesheet">
    <link href="{{ asset('public/dashboard') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('public/dashboard') }}/css/custom-style.css" rel="stylesheet">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printArea,
            #printArea * {
                visibility: visible;
            }
            #printArea {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <header id="header">
        <ul class="header-inner">
            <li id="menu-trigger" data-trigger="#sidebar">
                <div class="line-wrap">
                    <div class="line top"></div>
                    <div class="line center"></div>
                    <div class="line bottom"></div>
                </div>
            </li>

            <li class="logo hidden-xs">
                <a href="{{ url('admin_dashboard') }}">Material Admin</a>
            </li>

            <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li id="top-search">
                        <a class="tm-search" href="#"></a>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-notification" href="#"><i
                                class="tmn-counts">9</i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">
                                <div class="lv-header">
                                    Notification
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-clear="notification">
                                                <i class="md md-done-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lv-body c-overflow">
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img//profile-pics/1.jpg">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">David Belle</div>
                                                <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img//profile-pics/2.jpg">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Jonathan Morris</div>
                                                <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img//profile-pics/3.jpg">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                                <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img//profile-pics/4.jpg">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Glenn Jecobs</div>
                                                <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc
                                                    sit
                                                    amet varius dignissim, dui est consectetur neque</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/4.jpg">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Bill Phillips</div>
                                                <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a class="lv-footer" href="#">View Previous</a>
                            </div>
                        </div>
                    </li>
                   
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li>
                                <a data-action="fullscreen" href="#">
                                    <i class="md md-fullscreen"></i> Toggle Fullscreen
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Top Search Content -->
        <div id="top-search-wrap">
            <input type="text">
            <i id="top-search-close">&times;</i>
        </div>
    </header>

    <section id="main">
        <aside id="sidebar">
            <div class="sidebar-inner">
                <div class="si-inner">
                    <div class="profile-menu">
                        <a href="#">
                            <div class="profile-pic">
                                <img src="{{ asset('public/dashboard') }}/img/profile-pics/1.jpg" alt="">
                            </div>

                            <div class="profile-info"> Malinda Hollaway
                                <i class="md md-arrow-drop-down"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="#"><i class="md md-person"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="md md-settings-input-antenna"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="md md-settings"></i> Settings</a>
                            </li>
                            <li>
                                <a href="{{ url('logout') }}"><i class="md md-history"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li class="active">
                            <a href="{{ url('admin_dashboard') }}"><i class="md md-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ url('store_list') }}"><i class="md md-store"></i> Stores</a>
                        </li>
                        <li>
                            <a href="{{ url('pos') }}"><i class="md md-web"></i> POS</a>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="md md-view-list"></i> Categories</a>
                            <ul>
                                <li><a href="{{ url('category_list') }}">List Categories</a></li>
                                <li><a href="{{ url('category_add') }}">Add Category</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="md md-add-box"></i> Products</a>
                            <ul>
                                <li><a href="{{ url('product_list') }}">List Products</a></li>
                                <li><a href="{{ url('product_add') }}">Add Product</a></li>
                                <li><a href="{{ url('product_import') }}">Import Porducts</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#myModalBarcode">Print Barcodes</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="md md-person"></i> People</a>
                            <ul>
                                <li><a href="{{ url('user_list') }}">List Users</a></li>
                                <li><a href="{{ url('user_add') }}">Add User</a></li>
                                <li><a href="{{ url('customer_list') }}">List Customers</a></li>
                                <li><a href="{{ url('customer_add') }}">Add Customer</a></li>
                                <li><a href="supplier_list.html">List Suppliers</a></li>
                                <li><a href="supplier_add.html">Add Supplier</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="md md-settings"></i> Settings</a>
                            <ul>
                                <li><a href="{{ url('settings') }}">Settings</a></li>
                                <li><a href="store_add.html">Add Store</a></li>
                                <li><a href="store_list.html">Stores</a></li>
                                <li><a href="#">Printers</a></li>
                                <li><a href="#">Add Printer</a></li>
                                <li><a href="#">Backups</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="md md-report"></i> Reports</a>
                            <ul>
                                <li><a href="{{ url('daily_report') }}">Daily Sales</a></li>
                                <li><a href="{{ url('monthly_report') }}">Monthly Sales</a></li>
                                <li><a href="{{ url('sales_report') }}">Sales Report</a></li>
                                <li><a href="#">Payment Report</a></li>
                                <li><a href="#">Registers Report</a></li>
                                <li><a href="#">Top Products</a></li>
                                <li><a href="#">Products Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <aside id="chat">
            <ul class="tab-nav tn-justified" role="tablist">
                <li role="presentation" class="active"><a href="#friends" aria-controls="friends" role="tab"
                        data-toggle="tab">Friends</a></li>
                <li role="presentation"><a href="#online" aria-controls="online" role="tab"
                        data-toggle="tab">Online
                        Now</a></li>
            </ul>

            <div class="chat-search">
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Search People">
                </div>
            </div>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="friends">
                    <div class="listview">
                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/2.jpg">
                                    <i class="chat-status-busy"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Jonathan Morris</div>
                                    <small class="lv-small">Available</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/1.jpg">
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">David Belle</div>
                                    <small class="lv-small">Last seen 3 hours ago</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/3.jpg">
                                    <i class="chat-status-online"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Fredric Mitchell Jr.</div>
                                    <small class="lv-small">Availble</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/4.jpg">
                                    <i class="chat-status-online"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Glenn Jecobs</div>
                                    <small class="lv-small">Availble</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/5.jpg">
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Bill Phillips</div>
                                    <small class="lv-small">Last seen 3 days ago</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/6.jpg">
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Wendy Mitchell</div>
                                    <small class="lv-small">Last seen 2 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/7.jpg">
                                    <i class="chat-status-busy"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Teena Bell Ann</div>
                                    <small class="lv-small">Busy</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="online">
                    <div class="listview">
                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/2.jpg">
                                    <i class="chat-status-busy"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Jonathan Morris</div>
                                    <small class="lv-small">Available</small>
                                </div>
                            </div>
                        </a>
                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/3.jpg">
                                    <i class="chat-status-online"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Fredric Mitchell Jr.</div>
                                    <small class="lv-small">Availble</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('public/dashboard') }}/img/profile-pics/4.jpg">
                                    <i class="chat-status-online"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Glenn Jecobs</div>
                                    <small class="lv-small">Availble</small>
                                </div>
                            </div>
                        </a>

                        <a class="lv-item" href="#">
                            <div class="media">
                                <div class="pull-left p-relative">
                                    <img class="lv-img-sm" src="{{ asset('dashboard') }}/img/profile-pics/7.jpg"
                                        alt="">
                                    <i class="chat-status-busy"></i>
                                </div>
                                <div class="media-body">
                                    <div class="lv-title">Teena Bell Ann</div>
                                    <small class="lv-small">Busy</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </aside>
        @yield('content')

    </section>

    <div id="myModalBarcode" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Products Barcode</h4>
                </div>
                <div class="modal-body">
                    <div id="printArea">
                        <div class="row">
                            @foreach ($products as $item)
                                <div class="col-sm-4">
                                    <h2>Simple POS</h2>
                                    <label>{{ $item->name ?? '' }}</label>
                                    <br>
                                    <label>{!! DNS1D::getBarcodeHTML($item->code, $item->bar_code_symbol) !!}</label>
                                    <br>
                                    <label>Price: {{ $item->price ?? '' }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary fa fa-print" id="printButtonBarcode">Print</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Libraries -->
    <script src="{{ asset('public/dashboard') }}/js/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/flot/jquery.flot.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/flot/jquery.flot.resize.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/flot/plugins/curvedLines.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/sparklines/jquery.sparkline.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/easypiechart/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/fullcalendar/lib/moment.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/fullcalendar/fullcalendar.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/auto-size/jquery.autosize.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/waves/waves.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/sweet-alert/sweet-alert.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/flot-charts/curved-line-chart.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/flot-charts/line-chart.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/charts.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/charts.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/functions.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/summernote/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('message'))
        <script>
            Swal.fire({
                icon: '{{ session('type') }}',
                title: '{{ session('title') }}',
                text: '{{ session('message') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <script>
        // jQuery to handle print action
        $('#printButtonBarcode').click(function() {
            var printContents = $('#printArea').html(); // Get the content to print
            var originalContents = $('body').html(); // Store the original page content
            // Open a new window and write the content into it
            var printWindow = window.open('', '', 'height=800,width=800');
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            // Print the content
            printWindow.document.close(); // Close the document to ensure proper printing
            printWindow.print(); // Trigger the print dialog
            // After printing, close the print window
            printWindow.close();
        });
    </script>
@stack('js')
</body>
</html>

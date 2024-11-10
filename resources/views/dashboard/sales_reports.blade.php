@extends('dashboard.layout.master')
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2>Sale Report</h2>

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
                <h2>Sales Report<small></small></h2>
            </div>

            <div class="table-responsive">
                <table id="data-table-selection" class="table table-striped">
                    <thead>
                        <tr>
                            <th data-column-id="date">Date</th>
                            <th data-column-id="customer">Customer</th>
                            <th data-column-id="Item">Item</th>
                            <th data-column-id="total">Total</th>
                            <th data-column-id="tax">Tax</th>
                            <th data-column-id="discount">Discount</th>
                            <th data-column-id="grandtotal">Grand Total</th>
                            <th data-column-id="paid" data-order="desc">Paid By</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $items = 0;$total_amount=0; $total_tax=0; $total_discount=0;$total_final_amount=0; @endphp
                        @foreach($saleProduct as $item)
                        <tr>
                        <td>{{ $item->created_at ? $item->created_at->format('j F Y') : '' }}</td>
                        <td>Walk-in </td>

                        @php $items += $item->items; $total_amount+= $item->total_amount; $total_tax+= $item->tax_amount; $total_discount+=$item->discount;$total_final_amount+= $item->final_amount;  @endphp
                            <td>{{$item->items ??''}}</td>
                            <td>{{$item->total_amount ??''}}</td>
                            <td>{{$item->tax_amount ??''}}</td>
                            <td>{{$item->discount ??''}}</td>
                            <td>{{$item->final_amount ??''}}</td>
                            <td><button class="btn btn-success btn-sm">{{$item->paying_by ??''}}</button></td>
                            <td>
                                <button class="btn btn-info btn-sm details"  data-id="{{ $item->id }}" data-total_amount="{{ $item->total_amount }}" data-tax_amount="{{ $item->tax_amount}}" data-discount="{{ $item->discount }}" data-final_amount="{{ $item->final_amount }}" >View Details</button>
    
</td>

                        </tr>
                        @endforeach
                        <tr>
                            <th>Data</th>
                            <th>Customer</th>
                            <th>{{$items ??''}}</th>
                            <th>{{$total_amount ??''}}</th>
                            <th>{{$total_tax ??''}}</th>
                            <th>{{$total_discount ??''}}</th>
                            <th>{{$total_final_amount ??''}}</th>
                            <th>Paid By</th>
                            <th>Action</th>



                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
 <!-- Trigger the payment modal -->
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sale Report Details</h4>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection


 <script src="{{ asset('dashboard') }}/js/jquery-2.1.1.min.js"></script>

 <script>
        $(document).ready(function() {
            $(document).on('click','.details',function(){
                var id = $(this).data('id');
                var total_amount = $(this).data('total_amount');
                var tax_amount = $(this).data('tax_amount');
                var discount = $(this).data('discount');
                var final_amount = $(this).data('final_amount');
                
              $.ajax({
                url: '{{url("sale_report_details")}}' , // Replace with your actual route
                method: 'GET',
                data:{id:id,total_amount:total_amount,tax_amount:tax_amount,discount:discount,final_amount:final_amount},
                success: function(responce) {
                    

                    $('.modal-body').html(responce)
                    
                    $('#myModal').modal('show');

                }
            });

        
            });
});
</script>
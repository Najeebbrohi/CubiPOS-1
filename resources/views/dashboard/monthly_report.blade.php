<!-- monthly_report.blade.php -->


@extends('dashboard.layout.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Sales Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header { background-color: #28a745; color: white; padding: 15px; }
        .card { border: none; margin: 15px 0; }
        .card-value { font-size: 1.5em; }
        .card-blue { background-color: #17a2b8; color: white; }
        .card-orange { background-color: #ffc107; color: white; }
        .card-red { background-color: #dc3545; color: white; }
        .card-green { background-color: #28a745; color: white; }
        .monthly-table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        .monthly-table th, .monthly-table td { border: 1px solid #ddd; vertical-align: top; padding: 10px; }
        .sales-table { width: 100%; font-size: 0.9em; border-collapse: collapse; }
        .sales-table th, .sales-table td { padding: 5px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h2>Monthly Sales</h2>
            <div class="alert alert-success">Sale successfully added</div>
        </div>

        <p class="mt-4">Please review the report below</p>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-blue text-center">
                    <div class="card-body">
                        <p class="card-value">{{ number_format($GrandTotal->grand_total, 2) }}</p>
                        <p>Sales Value</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-red text-center">
                    <div class="card-body">
                        <p class="card-value">0.00</p>
                        <p>Expenses Value</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-green text-center">
                    <div class="card-body">
                        <p class="card-value">31.50</p>
                        <p>Profit and/or Loss</p>
                    </div>
                </div>
            </div>

            <!-- Additional summary cards if needed -->
        </div>

        <h4 class="text-center">{{ date('Y') }}</h4>

        <table class="table monthly-table">
            <thead>
                <tr>
                    @foreach(range(1, 12) as $month)
                        <th>{{ DateTime::createFromFormat('!m', $month)->format('F') }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach(range(1, 12) as $month)
    @php
        $monthKey = date('Y') . '-' . str_pad($month, 2, '0', STR_PAD_LEFT); // Key format "YYYY-MM"
        $data = $salesData->get($monthKey); // Retrieve data for the month
    @endphp
    <td class="month-cell">
        @if($data) <!-- Only render if data exists for the month -->
            <table class="sales-table">
            items
            <tr><td>Total Items</td><td>{{ number_format($data->items ?? 0, 2) }}</td></tr>
                <tr><td>Total Amount</td><td>{{ number_format($data->total ?? 0, 2) }}</td></tr>
                <tr><td>Order Tax</td><td>{{ number_format($data->tax_amount ?? 0, 2) }}</td></tr> 
                <tr><td>Discount</td><td>{{ number_format($data->discount ?? 0, 2) }}</td></tr>
                <tr><td>Grand Total</td><td>{{ number_format($data->grand_total ?? 0, 2) }}</td></tr>
            
            </table>
        @else
            <!-- If no data is available for the month, display "No Data" -->
           
        @endif
    </td>
@endforeach

                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection

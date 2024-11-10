

@extends('dashboard.layout.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Sales Report with Calendar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <style>
        .header { background-color: #28a745; color: white; padding: 15px; }
        .card { border: none; margin: 15px 0; }
        .card-value { font-size: 1.5em; }
        .card-blue { background-color: #17a2b8; color: white; }
        .card-orange { background-color: #ffc107; color: white; }
        .card-red { background-color: #dc3545; color: white; }
        .card-green { background-color: #28a745; color: white; }
        .calendar-table th, .calendar-table td { border: 1px solid #ddd; text-align: center; vertical-align: top;}
        .calendar-controls { display: flex; justify-content: space-between; align-items: center; }
        .breakdown-table { font-size: 0.8em; text-align: left; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h2>Daily Sales</h2>
            <div class="alert alert-success">Sale successfully added</div>
        </div>

        <p class="mt-4">Please review the report below</p>

        <div class="row">
            <div class="col-md-3">
                <div class="card card-blue text-center">
                    <div class="card-body">
                        <p class="card-value">{{$GrandToal[0]->grand_total}}</p>
                        <p>Sales Value</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-orange text-center">
                    <div class="card-body">
                        <p class="card-value">0.00</p>
                        <p>Purchase Value</p>
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
        </div>

        <div class="calendar-controls my-3">
            <button class="btn btn-primary" onclick="previousMonth()">Previous</button>
            <h4 id="monthAndYear"></h4>
            <button class="btn btn-primary" onclick="nextMonth()">Next</button>
        </div>

        <table class="table calendar-table">
            <thead>
                <tr>
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
            </thead>
            <tbody id="calendarBody">
                <!-- Calendar dates will be dynamically generated here -->
            </tbody>
        </table>
    </div>

    <script>
    let currentDate = new Date();

    function renderCalendar(date) {
        const monthAndYear = document.getElementById("monthAndYear");
        const calendarBody = document.getElementById("calendarBody");
        calendarBody.innerHTML = "";

        const month = date.getMonth();
        const year = date.getFullYear();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        monthAndYear.innerHTML = date.toLocaleDateString("en-us", { month: "long", year: "numeric" });

        let dateCount = 1;
        const salesData = @json($salesData); // assuming $salesData is a JSON object like { "2024-10-29": {...} }
        console.log(salesData);

        for (let i = 0; i < 6; i++) {
            const row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");

                if (i === 0 && j < firstDay) {
                    cell.innerHTML = "";
                } else if (dateCount > daysInMonth) {
                    cell.innerHTML = "";
                } else {
                    cell.innerHTML = `<strong>${dateCount}</strong>`;

                    // Format dateCount, month, and year to match salesData date keys
                    const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(dateCount).padStart(2, '0')}`;

                    // Check if the date exists in salesData
                    if (salesData[formattedDate]) {
                        const data = salesData[formattedDate];
                        cell.innerHTML += `
                            <table class="table table-sm breakdown-table">
                                 <tr><td>Total Items</td><td>${data.items}</td></tr>
                                <tr><td>Total Amount</td><td>${data.total}</td></tr>
                                <tr><td>Order Tax</td><td>${data.tax_amount}</td></tr>
                                <tr><td>Discount</td><td>${data.discount}</td></tr>
                                <tr><td>Grand Total</td><td>${data.grand_total}</td></tr>
                            </table>
                        `;
                    }

                    dateCount++;
                }

                row.appendChild(cell);
            }
            calendarBody.appendChild(row);
        }
    }

    function previousMonth() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    }

    function nextMonth() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    }

    document.addEventListener("DOMContentLoaded", function () {
        renderCalendar(currentDate);
    });
</script>

@endsection

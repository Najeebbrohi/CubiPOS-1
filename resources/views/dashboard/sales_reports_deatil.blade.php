<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
        .receipt-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            font-size: 24px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: right;
        }
        th {
            text-align: left;
        }
        .summary {
            text-align: right;
            padding-right: 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: gray;
        }
        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .button {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .print { background-color: #007bff; }
        .email { background-color: #28a745; }
        .close { background-color: #6c757d; }
    </style>
    
</head>
<body>

<div class="receipt-container">
    <h1>SimplePOS</h1>
    <p>Address Line 1<br>Petaling Jaya<br>012345678</p>

    <p>Date: Thu 7 Nov 2024 09:33 PM<br>
       Sale No/Ref: 2<br>
       Customer: Walk-in Client<br>
       Sales Person: Admin Admin</p>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($saleProductData as $item)
            <tr>
                <td style="text-align: left;">{{$item->product->name ?? ''}}</td>
                <td>{{$item->quantity ?? ''}}</td>
                <td>{{$item->product->price ?? ''}}</td>
                <td>{{$item->quantity * $item->product->price ?? ''}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="summary">Total</th>
                <td>{{$total_amount ?? ''}}</td>
            </tr>
            <tr>
                <th colspan="3" class="summary">Order Tax</th>
                <td>{{$tax_amount ?? ''}}</td>
            </tr>
            <tr>
                <th colspan="3" class="summary">Order Discount</th>
                <td>{{$discount ?? ''}}</td>
            </tr>
            <tr>
                <th colspan="3" class="summary"><strong>Grand Total</strong></th>
                <td><strong>{{$final_amount ?? ''}}</strong></td>
            </tr>
        </tfoot>
    </table>

    <p>Paid by: Cash &nbsp;&nbsp; {{$final_amount ?? ''}} &nbsp;&nbsp; Change: 0</p>

    <div class="footer">
        HANSOL Technologies
    </div>

    <div class="buttons">
        <button class="button print" onclick="printReceipt()">Print</button>
        <button class="button email">Email</button>
        <button class="button close">Close</button>
    </div>
</div>

</body>
</html>
<script>
        function printReceipt() {
          var printContents = $('.receipt-containe').html();
          alert(printContents);

       // Store the original page content

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
      
        }
    </script>
@extends('dashboard.layout.master') @section('content')
<section id="content">
    <div class="container">
        <!-- Customer & Product Input Section -->
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- Customer & Product Input Section -->
                <div class="row mt-3">
                    <!-- All inputs in a single row -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-control" id="customer">
                                <option selected>Walk-in Client</option>
                                <option value="1">Client 1</option>
                                <option value="2">Client 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="referenceNote" class="form-label">Reference Note</label>
                            <input type="text" class="form-control" id="referenceNote"
                                placeholder="Enter reference note">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="productSearch" class="form-label">Search Product</label>
                            <input type="text" class="form-control" id="productSearch"
                                placeholder="Search product by name or code">
                        </div>
                    </div>
                </div>
                <!-- Product List Table Container -->
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody" style="baorder">
                            <!-- Dynamic rows will be added here -->
                        </tbody>
                    </table>
                </div>
                <!-- Action Buttons (Fixed) -->
                <div class="action-buttons">
                    <!-- Discount and Tax Section -->
                    <div class="summary">
                        <div class="summary-row">
                            <label for="discount">Discount (%)</label>
                            <input type="text" id="discount" name="discount" value="0">
                        </div>
                        <div class="summary-row">
                            <label for="orderTax">Order Tax (%)</label>
                            <input type="text" id="tax" name="orderTax" value="0">
                        </div>
                    </div>

                    <div class="totals">
                        <div class="totals-row">
                            <p>Total Items: <span id="totalItems">0</span></p>
                            <p>Total: <span id="totalAmount">Rs. 0.00</span></p>
                        </div>
                        <div class="totals-row">
                            <p>Discount: <span>-Rs. 0.00</span></p>
                            <p>Tax: <span>+Rs. 0.00</span></p>
                        </div>
                    </div>
                    <button class="btn btn-warning" id="holdButton">Hold</button>
                    <button class="btn btn-primary" id="printButton">Print Bill</button>
                    {{-- <button class="btn btn-success" id="paymentButton">Payment</button> --}}
                    <button class="btn btn-success" id="paymentButton" data-toggle="modal"
                        data-target="#myModal">Payment</button>
                </div>

                <!-- Print Section -->
                <div id="printableArea" style="display:none">
                    <h4>Bill Receiptss</h4>
                    <div id="billDetails"></div>
                    <p>Total Item: <span id="printTotalItem">0.00</span></p>
                    <p>Total Amount: $<span id="printTotalAmount">0.00</span></p>
                    <p>Discount: Rs. <span id="printDiscountAmount">0.00</span></p>
                    <p>Final Total: Rs. <span id="printFinalAmount">0.00</span></p>
                    <!-- <div id="qrCodeContainer" style="margin-top: 20px;"></div> -->
                </div>
            </div>
            <!-- Product Display Section (Updated with reduced spacing) -->
            <div class="col-md-6 product-section">
                <h3 class="text-center" style="background-color: gray; color: #fff; padding: 5px;">Products</h3>
                <div class="products">
                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-lg-3 col-md-3">
                            <img src="{{ asset('storage') }}/{{ $item->image ?? '' }}" alt="{{ $item->name }}"
                                data-name="{{ $item->name }}" data-id="{{ $item->id }}" data-price="{{ $item->price }}">
                            <p style="margin:0px; text-align:center; font-size: 12px;">{{ $item->name }} -
                                {{ $item->price }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
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
                <h4 class="modal-title">Payment</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Payment Details Table -->
                        <table class="table payment-table">
                            <tr>
                                <td>Total Items</td>
                                <td id="totalItemsPayment"></td>
                                <td>Total Amount</td>
                                <td id="totalAmountPayment"></td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td id="discountPayment"></td>
                                <td>Tax</td>
                                <td id="taxPayment"></td>

                            </tr>
                            <tr>
                                <td>Total Paying</td>
                                <td id="finalAmountPayment"></td>
                            </tr>

                        </table>
                        <!-- Note Field -->
                        <textarea class="form-control note" placeholder="Note"></textarea>
                        <!-- Amount and Payment Method Fields -->
                        <div class="form-group" style="margin-bottom:0px;">
                            <label>Amount</label>
                            <input type="text" class="form-control finalAmountPayment" value="">
                        </div>
                        <div class="form-group" style="margin-bottom:0px;">
                            <label>Paying by</label>
                            <select class="form-control" id="payingBy">
                                <option>Cash</option>
                                <option>Credit Card</option>
                                <option>Debit Card</option>
                            </select>
                        </div>
                        <!-- Payment Note Field -->
                        <input type="text" class="form-control payment-note" id="paymentNote"
                            placeholder="Payment Note">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="paymentProcess">Submit</button>
            </div>
        </div>
    </div>
</div>


<!--POS Recipt-->
<div id="PosReciptPrint" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payment</h4>
            </div>
            <div class="modal-body">

                <div class="POS-Recipt" id="receipt">
                    <div class="pos-header">
                        <h1>SimplePOS</h1>
                        <h2>Bill</h2>
                    </div>

                    <div class="details">
                        <p><strong>Customer :</strong> <span id="customer-name">Walk-in Client</span></p>
                        <p><strong>User :</strong> <span id="user-name">admin</span></p>
                        <p><strong>Date & Time :</strong> <span id="date-time">Mon 4 Nov 2024 02:52 PM</span></p>
                    </div>

                    <div> <center><h2>Products</h2></center></div>
                    <div class="itemsPrint"></div>

                    <div class="payment-summary">
                        <p><span>Total Items</span> <span id="total-items"></span></p>
                        <p><span>Total</span> <span id="total"></span></p>
                        <p><span>Order Tax</span> <span id="order-tax"></span></p>
                        <p><span>Discount</span> <span id="Discount"></span></p>

                        <p><span>Grand Total</span> <span id="grand-total"></span></p>
                        <p><strong><span>Total Payable</span> <span id="total-payable"></span></strong></p>
                        <div id="qrCodeContainer" style="margin-top: 20px;"></div>

                    </div>


                    <div class="footer">
                        <p>Powered by <b>HANSOL Technologies</b></p>
                        <p>Contact: <span id="company-phone">(123) 456-7890</span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fa fa-print" id="printReceipt">Print</button>
            </div>
        </div>
    </div>
</div>

<!--POS Recipt-->
<!-- Trigger the payment modal -->
<script src="{{ asset('dashboard') }}/js/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
$(document).ready(function() {
    let totalItems = 0;
    let totalAmount = 0;
    let discount = 0;
    let tax = 0;
    let qty = 0;
    // Payment button click event
    $('#paymentButton').on('click', function() {
        let totalItems = parseInt($('#totalItems').text());
        let totalAmount = parseInt($('#totalAmount').text().replace('Rs. ', ''));
        let discount = parseInt($('#discount').val()) || 0; // Ensure discount is a number
        let tax = parseInt($('#tax').val()) || 0; // Ensure discount is a number
        let discountAmount = totalAmount * (discount / 100);
        let taxAmount = totalAmount * (tax / 100);
        let finalAmount = (totalAmount - discountAmount) + taxAmount;
        // in payment popup
        $('#totalItemsPayment').text(totalItems);
        $('#totalAmountPayment').text(totalAmount);
        $('#discountPayment').text(discountAmount);
        $('#taxPayment').text(taxAmount);
        $('#finalAmountPayment').text(finalAmount);
        $('.finalAmountPayment').val(finalAmount);
    });
    $('#paymentProcess').on('click', function() {
        let totalItems = parseInt($('#totalItems').text());
        let totalAmount = parseFloat($('#totalAmount').text().replace('Rs. ', ''));
        let discount = parseFloat($('#discount').val()) || 0; // Ensure discount is a number
        let tax = parseFloat($('#tax').val()) || 0; // Ensure discount is a number
        let discountAmount = totalAmount * (discount / 100);
        let taxAmount = totalAmount * (tax / 100);
        let finalAmount = (totalAmount - discountAmount) + taxAmount;
        let paymentNote = $('#paymentNote').val();
        let payingBy = $('#payingBy').val();
        const products = [];
        // Loop through each row in the product table
        $('#productTableBody tr').each(function() {
            const productId = $(this).data(
                'id'); // Assuming the product ID is stored in the row data
            const productName = $(this).find('td:nth-child(1)').text(); // Get product name
            const productPrice = parseFloat($(this).find('td:nth-child(2)')
                .text()); // Get product price
            const productQty = parseInt($(this).find('.qty').val()); // Get product quantity
            // Push product details to the array
            products.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: productQty,
            });
        });
        $.ajax({
            type: 'GET',
            url: '{{ url("process_payment") }}',
            data: {
                products: products,
                totalItems: totalItems,
                totalAmount: totalAmount,
                discountAmount: discountAmount,
                taxAmount: taxAmount,
                finalAmount: finalAmount,
                payingBy: payingBy,
                paymentNote: paymentNote,
            },
            success: function(response) {
                if (response.title == 'Done') {
                    Swal.fire({
                        icon: response.type,
                        title: response.title,
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        icon: response.type,
                        title: response.title,
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                }
            },
            // error: function(error) {
            //     alert("An error occurred while processing payment.");
            //     // Handle error
            // }
        });
    });
    // Use event delegation to bind keyup event to #productSearch
    $(document).on('keyup', '#productSearch', function(e) {
        e.preventDefault();
        var search = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ url("search_product") }}',
            data: {
                search: search
            },
            success: function(response) {
                // Replace the container content with the response
                $('.products').html(response);
            }
        });
    });
    $(document).on('click', '.product-section img', function() {
        const name = $(this).data('name');
        const id = $(this).data('id');
        const price = parseFloat($(this).data('price')).toFixed(2);
        // Check if the product is already added
        const existingProduct = $('#productTableBody').find(`tr[data-name="${name}"]`);
        $('#productTableBody').find(`tr[data-id="${id}"]`);
        if (existingProduct.length > 0) {
            let qty = existingProduct.find('.qty').val();
            qty = parseInt(qty) + 1; // Increment quantity
            existingProduct.find('.qty').val(qty);
            const newSubtotal = (price * qty).toFixed(2); // Recalculate subtotal
            existingProduct.find('.subtotal').text(newSubtotal); // Update subtotal in table
        } else {
            totalItems++;
            const row = `<tr data-id="${id}" data-name="${name}">
                                    <td>${name}</td>
                                    <td>${price}</td>
                                    <td><input type="text" min="0" class="qty form-control" value="1"></td>
                                    <td class="subtotal">${price}</td>
                                    <td class="text-center"><i class="md md-delete removeProduct" style="font-size:24px;"></i></td>
                                </tr>`;

            $('#productTableBody').append(row);
        }
        totalAmount += parseFloat(price); // Add price to total
        updateTotals(); // Update totals
    });
    // Update Totals Function
    function updateTotals() {
        $('#totalItems').text(totalItems);
        // Update total amount
        $('#totalAmount').text(`Rs. ${totalAmount.toFixed(2)}`);
        // Calculate discount and tax
        let discount = parseFloat($('#discount').val()) || 0;
        let tax = parseFloat($('#tax').val()) || 0;
        const discountAmount = totalAmount * (discount / 100);
        const taxAmount = totalAmount * (tax / 100);
        const finalTotal = totalAmount - discountAmount + taxAmount;
        $('#discountAmount').text(`-Rs. ${discountAmount.toFixed(2)}`);
        $('#taxAmount').text(`+Rs. ${taxAmount.toFixed(2)}`);
        $('#finalTotal').text(`Rs. ${finalTotal.toFixed(2)}`);
    }
    // Remove Product from Cart
    $('#productTableBody').on('click', '.removeProduct', function() {
        const row = $(this).closest('tr');
        const subtotal = parseFloat(row.find('.subtotal').text());
        totalAmount -= subtotal;
        totalItems--;
        row.remove();
        updateTotals();
    });
    $(document).on('keyup', '.qty', function(e) {
        const row = $(this).closest('tr');
        const price = parseFloat(row.find('td:eq(1)').text()).toFixed(2);
        let qty = parseInt($(this).val()) || 0; // Get the new quantity
        const newSubtotal = (price * qty).toFixed(2); // Recalculate subtotal
        row.find('.subtotal').text(newSubtotal); // Update subtotal in table
        // Recalculate total amount
        recalculateTotalAmount();
        updateTotals();
    });

    function recalculateTotalAmount() {
        totalAmount = 0; // Reset total amount
        $('#productTableBody').find('.subtotal').each(function() {
            totalAmount += parseFloat($(this).text());
        });
    }
    // Handle Discount and Tax changes
    $('#discount, #tax').on('input', updateTotals);

    // Print Bill


    $('#printButton').on('click', function() {

        $('#PosReciptPrint').modal('show');
        $('.itemsPrint').html('');
        var i=0;
        $('#productTableBody tr').each(function(){
            i++;
            const productName = $(this).find('td:nth-child(1)').text(); // Get product name
            const productPrice = $(this).find('td:nth-child(2)').text(); // Get product price
            const productQty = $(this).find('.qty').val(); // Get product quantity
            const productSubtotal = $(this).find('.subtotal').text(); // Get product subtotal

            // Append the product details to the bill details area for printing
           

                const rowHtml =`
                <div>
                        <p class="item"><strong>#${i} ${productName}</strong> <span class="item-price"
                                id="item-1-price">${productPrice}</span></p>
                        <p>(${productQty} x <span class="item-price" id="item-1-quantity">${productSubtotal}</span>)</p>
                        </div>
                        `;
            $('.itemsPrint').append(rowHtml);
        });

         // Get and display total items and amount
        let totalItem = parseInt($('#totalItems').text());
        $('#total-items').text(totalItem); // Display total items in the printable area

        let totalAmount = parseFloat($('#totalAmount').text().replace('Rs. ',
        '')); // Remove 'Rs.' and convert to a number
        $('#total').text(totalAmount.toFixed(
        2)); // Display total amount in the printable area

        // Get the discount value and calculate the discount amount
        let discount = parseFloat($('#discount').val()) || 0; // Ensure discount is a number


        let tax = parseFloat($('#tax').val()) || 0; // Ensure discount is a number
        let discountAmount = totalAmount * (discount / 100);
        let taxAmount = totalAmount * (tax / 100);
        let finalAmount = (totalAmount - discountAmount) + taxAmount;


        // Display the calculated discount and final total
        $('#order-tax').text(taxAmount);
        $('#Discount').text(discountAmount.toFixed(2));
        $('#grand-total').text(finalAmount.toFixed(2));
        $('#total-payable').text(finalAmount.toFixed(2));


        const qrCode = '{{ $QrCodeSetting["qrcode"] }}'; // Value will be 'on' or 'off'
        const company_name = '{{ $QrCodeSetting["company_name"] }}'; // Value will be 'on' or 'off'
        const customer_name = '{{ $QrCodeSetting["customer_name"] }}'; // Value will be 'on' or 'off'
        const tax_amount = '{{ $QrCodeSetting["tax"] }}'; // Value will be 'on' or 'off'
        const sub_total = '{{ $QrCodeSetting["sub_total"] }}'; // Value will be 'on' or 'off'

        
        // Check if QR code setting is enabled
        if (qrCode === 'on') {
            $('#qrCodeContainer').show(); // Show the QR code container

            // Clear any previous QR code (optional)
            $('#qrCodeContainer').html('');

            // Assume this is how you're getting finalAmounts and taxAmounts
            const finalAmounts = finalAmount; // Make sure finalAmount is defined
            const businessName = "Al Jadded Super Mart"; // Company name is static in this case
            const customerName = "WalkIn Customer"; // Customer name is static in this case
            const taxAmounts = taxAmount; // Make sure taxAmount is defined

            // Construct the QR text conditionally
            let qrText = '';

            if (company_name === 'on') {
                qrText += `Business Name: ${businessName}, `;
            }

            if (customer_name === 'on') {
                qrText += `Customer Name: ${customerName}, `;
            }
            if (tax_amount === 'on') {
                qrText += `Tax: ${taxAmounts.toFixed(2)}`;
            }

            if (sub_total === 'on') {
                qrText +=
                `Sub Total: Rs. ${finalAmounts.toFixed(2)}, `; // You can include the subtotal if you have it
            }
            qrText = qrText.replace(/, $/, ''); // Remove last comma and space

            $('#qrCodeContainer').html('');

            // Generate the QR code
            new QRCode(document.getElementById("qrCodeContainer"), {
                text: qrText,
                width: 200,
                height: 200
            });


        } else {
            $('#qrCodeContainer').hide(); // Hide the QR code container if disabled
        }
        // Show the printable area
    //    $('#printableArea').show();

        // Trigger print
       // window.print();

       // $('#printableArea').hide(); // Hide the printable area after printing
    });

    $('#printReceipt').click(function(){
        var printContents = $('.POS-Recipt').html();
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
      
    });


}); // end document ready
</script>
</body>

</html>
@endsection
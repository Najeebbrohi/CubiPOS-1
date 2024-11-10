<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        /* Add any styling you need for the PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Products List</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Code</th>
                <th>Category</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Product Tax</th>
                <th>Tax Method</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->category->name ?? '' }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->product_tax }}</td>
                    <td>{{ $product->tax_method }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

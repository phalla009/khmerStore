@extends('layouts.master')

@section('pageTitle')
    Product Listing
@endsection

@section('headerBlock')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(255, 178, 34);
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #e7e6e6;
        }

        a {
            text-decoration: none;
        }

        .product-name {
            font-size: 16px;
            color: #333;
        }

        .product-price {
            font-size: 16px;
            color: #e44d26;
            font-weight: bold;
        }

        .product-warranty, .product-quantity {
            font-size: 16px;
            color: #333;
        }

        .show-button {
            padding: 8px 12px;
            background: #f0bc02;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        .show-button:hover {
            background: #d99800;
        }

        .edit-button {
            padding: 8px 12px;
            background: #fc890f;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        .edit-button:hover {
            background: #d99800;
        }

        .delete-button {
            padding: 8px 12px;
            background: #ff3507;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            transition: background 0.3s ease;
        }

        .delete-button:hover {
            background: #d13501;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                font-weight: bold;
                color: #333;
            }

            .action-buttons {
                flex-wrap: wrap;
            }
        }
    </style>

    <script>
        setTimeout(function () {
            var msg = document.getElementById('success-message');
            if (msg) {
                msg.style.transition = 'opacity 0.3s ease';
                msg.style.opacity = '0';
                setTimeout(function () {
                    msg.remove();
                }, 300);
            }
        }, 3000);
    </script>
@endsection

@section('rightTitle')
    Products Listing
@endsection

@section('toolbar')
    <a href="{{ route('products.create') }}">+ Add New Product</a>
@endsection

@section('content')

@if (!empty(session('id')))
    <div id="confirmMessage">
        Are you sure you want to delete this record?
        <a href="{{ route('products.destroy', session('id')) }}">Yes</a> |
        <a href="{{ route('products.index') }}">No</a>
    
    </div>
@endif

@if (!empty(session('success')))
    <div id="success-message" class="success">{{ session('success') }}</div>
@endif
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Price</th>
            <th>Warranty</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td data-label="No">{{ $loop->iteration }}</td>
            <td data-label="Product" class="product-name">{{ $product->product_name }}</td>
            <td data-label="Price" class="product-price">${{ number_format($product->price, 2) }}</td>
            <td data-label="Warranty" class="product-warranty">{{ $product->warranty }} month</td>
            <td data-label="Quantity" class="product-quantity">{{ $product->quantity }}</td>
            <td data-label="Action" class="action-buttons">
                <a href="{{ route('products.show', $product->id) }}" class="show-button">Show</a>
                <a href="{{ route('products.edit', $product->id) }}" class="edit-button">Edit</a>
                <a href="{{ route('products.confirm.deletion', $product->id) }}" class="delete-button">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">No products found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection

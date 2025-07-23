@extends('layouts.master')

@section('pageTitle')
    Search Products
@endsection

@section('rightTitle')
    Search Products
@endsection

@section('headerBlock')
    <script src="{{ URL::asset('js/form.js')}}"></script>
     <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}">
@endsection

@section('toolbar')
    <a href="{{ route('products.index') }}">&lt;&nbsp;Back</a>
@endsection

@section('content')
        <form class="search-form">
            <input type="text" class="search-input" placeholder="Search for products..." name="query">
            <select class="category-select" name="category">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="books">Books</option>
                <option value="home">Home & Garden</option>
            </select>
            <div class="price-range-container">
                <label class="price-label">Price Range: <span id="price-display">$0 - $1000</span></label>
                <div class="price-range">
                    <input type="range" name="min-price" min="0" max="1000" value="0" oninput="updatePriceRange()">
                    <input type="range" name="max-price" min="0" max="1000" value="1000" oninput="updatePriceRange()">
                </div>
                <div class="price-values">
                    <span>$0</span>
                    <span>$1000</span>
                </div>
            </div>
            <button type="submit" class="search-button">Search</button>
        </form>
    <script>
        function updatePriceRange() {
            const minPrice = document.querySelector('input[name="min-price"]').value;
            const maxPrice = document.querySelector('input[name="max-price"]').value;
            document.getElementById('price-display').textContent = $${minPrice} - $${maxPrice};
        }
    </script>
@endsection

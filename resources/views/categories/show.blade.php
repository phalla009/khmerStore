@extends('layouts.master')

@section('pageTitle')
    Editing Existing Product
@endsection

@section('headerBlock')
   <link rel="stylesheet" href="{{ URL::asset('css/show-product.css') }}">
@endsection

@section('rightTitle')
    Product Details
@endsection

@section('toolbar')
    <div class="toolbar">
        <a href="{{ route('products.index') }}">&lt;&nbsp;Back</a>
    </div>
@endsection

@section('content')
    <div class="product-container">
        <div class="image-gallery">
            {{-- Main big image --}}
            <img id="mainImage" src="{{ asset('img/img.jpg') }}" alt="Main Product Image">

            {{-- Thumbnails --}}
            <div class="img-small">
                <img src="{{ asset('img/img2.png') }}" alt="Thumbnail 1">
                <img src="{{ asset('img/img3.jpg') }}" alt="Thumbnail 2">
                <img src="{{ asset('img/img.jpg') }}" alt="Thumbnail 3">
            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.img-small img');

            thumbnails.forEach(function (thumb) {
                thumb.addEventListener('click', function () {
                    mainImage.src = this.src;
                });
            });
        });
        </script>

        {{-- Product Details --}}
        <div class="product-details">
            <p><strong>Product Name:</strong> {{ $product->product_name }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Warranty:</strong> {{ $product->warranty ? $product->warranty . ' month' : 'N/A' }}</p>
            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>

            {{-- Remove Button --}}
            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-remove">Remove Product</button>
            </form>
        </div>
    </div>
@endsection

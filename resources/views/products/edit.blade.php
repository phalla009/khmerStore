@extends('layouts.master')

@section('pageTitle')
    Editing Existing Product
@endsection

@section('rightTitle')
    Editing Existing Product
@endsection

@section('headerBlock')
    <script src="{{ URL::asset('js/form.js')}}"></script>
    <style>
        #group-buttons {
            gap: 20px;
            justify-content: space-between;
        }
        #group-buttons button {
            flex: 1;
        }
    </style>
@endsection

@section('toolbar')
    <a onclick="document.querySelector('form').submit()">Edit</a>
    <a href="{{ route('products.index') }}">&lt;&nbsp;Back</a>
@endsection

@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="product_name" class="block text-sm font-semibold text-gray-800">Product Name</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">
            @error('product_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-800">Description</label>
            <textarea id="description" name="description" rows="5"
                      class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="block text-sm font-semibold text-gray-800">Price ($)</label>
            <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="quantity" class="block text-sm font-semibold text-gray-800">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="0" value="{{ old('quantity', $product->quantity) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('quantity')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label for="warranty" class="block text-sm font-semibold text-gray-800">Warranty</label>
            <input type="text" id="warranty" name="warranty" value="{{ old('warranty', $product->warranty) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('warranty')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-end" id="group-buttons">
            <button type="submit"
                    class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-none font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Update Product
            </button>

        </div>
    </form>
@endsection

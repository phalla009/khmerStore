@extends('layouts.master')

@section('pageTitle')
    Create Product
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
        .back-btn {
            display: inline-block;
            padding: 8px 16px;
            color: #fff;
            background-color: #6c757d; 
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .back-btn .arrow {
            font-size: 28px;
            margin-right: 8px;
            vertical-align: middle;
        }
    </style>
    <script>
        setTimeout(function() {
            var msg = document.getElementById('success-message');
            if(msg) {
                msg.style.transition = 'opacity 0.3s ease';
                msg.style.opacity = '0';
                setTimeout(function(){ msg.remove(); }, 300);
            }
        }, 3000);
    </script>
@endsection

@section('rightTitle')
    Create New Products
@endsection

@section('toolbar')       
    <a onclick="document.querySelector('form').submit()">Add Product</a>
<a href="{{ route('products.index') }}" class="back-btn">&larr; Back</a>

@endsection

@section('content')
    @if (!empty(session('success')))
        <div id="success-message" class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="product_name" class="block text-sm font-semibold text-gray-800">Product Name</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">
            @error('product_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-800">Description</label>
            <textarea id="description" name="description" rows="5"
                      class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">{{ old('description') }}</textarea>
        </div>

        <div class="mb-6">
            <label for="price" class="block text-sm font-semibold text-gray-800">Price ($)</label>
            <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="quantity" class="block text-sm font-semibold text-gray-800">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="0" value="{{ old('quantity') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('quantity')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="warranty" class="block text-sm font-semibold text-gray-800">Warranty</label>
            <input type="text" id="warranty" name="warranty" value="{{ old('warranty') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900">
            @error('warranty')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Optional: Enable this if image uploads are supported --}}
        {{--
        <div class="mb-6">
            <label for="image" class="block text-sm font-semibold text-gray-800">Product Image</label>
            <input type="file" id="image" name="image" accept="image/*"
                   class="mt-2 block w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-indigo-500 file:to-purple-500 file:text-white hover:file:from-indigo-600 hover:file:to-purple-600 transition duration-200 ease-in-out">
        </div>
        --}}

        <div class="flex justify-end" id="group-buttons">
            <button type="submit"
                    class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-none font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Add Product
            </button>
            <button type="reset"
                   class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-none font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Reset
            </button>
        </div>
    </form>
@endsection

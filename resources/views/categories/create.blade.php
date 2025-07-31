@extends('layouts.master')

@section('pageTitle')
    Create Categories
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
    Create New categories
@endsection

@section('toolbar')       
    <a onclick="document.querySelector('form').submit()">Add Category</a>
<a href="{{ route('categories.index') }}" class="back-btn">&larr; Back</a>

@endsection

@section('content')
    @if (!empty(session('success')))
        <div id="success-message" class="success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="category_name" class="block text-sm font-semibold text-gray-800">Category Name</label>
            <input type="text" id="category_name" name="category_name" value="{{ old('category_name') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">
            @error('category_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-800">Description</label>
            <textarea id="description" name="description" rows="5"
                      class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">{{ old('description') }}</textarea>
        </div>
        <div class="flex justify-end" id="group-buttons">
            <button type="submit"
                    class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-none font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Add Category
            </button>
            <button type="reset"
                class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-none font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Reset
            </button>

        </div>
    </form>
@endsection

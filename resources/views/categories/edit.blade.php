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
    <a href="{{ route('categories.index') }}">&lt;&nbsp;Back</a>
@endsection

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="category_name" class="block text-sm font-semibold text-gray-800">Category Name</label>
            <input type="text" id="category_name" name="category_name" value="{{ old('category_name', $product->category_name) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-200 shadow-md focus:border-purple-500 focus:ring-2 focus:ring-purple-300 transition p-3 bg-gray-50 text-gray-900 placeholder-gray-400">
            @error('category_name')
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
        <div class="flex justify-end" id="group-buttons">
            <button type="submit"
                     class="bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 px-6 rounded-lg font-semibold shadow-lg hover:from-red-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 transition duration-200 ease-in-out">
                Update Category
            </button>

        </div>
    </form>
@endsection

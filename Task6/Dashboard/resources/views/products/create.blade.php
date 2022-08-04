@extends('layouts.parent')
@section('title', 'Create Products')
@section('content')
@include('components.message')
    <div class="col-12">
        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" class="form-control">
                    @error('name_en')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control">
                    @error('name_ar')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control">
                    @error('price')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                    @error('quantity')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="code">Code</label>
                    <input type="text" name="code" id="code" class="form-control">
                    @error('code')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                    @error('status')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="brand_id">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                        @endforeach

                    </select>
                    @error('brand_id')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="subcategory_id">Subcategories</label>
                    <select type="text" name="subcategory_id" id="subcategory_id" class="form-control">
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                        @endforeach

                    </select>
                    @error('subcategory_id')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="details_en">Details (EN)</label>
                    <textarea name="details_en" id="details_en" class="form-control" cols="30" rows="10"></textarea>
                    @error('details_en')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-6">

                    <label for="details_ar">Details (AR)</label>
                    <textarea name="details_ar" id="details_ar" class="form-control" cols="30" rows="10"></textarea>
                    @error('details_ar')
                        <div class="text-danger font-weight-bold">*{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <label for="file">
                        <img class="w-100" style="cursor:pointer" src="{{ asset('images/upload.jpg') }}" alt="Upload"
                            id="image">
                    </label>
                    <input type="file" name="image" id="file" class="d-none" onchange="loadFile(event)">
                    @error('image')
                    <div class="text-danger font-weight-bold">*{{ $message }}</div>
                @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="col-2">
                    <label for="file">
                        <button class="btn btn-primary btn-sm"> Create</button>
                </div>
            </div>
        </form>

    </div>

@endsection
@section('js')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

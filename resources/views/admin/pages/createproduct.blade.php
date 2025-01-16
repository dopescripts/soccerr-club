@extends('admin.layout.app')

@section('title', 'Add Products - ')

@section('content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-package-variant"></i>
                </span> Create Products
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body table-responsive">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="col-md-12">
                            <form class="forms-sample" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label pr-0">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" id="exampleInputUsername2" placeholder="e.g: nike shoes 12 size" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label pr-0">Product Price</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-primary">$</span>
                                                    </div>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">0.00</span>
                                                    </div>
                                                    <input type="text" value="0.00" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                                </div>
                                                <span class="card-description pt-3 text-muted small">Enter in 0.00 format only</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="quant" class="col-sm-3 col-form-label">Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="quant" id="quant" placeholder="Quantity i.e 10" required>
                                                <span class="text-muted card-description small">Here (0 = Out of Stock & >0 = In Stock) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="quant" class="col-sm-3 col-form-label ">Discount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="discount" id="quant" placeholder="Discount i.e 0.1 = 10%" required>
                                                <span class="text-muted card-description small">Enter in 0.00 format only (where 0.1 = 10%, 0.1-0.9)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-1">
                                        <div class="form-group row justify-content-between">
                                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select name="category" class="form-control" id="category" required>
                                                    <option selected>Select Category</option>
                                                    @foreach ($category as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-1">
                                        <div class="form-group row">
                                            <label for="vendor" class="col-sm-3 col-form-label">Vendor</label>
                                            <div class="col-sm-9">
                                                <select name="vendor" class="form-control" id="vendor" required>
                                                    <option selected>Select Vendor</option>
                                                    @foreach ($vendor as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="images" class="col-sm-3 col-form-label pr-0 ">Product Images</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="images[]" class="file-upload-default" accept="image/*" id="images" multiple>
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Images">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label for="thumbImg" class="col-sm-3 col-form-label">Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="thumbImg" class="file-upload-default" id="thumbImg" accept="image/*" required>
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Thumbnail">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview-list col-12 mb-3">
                                        <div class="row justify-content-end">
                                            <div class="col-md-2">
                                                Preview Images:
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card">
                                                    <div class="card-body rounded-0 bg-dark d-flex flex-row gap-4" id="preview-images">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summernote" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="summernote"></textarea>
                                    </div>
                                </div>
                                <div class="d-md-flex w-100 justify-content-between align-items-center">
                                    <div class="form-group row w-75 mb-0 pb-0">
                                        <div class="col-sm-3">
                                            <label for="tags" class="col-form-label">Product Tags</label>
                                        </div>
                                        <div class="col-sm-9 p-0">
                                            <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter tags separated by comma">
                                            <span class="text-muted card-description small">e.g. football, field, gear...etc</span>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex flex-column ml-auto p-0 mr-md-3">
                                        <div class="form-check">
                                            <label class="form-check-label row"> <span class="col-sm-3 text-white">Featured Product</span>
                                                <input type="checkbox" name="featured" class="form-check-input col-sm-9">
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label row"> <span class="col-sm-3 text-white">Latest Product</span>
                                                <input type="checkbox" name="latest" class="form-check-input col-sm-9">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2 btn-lg">Add Product</button>
                                <button class="btn btn-dark btn-lg" id="reset" type="reset">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview-images');
            previewContainer.innerHTML = ""; // Clear previous previews

            const files = event.target.files;

            if (files.length > 0) {
                Array.from(files).forEach(file => {
                    // Ensure the file is an image
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            // Create an image element
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = file.name;
                            img.style.width = '100px';
                            img.style.height = '100px';
                            img.style.objectFit = 'cover';
                            img.style.border = '1px solid #ccc';
                            img.style.borderRadius = '5px';

                            // Append the image to the preview container
                            previewContainer.appendChild(img);
                        };

                        reader.readAsDataURL(file); // Read the file
                    }
                });
            }
        });
    </script>
@endsection

@extends('admin.master')
@section('body')
    <!--app-content open-->


    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Product</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between">
                        <h3 class="card-title">Add Product form</h3>
                        <a href="{{route('product.index')}}" class="btn btn-primary">All Product</a>
                    </div>
                    <div class="card-body">
                        <p class="text-success text-center">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="category_id" onchange="getSubCategory(this.value)" >
                                        <option value=""> -- Select Category -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Sub Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="sub_category_id" id="subCategoryId" >
                                        <option value=""> -- Select Sub Category -- </option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Brand Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="brand_id" >
                                        <option value=""> -- Select Brand -- </option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Unit Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="unit_id" >
                                        <option value=""> -- Select Unit -- </option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="name"  placeholder="Enter Product Name" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Code</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="code" placeholder="Enter Product code" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Product Color</label>
                                <div class="col-md-9">
                                    <select multiple name="color[]" class="form-control select2-show-search form-select" data-placeholder="-- Select product Color --">
                                        <option label="Choose one"></option>
                                        @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Product Size</label>
                                <div class="col-md-9">
                                    <select multiple name="size[]" class="form-control select2-show-search form-select" data-placeholder="-- Select product Size --">
                                        <option label="Choose one"></option>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Meta Title</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="meta_title" placeholder="Enter Meta Title" ></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="meta_description" placeholder="Enter Meta Description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Product Price</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input class="form-control" name="regular_price" placeholder="Product Regular price" type="number">
                                        <input class="form-control" name="selling_price" placeholder="Product selling price" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Stock Amount</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="stock_amount" placeholder="Enter Product Stock Amount" type="number">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Short Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="short_description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Long Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="summernote" name="long_description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Image</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="image" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Others Image</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="other_image[]" multiple type="file" accept="image/*">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Create New Product</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->
@endsection

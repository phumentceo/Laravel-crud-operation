@extends('components.master')
@section('contents')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1>Update Product</h1>
            <a href="/product" class=" btn btn-outline-danger ">back</a>
        </div>

        <form action="{{ route('product.update',$product->id) }}" class="forms-sample" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name')  is-invalid   @enderror" value="{{ ($product->name != '' ) ? $product->name : 'null' }}" name="name" id="name" placeholder="Product Name">
            @error('name')
               <p class=" text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control @error('price')  is-invalid   @enderror " value="{{ ($product->price != '') ? $product->price : '0' }}" name="price" id="price" placeholder="Price">
            @error('price')
               <p class=" text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="qty">Product Qty</label>
            <input type="number" class="form-control @error('qty')  is-invalid   @enderror" value="{{ $product->qty }}"  name="qty" id="qty" placeholder="Qty">
            @error('qty')
               <p class=" text-danger">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="">Product Image</label>
            <input type="hidden" value="{{ $product->image }}" name="old_image">
            <input type="file" name="image" id="" class="form-control">
          </div>
          @if ($product->image != null)
            <div>
                <img width="200" src="{{ asset('uploads/'.$product->image) }}" alt="">
            </div>
          @endif
         
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="desc" id="desc" rows="2">{{ $product->description }}</textarea>
          </div>

          <button type="submit" class="btn btn-success mr-2">Update</button>
          <button class="btn btn-light">Cancel</button>

        </form>
      </div>
    </div>
  </div>
@endsection
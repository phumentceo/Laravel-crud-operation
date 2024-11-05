@extends('components.master')
@section('contents')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1>Create Product</h1>
            <a href="/product" class=" btn btn-outline-danger ">back</a>
        </div>

        <form class="forms-sample" id="formCreateProduct" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
            <p></p>
          </div>
          <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Price">
            <p></p>
          </div>
          <div class="form-group">
            <label for="qty">Product Qty</label>
            <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty">
            <p></p>
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="image" class=" form-control" id="image">
          </div>
         
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="desc" id="desc" rows="2"></textarea>
          </div>

          <button onclick="StoreProduct('#formCreateProduct')" type="button" class="btn btn-success mr-2">Save</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
      const StoreProduct = (form) => {
          let payloads = new FormData($(form)[0]);
          $.ajax({
            type: "POST", 
            url: "{{ route('product.store') }}",
            data: payloads,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status == 200){
                  //form reset 
                  $(form).trigger('reset');

                  //remove feidl errors
                  $("input").removeClass("is-invalid").siblings('p').removeClass('text-danger').text(" ");

                  //redirect to list page
                  window.location.href = "{{ route('product.list') }}";

                }else{
                    //  let errors = response.errors;
                   if(response.errors.name != null){
                      $("#name").addClass("is-invalid").siblings('p').addClass('text-danger').text(response.errors.name);
                   }else{
                     $("#name").removeClass("is-invalid").siblings('p').removeClass('text-danger').text(" ");
                   }

                   if(response.errors.price){
                      $("#price").addClass("is-invalid").siblings('p').addClass('text-danger').text(response.errors.price);
                   }else{
                      $("#price").removeClass("is-invalid").siblings('p').removeClass('text-danger').text(" ");
                   }

                   if(response.errors.qty){
                     $("#qty").addClass("is-invalid").siblings('p').addClass('text-danger').text(response.errors.qty);
                   }else{
                    $("#qty").removeClass("is-invalid").siblings('p').removeClass('text-danger').text(" ");
                   }


                }
            }
          });

         
      }
</script>
@endsection
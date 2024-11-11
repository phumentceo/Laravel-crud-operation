@if(Session::has('success'))
    <div class="alert bg-success alert-dismissible fade show d-flex justify-content-between align-items-center p-2" role="alert">
        <h3>{{ Session::get('success') }}</h3>
        <i class="bi bi-x-lg"  data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
@elseif(Session::has('error'))
    <div class="alert bg-danger alert-dismissible fade show d-flex justify-content-between align-items-center p-2" role="alert">
        <h5>{{ Session::get('error') }}</h5>
        <i class="bi bi-x-lg"  data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
@endif
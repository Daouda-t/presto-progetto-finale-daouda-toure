<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
<div class="row vh-100 justify-content-center align-items-center">
<div class="col-12">
    <h1 class="display-1">Presto.it</h1>

</div>
</div>
<div class="row height-custom justify-conten-center align-items-center py-5">
@forelse ($categories as $category)
<div class="col-12 col-md-3">
    
</div>
@empty
<div class="col-12">
    <h3 class="display-3">Non ci sono categorie</h3>
</div>
@endforelse
@if (session()->has('errorMessage'))
  <div class="alert alert-danger text-center shadow rounded w-50">
     {{ session('errorMessage') }}
  </div>
@endif
@if (session()->has('message'))
<div class="alert alert-success text-center shadow rounded w-50">
     {{ session('errorMessage') }}
  </div>
@endif
    </div>
</x-layout>
    
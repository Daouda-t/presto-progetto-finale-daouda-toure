<x-layout>
<div class="container-fluid text-center bg-body-tertiary">
    <div class="row vh-100  justify-content-center align-items-center">
        <div class="col-12">
   <h1 class="display-1">PRESTO</h1>
   <div class="my-3">
@auth
<a class="btn btn-dark" href="{{route('create.article')}}">Publica un articolo</a>
@endauth
   </div>
  </div>
 </div>
</div>
</x-layout>
@extends('layouts.adminapp')
@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-5 text-gray-800 ">la page des categories </h1>

        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">ajouter une category</h6>
            </div>
            <div class="card-body ">

                <form method="post" action="{{route('cat.add')}}">
                    @csrf
                    <div class="form-group">
                      <label for="cat">nom de category</label>
                      <input type="text" class="form-control w-25" name="cat" id="cat" value="{{old('cat')}}"  placeholder="Enter une category">
                      @error("cat")
                     <small  class="form-text text-danger">{{$message}}</small>
                      @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">ajouter</button>
                  </form>
            </div>
        </div>
    </div>
        @endsection

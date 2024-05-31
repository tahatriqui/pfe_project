@extends('layouts.adminapp')
@section('content')

    <style>
        .form-row {
            display: flex;
            gap: 70px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
        }

        .form-control {
            width: 100%;
        }
    </style>

    <div class="container-fluid">
        <h1 class="h3 mb-5 text-gray-800 ">modifier le produit </h1>

        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">modifier un produit</h6>
            </div>
            <div class="card-body ">

                <form method="post" action="{{route('prod.edit',$products->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom de produit</label>
                            <input type="text" class="form-control" name="nom" id="nom"
                                value="{{ $products->nom }}" placeholder="Enter un produit">
                            @error('nom')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter une description">{{ $products->desc }}</textarea>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" name="prix" id="prix"
                                value="{{ $products->prix }}" placeholder="Enter un prix">
                            @error('prix')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category">Select une category</label>
                            <select class="form-control" name="category" id="category">
                                <option  disabled>Les category</option>
                                @foreach ($cat as $item)
                                @if ($products->id == $item->id)
                                <option selected value="{{$item->id}}" >{{$item->category}}</option>
                                @else
                                <option value="{{$item->id}}" >{{$item->category}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('category')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="img">Photo</label>
                            <div class="custom-file">
                                <input style="cursor: pointer" type="file"  name="img"
                                    id="img" >

                            </div>
                            @error('img')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>

            </div>
        </div>
    </div>
@endsection

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
        <h1 class="h3 mb-5 text-gray-800 ">la page des produits </h1>

        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">ajouter un produit</h6>
            </div>
            <div class="card-body ">

                <form method="post" action="{{route('prod.add')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom de produit</label>
                            <input type="text" class="form-control" name="nom" id="nom"
                                value="{{ old('nom') }}" placeholder="Enter un produit">
                            @error('nom')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter une description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" name="prix" id="prix"
                                value="{{ old('prix') }}" placeholder="Enter un prix">
                            @error('prix')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category">Select une category</label>
                            <select class="form-control" name="category" id="category">
                                <option selected disabled>Les category</option>
                                @foreach ($cat as $row)
                                @if ($row->id == old('category'))
                                <option selected value="{{$row->id}}" >{{$row->category}}</option>
                                @else
                                <option value="{{$row->id}}" >{{$row->category}}</option>
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
                                    id="img">

                            </div>
                            @error('img')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>

            </div>
        </div>
    </div>
@endsection

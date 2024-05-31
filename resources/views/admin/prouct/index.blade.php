@extends('layouts.adminapp')
@section('content')

    <div class="container-fluid">
        @session('sup')
            <div id="alertBox"
                class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center"
                role="alert">
                <strong>{{ session('sup') }}</strong>
                <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none"
                    aria-label="Close">X</button>
            </div>
        @endsession

        @session('suc')
            <div id="alertBox"
                class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center"
                role="alert">
                <strong>{{ session('suc') }}</strong>
                <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none"
                    aria-label="Close">X</button>
            </div>
        @endsession

        @session('mod')
            <div id="alertBox"
                class="alert alert-info alert-dismissible fade show d-flex justify-content-between align-items-center"
                role="alert">
                <strong>{{ session('mod') }}</strong>
                <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none"
                    aria-label="Close">X</button>
            </div>
        @endsession
        <h1 class="h3 mb-5 text-gray-800 ">les Produits </h1>
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">les utilisateurs </h6>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table align="center" class="table table-bordered w-75" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>imgae</th>
                                <th>name</th>
                                <th>description</th>
                                <th>prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $row)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td><img style="width: 120px;height:100px" src="{{ asset('storage/' . $row->img) }}"
                                            alt="{{ $row->name }}"> </td>
                                    <td>{{ $row->nom }}</td>
                                    <td>{{ $row->desc }}</td>
                                    <td>{{ $row->prix }}</td>
                                    <td>
                                        <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure you want to delete
                                                        "{{ $row->nom }} " ? This
                                                        action cannot be undone.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                        <form method="POST" class="d-inline"
                                                            action="{{ route('prod.delete', $row->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"
                                                                onclick="confirmDelete()">supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a style="margin-right: 5px" class=" btn btn-danger btn-circle btn-sm"
                                            data-toggle="modal" data-target="#deleteModal{{ $row->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a title="modifier" style="margin-right: 5px"
                                            class="  btn btn-info btn-circle btn-sm" href="{{route('prod.edit_page',$row->id)}}">
                                            <i class="fas fa-edit"></i></a>
                                        <a title="details..." style="margin-right: 5px"
                                            class="  btn btn-primary btn-circle btn-sm" href="">
                                            <i class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-75 " style="margin-left: 12.5% "> {{ $products->links() }}</div>
            </div>
        </div>
        <div><a href="{{route('prod.add_page')}}" class="btn btn-success">ajouter un produits</a></div>
    </div>
@endsection

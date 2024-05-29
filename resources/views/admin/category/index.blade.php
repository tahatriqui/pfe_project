@extends('layouts.adminapp')
@section('content')
    <div class="container-fluid">

@session('sup')
 <div id="alertBox" class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
              <strong>{{ session('sup') }}</strong>
              <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none" aria-label="Close">X</button>
            </div>
@endsession

@session('suc')
 <div id="alertBox" class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
              <strong>{{ session('suc') }}</strong>
              <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none" aria-label="Close">X</button>
            </div>
@endsession

@session('mod')
 <div id="alertBox" class="alert alert-info alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
              <strong>{{ session('mod') }}</strong>
              <button id="closeBtn" type="button" class="btn-close" style="background: transparent ;border:none" aria-label="Close">X</button>
            </div>
@endsession




        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800 ">la page des categories </h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary ">les categories des produit </h6>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table align="center" class="table table-bordered w-75" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>categories</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $row)
                                <tr>
                                    <td><strong>{{ $key + 1 }}</strong></td>
                                    <td>{{ $row->category }}</td>

                                    <td>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure you want to delete this category? This
                                                        action cannot be undone.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                            <form method="POST" class="d-inline" action="{{route('cat.delete',$row->id )}}">
                                                                @csrf
                                                                @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="confirmDelete()">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Button -->

                                        <a  class=" btn btn-danger btn-circle btn-sm"
                                        data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                    </a>



                                        <a href="{{route('cat.modPage',$row->id)}}" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="  btn btn-primary btn-circle btn-sm" href=""><i
                                                class="fas fa-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
               <div class="w-75 " style="margin-left: 12.5% "> {{ $category->links() }}</div>
            </div>
        </div>
        <div><a href="{{route("cat.addPage")}}" class="btn btn-success">ajouter une category</a></div>
    </div>



@endsection

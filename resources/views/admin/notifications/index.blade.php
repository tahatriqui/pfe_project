@extends('layouts.adminapp')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800 ">les notification </h1>
        <div class="card">
            <div class="card-header ">
                Tu as <strong>{{ $all }}</strong> notification et <strong>{{ $count }}</strong> non lus
            </div>
            <div class="card-body">
                <ul class="list-group ">
                    @foreach ($nots as $key => $row)
                    @if ($row->checked)
                    <li style="border-color:#060245; background-color: #060245; display: block;"  class="list-group-item text-white list-group-item-action d-flex justify-content-between align-items-center">
                        <span style="font-weight: bold">{{ $row->message }}</span>
                        <span>
                            <a href="{{route('not.delete',$row->id)}}" style="margin-right: 15px; color: red;"><i class="fas fa-trash"></i></a>
                            <a href="{{ route('not.check', $row->id) }}" style="color:white" class="fas fa-envelope"></a>
                        </span>
                    </li>
                @else
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span style="font-weight: bold">{{ $row->message }}</span>
                        <span>
                            <a href="{{route('not.delete',$row->id)}}" style="margin-right: 15px; color: red;"><i class="fas fa-trash"></i></a>
                            <i class="fas fa-envelope-open-text"></i>
                        </span>
                    </li>
                @endif

                    @endforeach
                </ul>
                <div class="w-75 " > {{ $nots->links() }}</div>
            </div>
        </div>

    </div>
@endsection

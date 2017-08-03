@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Daireler
            <span class="float-right">
                <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-Asset-2"></i></button>
            </span>
        </div>
        <input id="inputApartment" type="text" class="form-control" placeholder="Daire tipini giriniz..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
        <ul id="listApartments" class="list-group list-group-flush">

                <li class="list-group-item justify-content-between">
                    <form name="" method="post" action="{{URL::route('photo.parcelStore')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <span>
                            <label class="custom-file">
                                <i class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                                <input type="file" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
                            </label>
                            Tip 1
                        </span>
                    </form>
                    <form name="" method="post" action="{{URL::route('photo.parcelStore')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="">
                        <span>
                            <button class="btn btn-primary btn-sm rounded-circle"><i class="icon-update"></i></button>
                            <button class="btn btn-success btn-sm rounded-circle btn-margin-left" onclick="window.location='{{ url('designer') }}'"><i class="icon-designer"></i></button>
                            <button class="btn btn-danger btn-sm rounded-circle btn-margin-left"><i class="icon-delete"></i></button>
                            <button class="btn btn-success btn-sm rounded-circle btn-margin-left"><i class="icon-settings"></i></button>
                        </span>
                    </form>
                </li>

        </ul>
    </div>
@endsection
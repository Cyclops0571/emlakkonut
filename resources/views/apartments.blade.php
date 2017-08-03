@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Daireler
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
                            <button type="button" class="btn btn-warning btn-sm rounded-circle">
                                <i class="icon-designer"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-sm rounded-circle btn-margin-left"><img src="/img/checked.svg" style="width: 14px; height: 20px;"/></button>
                            <button type="button" class="btn btn-danger btn-sm rounded-circle btn-margin-left"><img src="/img/cancel.svg" style="width: 14px; height: 20px;"/></button>
                        </span>
                    </form>
                </li>

        </ul>
    </div>
@endsection
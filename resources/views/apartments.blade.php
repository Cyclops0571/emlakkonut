@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Daireler
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
            <input type="text" id="inputApartment" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
        </div>
        <ul id="listApartments" class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <form name="" method="post" action="{{URL::route('photo.parcelStore', $project->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <span>
                            <label class="custom-file">
                                <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                                <input type="file" class="form-control" aria-describedby="basic-addon1" onchange="fileUpload(this)">
                            </label>
                            Tip 1
                        </span>
                    </form>
                    <form name="" method="post" action="{{URL::route('photo.parcelStore', $project->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="">
                        <span>
                            <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle">
                                <i class="icon-designer"></i>
                            </button>
                            <button type="button" title="Aktifleştir" class="btn btn-success btn-sm rounded-circle btn-margin-left"><img src="/img/checked.svg" style="width: 14px; height: 21px;"/></button>
                            <button type="button" title="Pasifleştir" class="btn btn-danger btn-sm rounded-circle btn-margin-left"><img src="/img/cancel.svg" style="width: 14px; height: 21px;"/></button>
                        </span>
                    </form>
                </li>
        </ul>
    </div>
@endsection
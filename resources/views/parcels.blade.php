@extends('layouts.app')

@section('content')
    <div class="card card-size">
      <div class="card-header">
        Parseller
      </div>
      <input type="text" id="inputParcel" class="form-control" placeholder="Parsel tipini giriniz..."
             aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
      <ul id="listParcels" class="list-group list-group-flush">
        @foreach($project->Parcels as $parcel)
          <li class="list-group-item justify-content-between">
            <form name="{{$parcel->id}}" method="post" action="{{URL::route('photo.parcelStore')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$parcel->id}}">
              <span>
                <label class="custom-file">
                  <i class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                  <input type="file" name="photo" class="form-control" aria-describedby="basic-addon1" onchange="javascript:this.form.submit();">
                </label>
                Ada: {{$parcel->island->island_kkys}} - Parsel: {{$parcel->parcel}}
              </span>
            </form>
            <span>
              <button class="btn btn-warning btn-sm rounded-circle" type="button"
                      onclick="window.location='{{ URL::route('parcelDesigner', $parcel->id) }}'">
                <i class="icon-designer"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm rounded-circle btn-margin-left"><img src="/img/checked.svg" style="width: 14px; height: 20px;"/></button>
              <button type="button" class="btn btn-danger btn-sm rounded-circle btn-margin-left"><img src="/img/cancel.svg" style="width: 14px; height: 20px;"/></button>
            </span>
          </li>
        @endforeach
      </ul>
    </div>
@endsection
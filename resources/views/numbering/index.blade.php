@extends('layouts.app')

@section('content')
    <div class="card card-size">
        <div class="card-header">
            Numarataj
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><i class="icon-Search" style="font-size: 1.25rem;"></i></span>
            <input type="text" id="inputParcel" class="form-control" placeholder="Ara..." aria-describedby="basic-addon1" onkeyup="filter(this)" autofocus>
            <span class="input-group-addon">
          <form id="newNumbering" name="newNumbering" method="post" action="{{URL::route('numbering.create', $project->id)}}">
              {{csrf_field()}}
              <button type="button" title="Yeni Ekle" class="btn btn-primary btn-sm rounded-circle" onclick="window.location = '{{URL::route('numbering.create', $project->id)}}'">
                 <i class="icon-plus"></i>
             </button>
          </form>
      </span>
        </div>
        <ul id="listParcels" class="list-group list-group-flush">
            @foreach($project->numberings as $numbering)
                <li class="list-group-item d-flex justify-content-between"
                    style="{{$parcel->status !== 1 ? 'background-color:lightgrey': ''}}">
                    <form name="{{$numbering->id}}" method="post" action="{{URL::route('photo.numberingStore')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$parcel->id}}">
                        <span>
                <label class="custom-file">
                  @if($parcel->parcelPhoto)
                        <img src="{{$parcel->parcelPhoto->getThumbnailUrl()}}" class="list-img"/>
                    @else
                        <i title="Resim Ekle" class="btn btn-primary btn-sm rounded-circle"><i class="icon-plus"></i></i>
                    @endif
                    <input type="file" name="photo" class="form-control" aria-describedby="basic-addon1"
                           onchange="this.form.submit();">
                </label>
                Ada: {{$parcel->island->island_kkys}} - Numarataj: {{$parcel->parcel}}
              </span>
                    </form>
                    <form action="{{URL::route('toggleParcelStatus', $parcel->id)}}" method="post">
                        {{csrf_field()}}
                        <span>
              <button type="button" title="Tasarlayıcıda Aç" class="btn btn-warning btn-sm rounded-circle"
                      onclick="window.location='{{ URL::route('parcelDesigner', $parcel->id) }}'">
                <i class="icon-designer"></i>
              </button>
                            @if($parcel->status !== 1)
                                <button title="Aktifleştir" class="btn btn-success btn-sm rounded-circle btn-margin-left">
                    <img src="/img/checked.svg" style="width: 14px; height: 21px;"/>
                  </button>
                            @else
                                <button title="Pasifleştir" class="btn btn-danger btn-sm rounded-circle btn-margin-left">
                    <img src="/img/cancel.svg" style="width: 14px; height: 21px;"/>
                  </button>
                            @endif
            </span>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
@extends('layout.app')
@section('title', 'Radiolka | Strona główna')
@section('content')

  <fieldset style="text-align: center; margin-top: 40px;">
    <h2><b>Dodaj muzykę</b></h2>
    <center>
      <div class="card large">
        <div class="section album">
          <img hidden id="default_album" src="{{asset('/images/album_photo')}}" alt="">
          <img id="preview_image" src="{{asset('images/album_photo.png')}}" alt="" width="125px"style="float: left;">
          <input autocomplete="off" data-status="0" type="text" placeholder="Wykonawca" id="preview_author"></input>
          <input autocomplete="off" data-status="0" type="text" placeholder="Tytuł" id="preview_title"></input>
          <input autocomplete="off" data-status="0" type="text" placeholder="Album" id="preview_album" ></input>
        </div>
      </div>
      {!! Form::open(['action' => 'TrackController@store', 'method' => 'post', 'class' => '', 'id' => 'submit', 'autocomplete' => 'off']) !!}
        <div class="row">
          <div class="col-sm-3 col-sm-offset-3">
            <div class="autocomplete">
              {{Form::text('author','',['placeholder' => 'Wykonawca', 'class' => '', 'id' => 'author', 'onkeydown' => "findAuthor()", 'autocomplete' => 'off'])}}
            </div>
          </div>
          <div class="col-sm-3">
            <div class="autocomplete">
              {{Form::text('title','',['placeholder' => 'Tytuł', 'class' => '', 'id' => 'title', 'onkeydown' => "findTitle()"])}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            {{Form::hidden('album','')}}
            {{Form::hidden('image','')}}
            <!-- {{Form::submit('Wyślij',['type' => 'submit', 'id' => 'button', 'onclick' => 'findInfo()'])}} -->
            <button id="button" type="button" name="button" onclick="findInfo()">Wyślij</button>
          </div>
        </div>
      {!! Form::close() !!}
    </center>
  </fieldset>
  @include('table')
@endsection

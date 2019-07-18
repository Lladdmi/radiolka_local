<fieldset style="margin-top: 40px;">
  <div class="">
    <table id="table" class="display">
      <thead>
        <tr>
          <th>Okładka</th>
          <th>Wykonawca</th>
          <th>Tytuł</th>
          <th>Album</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tracks as $track)
        <tr>
          <td data-label="Okładka">
            @if($track->image)
              <img src="{{$track->image}}" alt="" width="125px;">
            @else
              <img src="{{asset('images/album_photo.png')}}" alt="" width="125px">
            @endif
          </td>
          <td data-label="Wykonawca">{{$track->author}}</td>
          <td data-label="Tytuł">{{$track->title}}</td>
          <td data-label="Album">
            @if($track->album)
            {{$track->album}}
            @else
            {!! Form::open(['action' => 'TrackController@update', 'method' => 'post', 'class' => '', 'id' => 'update', 'autocomplete' => 'off']) !!}
            {!! Form::close() !!}
            @endif
          </td>
          <td data-label="Data">{{$track->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</fieldset>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable( {
          "autoWidth": true,
          "order": [[ 4, 'desc' ]],
          "displayStart": 20,
          stateSave: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
            }
        } );
    } );

</script>

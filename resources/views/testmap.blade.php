@extends('layouts.app')
@section('content')

<div class="row" id="app">
    <gmap-map
    :center="{lat:51.508742, lng:-0.120850}"
    :zoom="7"
    style="width: 100%; height: 400px"
  >
  <gmap-marker
  :position="{lat:51.508742, lng:-0.120850}"
  :clickable="true"
></gmap-marker>
  </gmap-map>
</div>


@endsection



@push('scripts')
@endpush

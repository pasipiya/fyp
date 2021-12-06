<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    .list-group{
        overflow-y: scroll;
        height: 200px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row" id="app">
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAolyOarpY_ZRm-gR8i2MPkadw7JNKp-yc&callback=myMap"></script>
    <script>
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

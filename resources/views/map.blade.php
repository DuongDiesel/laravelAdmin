<html>
    <head lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
        中略
        
    </head>
<body>
    <div class="content">
        <div id="map" style="height:500px">
        </div>
        <script src="{{ asset('/js/result.js') }}"></script> //追加
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBKnLShvSaO30x2wxVJh7zocMd0VGt-e4w&callback=initMap" async defer>
        </script>
    </div>
    
</body>
</html>
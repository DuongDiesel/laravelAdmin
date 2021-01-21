<html>
    <head>
        <script type='text/javascript'>
            var centreGot = false;
        </script>
        
    </head>
<body>
    <div class="content">
        <div id="map" style="height:500px">
        </div>
        <script src="{{ asset('/js/result.js') }}"></script> //追加
        <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyBKnLShvSaO30x2wxVJh7zocMd0VGt-e4w&callback=initMap" async defer>
        </script>
    </div>
    <script src="{{mix('js/app.js')}}"
</body>
</html>
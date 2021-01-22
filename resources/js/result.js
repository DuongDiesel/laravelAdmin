var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');
 
mapboxgl.accessToken = 'pk.eyJ1IjoiZHVvbmdiZ3ZpcDIiLCJhIjoiY2trNm03ZXYwMDJxdTJ1bWZ3eGVhb3hzayJ9.9qpfbZpHtSS1qd1JLwwhLw';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11'
});
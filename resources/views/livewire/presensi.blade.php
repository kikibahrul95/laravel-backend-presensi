<div>
    <div class="container mx-auto max-w-sm">
        <div class="bg-white p-6 rounded-lg mt-3  shadow-lg" >
        <div class="grid grid-cols-1 md gap-6 mb-6">
  <div>
    <h2 class="text-2xl font-bold mb-2">Informasi Pegawai</h2>
    <div class="bg-gray-100 p-4 rounded-lg">
        <p><strong>Nama Pegawai :</strong> {{Auth::user()->name}}</p>
        <p><strong>Kantor :</strong>{{$schedule->office->name}}</p>
        <p><strong>Shift :</strong>{{$schedule->shift->name}} ({{$schedule->shift->start_time}} - {{$schedule->shift->end_time}}) wib</p>
  </div>
  <div class  ="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2">
 <div class = "bg-gray-100 p-4 rounded-lg">
   <h4 class="text-l font-bold mb-2"> Kehadiran</h4>
   <p><strong>07.30</p>
</div>
 <div class = "bg-gray-100 p-4 rounded-lg">
<h4 class="text-l font-bold mb-2"> Jam Masuk</h4>
<p><strong>16.30</p>
</div>

  </div>

  </div>

   
  <div>



</div>
<h2 class="text-2l font-bold mb-2">"Presensi</h2>
<div id="map" class ="mb-4 rounded-lg border border-gray-300"> </div>
<button type ="button" onclick="tagLocation()" class="px-4 py-2 bg-blue-500 text-white rounded"> Tag Location </button>
@if($insideRadius)
<button type ="button" class="px-4 py-2 bg-green-500 text-white rounded"> Submit Absen</button>
@endif
</div>
    </div>
    <script  src= "https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
   let map;
   let lat;
   let lng;
   const office =[{{$schedule->office->latitude}},{{$schedule->office->longitude}}];
   const radius = {{$schedule->office->radius}};
   let component;
   let marker;
        document.addEventListener('livewire:initilaized', function {
            component =@this
            const map = L.map('map').setView([{{$schedule->office->latitude}},{{$schedule->office->longitude}}],20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        

        const circle = L.circle(office,{
                color:'red',
                fillcolor: '#f03',
                fillOpacity: 0.5,
                radius:radius
            }
        ).addTo(map);

        })
       

        function tagLocation(){
            if (navigator.geolocation){
                navigator.geolocation.getCurrentPosition((position) =>{
                    const lat = position.coords.latitude;
                    const lng = position.coords.longtitude;

                    if (marker) {
                        map.removeLayer(marker);

                    }
                    marker = L.marker([lat,lng]).addTo(map);
                    map.setView([lat,lng], 15);

                    if(isWithinRadius (lat,lng,office, radius)){
                        component.set('insideRadius', true);
                    } else {
                        alert('Anda diluar radius');
                    }



 
                })
            } else {
                alert('Tidak Bisa Get Location');
            }
        }

        function isWithinRadius(lat, lng, center, radius) {
            let.distance = map.distance ([lat,lng] ,center);
            return distance <= radius;
        }



    </script>
</div>

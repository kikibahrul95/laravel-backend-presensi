<div>
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg mt-3  shadow-lg" >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
  <div>
    <h2 class="text-2xl font-bold mb-2">Informasi Pegawai</h2>
    <div class="bg-gray-100 p-4 rounded-lg">
        <p><strong>Nama Pegawai :</strong> {{Auth::user()->name}}</p>
        <p><strong>Kantor :</strong>{{$schedule->office->name}}</p>
        <p><strong>Shift :</strong>{{$schedule->shift->name}} ({{$schedule->shift->start_time}}- {{$schedule->shift->end_time}})</p>
  </div>
  <div>



</div>
<h2 class="text-2l font-bold mb-2">"Presensi</h2>
<div id="map" class ="mb-4 rounded-lg border border-gray-300"> </div>
<button type ="button" class="px-4 py-2 bg-blue-500 text-white rounded"> Tag Loacation </button>

</div>
    </div>
    <script  src= "https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map =L.map('map').setView([-6.200000, 106.816666], 5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    </script>
</div>

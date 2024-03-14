@extends('layout.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Silahkan absen keluar</div>
    <div class="right"></div>
</div>
<style>
    .webcam-capture,
    .webcam-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }

    #map { height: 180px; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@endsection
@section('content')
    <div class="row" style="margin-top:60px">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture" > </div>

    </div>

     <button type="button" data-toggle="modal" data-target="#takeabsen2" class="btn btn-warning">
        <ion-icon name="camera-outline"></ion-icon>
        Absen keluar</button>

    <div id="takeabsen2" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title">Input Data absen keluar</h4>
       </div>
       <div class="modal-body">
            <label>Pilih Lokasi</label>
            <select id="lokasiout"class="form-control" aria-label="Default select example" style="width: 100%">
            </select>
        </div>
        <div class="modal-body">
         <label>Nama PIC</label>
         <input type="text" name="nama" id="picc" class="form-control" />
        </div>
        <div class="modal-body">
         <label>Keterangan</label>
         <textarea name="alamat" id="keterangan" class="form-control">
         </textarea>
         <br />
        </div>
        <div class="modal-body">
         <button id="takeabsenkeluar" class="btn btn-danger btn-block">
             <ion-icon name="camera-outline"></ion-icon>
             absen keluar
          </button> 
        </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>


   





    




       
    <div class="row mt-2">
        <div class="col">
        <div id="map"></div>
        </div>
    </div>

   
@endsection
@push('myscript')
<script>
    Webcam.set({
      height:480,
      width :640,
      image_format: 'jpg',
      jpeg_quality: 80
    });

    Webcam.attach('.webcam-capture');


    var lokasi = document.getElementById('lokasi');
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(succesCallback, errorCallback);
    }
    function succesCallback(position){
        lokasi.value = position.coords.latitude + "," +position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        var circle = L.circle([position.coords.latitude, position.coords.longitude], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 20
        }).addTo(map);


    }
    function errorCallback() {
    }
    
    $(document).ready(function(){

$("#lokasiout").select2({
    placeholder:'Pilih Lokasi',
    ajax: {
        url: "{{route('create.action')}}",
        processResults: function({data}){
            return {
                results: $.map(data, function(item){
                    return {
                        id:item.lokasi_id,
                        text: item.nama_lokasi
                    }
                })
            }
        }
    }
});
});


    $('#takeabsenkeluar').click(function(e){
        Webcam.snap(function(url){
           image = url;
        });
    
        var lokasi =$('#lokasi').val();
        var lokasiout =$('#lokasiout').val();
        var picc =$('#picc').val();
        var keterangan=$('#keterangan').val();
       // var lok =$('#lok)').val();
        $.ajax({
        type:'POST',
        url:'/presensi/storee',
        data:{
           _token:"{{ csrf_token()}}"
           ,image:image
           ,lokasi:lokasi
           ,lokasiout:lokasiout
           ,picc:picc
           ,keterangan:keterangan
          // ,lok:lok
        }

        , cache:false
        , success:function (respond){
            var status = respond.split("|");
           if(status[0] == "success"){
              
            Swal.fire({
            title: 'Berhasil!',
            text: status[1],
            icon: 'success',
            confirmButtonText: 'oke'
            })
            setTimeout("location.href='/dashboard'", 3000);
           }
           else{
            Swal.fire({
            title: 'Gagal !!',
            text: 'Ulangi Kembali Absen',
            icon: 'error',
            confirmButtonText: 'oke'
           });

        }
    }   
});
    });

        
       

</script>
@endpush
    


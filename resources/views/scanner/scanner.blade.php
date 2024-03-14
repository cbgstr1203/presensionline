@extends('layout.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Scanner</div>
    <div class="right"></div>
</div>
@endsection

@section('content')

<div class="container col-lg-6 py-5">
  <div class="card bg-white shadow rounded-3 p-3 border-0">
  <div class="scanner"> </div>
    <video id="preview"></video>
  </div>
</div>
<div class="row" style="margin-top:100px">
  <textarea name="Hasil scan" id="hasil_scan" class="form-control">
          </textarea>
</div>


@endsection

@push('myscript')
<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    console.log(content);
  });
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });

  scanner.addListener('scan',function (c){
    document.getElementById('hasil_scan').value = c;
  })
  
</script>
@endpush

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 }
.tabledatakaryawan{
    margin-top: 20px;
    padding: 10px;
}
.tablepresensi{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
   
}
.tablepresensi>tr,th{
    border: 2px solid #dfdcdc;
    padding: 10px;
    background-color: #a5a5a5
}
.tablepresensi>tr,td{
    padding: 10px;
}
.avatar{
    width: 80px;
    height: 80px;
}

body.A4.landscape .sheet {
    width: 297mm !important;
    height: auto  !important;
}

</style>


</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">


  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

   <table style="width: 100%" >
    <tr>
        <td>
            <img src="{{asset ('assets/img/pwl_logo.png')}}" width="150" height="100" alt="">
        </td>
        <td>
            <h2>
                LAPORAN PRESENSI
                       {{strtoupper($namabulan[$bulan])}} {{$tahun}}
                
            </h2>

        </td>
    </tr>
   </table>

<table class="tabledatakaryawan">
    <tr>
        <td>
            @php
                $path = Storage::url('/uploads/karyawan/'.$karyawann->foto);
            @endphp
            <img src="{{url($path)}}"alt="avatar" class="imaged w64" style="height: 150px">
        </td>
        <td>
           <h4>
                NAMA
                <br>
                <br>
                NIK
                <br>
                <br>
                Departemen
                <br>
                <br>
                Telepon
           </h4>
        </td>
        <td>
                :{{strtoupper($karyawann->nama_lengkap)}}
                <br>
                <br>
               :{{strtoupper($karyawann->nik)}}
                <br>
                <br>
              :{{strtoupper($karyawann->nama_dept)}}
                <br>
                <br>
              :{{strtoupper($karyawann->no_hp)}}

        </td>
    </tr>
</table>



   <table class="tablepresensi">
    <tr>
    <th>No.</th>
    <th>Tanggal</th>
    <th>Nik</th>
    <th>Nama</th>
    <th>Lokasi</th>
    <th>jam In</th>
    <th>Foto In</th>
    <th>Jam Out</th>
    <th>Foto Out</th>
    <th>Pic</th>
    <th>Keterangan</th>
    </tr>
    @foreach ($presensi as $ad)
          @php
              $foto_masuk = Storage::url('uploads/absensi/'.$ad->FOTO_MASUK);
              $foto_keluar = Storage::url('uploads/absensi/'.$ad->FOTO_KELUAR);
             // $durasi = selisih ($ad->JAM_MASUK,$ad->JAM_KELUAR);
           //   $jamawal= $ad->JAM_MASUK;
             // $jamakhir= $ad->JAM_KELUAR; 
              //$durasi = $jamawal-$jamakhir;
              //$jam=floor($durasi/(60*60));
              //$menit = $durasi-$jam;
@endphp
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$ad->TANGGAL }}</td>
          <td >{{strtoupper($ad->NIK)}}        </td>
          <td >{{$ad->NAMA }}</td>
          <td>{{$ad->LOKASI }}</td>
          <td>
              {{$ad->JAM_MASUK }}
             
              </td>
              <td>
                <img id="img_in" src="{{ url($foto_masuk)}}" class="avatar" alt="img_in"> 
              </td>
          <td>
             {{$ad->JAM_KELUAR != null ? $ad->JAM_KELUAR :'Tidak Absen'}}
              </td>
              <td>
                @if ($ad->JAM_KELUAR != null)
                <img id="img_in" src="{{ url($foto_keluar)}}" class="avatar" alt="img_in"> 
                 @else
                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.297 4.289a.997 .997 0 0 1 .703 -.289h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v8m-1.187 2.828c-.249 .11 -.524 .172 -.813 .172h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1c.298 0 .58 -.065 .834 -.181" /><path d="M10.422 10.448a3 3 0 1 0 4.15 4.098" /><path d="M3 3l18 18" /></svg>
                 @endif
              </td>
          <td>{{$ad->PIC}}</td>
          <td>{{$ad->KETERANGAN}}</td>
          </tr>
          @endforeach



   </table>

  </section>

</body>

</html>
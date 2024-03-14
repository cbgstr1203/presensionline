@foreach ($adminhistory as $ad)
@php
    $foto_masuk = Storage::url('uploads/absensi/'.$ad->FOTO_MASUK);
    $foto_keluar = Storage::url('uploads/absensi/'.$ad->FOTO_KELUAR);
@endphp
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$ad->TANGGAL }}</td>
<td >{{$ad->NIK }}</td>
<td >{{$ad->NAMA }}</td>
<td>{{$ad->LOKASI }}</td>
<td>
    <a class="badge badge-success" > {{$ad->JAM_MASUK }}   </a> 
    <a href="{{ url($foto_masuk)}}" class="avatar">
        <img id="img_in"  href="{{ url($foto_masuk)}}" src="{{ url($foto_masuk)}}" class="avatar" alt="img_in"> 
        <!-- Photo -->
        
        <div class="img-responsive img-responsive-1x1 rounded border" style="background-image: {{ url($foto_masuk)}}"></div>
        
    </a>
    </td>
<td>
    <a class="badge badge-danger" >{{$ad->JAM_KELUAR != null ? $ad->JAM_KELUAR :'Belum absen'}}</a>
        @if ($ad->JAM_KELUAR != null)
        <img id="img_in" src="{{ url($foto_keluar)}}" class="avatar" alt="img_in"> 
         @else
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.297 4.289a.997 .997 0 0 1 .703 -.289h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v8m-1.187 2.828c-.249 .11 -.524 .172 -.813 .172h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1c.298 0 .58 -.065 .834 -.181" /><path d="M10.422 10.448a3 3 0 1 0 4.15 4.098" /><path d="M3 3l18 18" /></svg>
         @endif
      
    </a>

    </td>
<td>
     <a href="https://www.google.com/maps/place/+{{$ad->LOKASI_MASUK}}" target="_blank" class="btn btn-primary tampilkanpeta" >
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
     </a>
</td>
<td>
    <a href="https://www.google.com/maps/place/+{{$ad->LOKASI_MASUK}}" target="_blank" class="btn btn-primary tampilkanpeta2" >
   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
    </a>
</td>



<td>{{$ad->PIC}}</td>
<td>{{$ad->KETERANGAN}}</td>
</tr>
@endforeach
 
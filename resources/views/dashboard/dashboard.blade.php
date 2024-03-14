@extends('layout.presensi')
@section('content')

<div class="section" id="user-section">
    <div id="user-detail">
        <div class="avatar">
            @if(!empty(Auth::guard('karyawan')->user()->foto))
            @php
                $path = Storage::url('/uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
            @endphp
            <img src="{{url($path)}}"alt="avatar" class="imaged w64" style="height: 80px">
            @else
            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
            @endif
        </div>
        <div id="user-info">
            <h2 id="user-name">{{$nama}}</h2>
            <span id="user-role">{{strtoupper($profil->nama_dept)}}</span>
        </div>
    </div>
</div>

<div class="section" id="menu-section">
    <div class="card">
        <div class="card-body text-center">
            <div class="list-menu">
                <div class="item-menu text-center">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fingerprint" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3260cd" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" /><path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" /><path d="M12 11v2a14 14 0 0 0 2.5 8" /><path d="M8 15a18 18 0 0 0 1.8 6" /><path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" /></svg>
                    </div>
                    <div class="menu-name">
                        <span class="text-center">Total Absen Hari ini</span>
                    </div>
                    <div class="totalabsen" style="font-size: 30px" >
                              {{$hitungabsen->count()}}
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section mt-2" id="presence-section">
    <div class="todaypresence">
        <div class="row">
            <div class="col-6">
                <a href="./create" class="item">
                <div class="card gradasigreen">
                    
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                                <ion-icon name="camera"></ion-icon>
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Absen Masuk</h4>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </a>
            </div>
            <div class="col-6">
                <a href="./createout" class="item">
                <div class="card gradasired">
                   
                    <div class="card-body">
                        <div class="presencecontent">
                            <div class="iconpresence">
                                <ion-icon name="camera"></ion-icon>
                            </div>
                            <div class="presencedetail">
                                <h4 class="presencetitle">Absen Pulang</h4>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </a>
            </div>

        </div>
        <div class="presencetab mt-2">
            
            <ul class="nav nav-tabs style1" role="tablist">
                
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                       Tanggal Hari ini {{$hariini}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-2" style="margin-bottom:100px;">
        <ul class="listview image-listview">
            @foreach ($historyhariini as $d)
            <li>
                <div class="item">
                    <div class="in">
                        <td><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-fingerprint" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3260cd" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3" /><path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6" /><path d="M12 11v2a14 14 0 0 0 2.5 8" /><path d="M8 15a18 18 0 0 0 1.8 6" /><path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95" /></svg></td>
                        <div>{{ $d->LOKASI}}</div>
                        <span class="badge badge-success">{{$d->JAM_MASUK }}</span>
                        <span class="badge badge-danger">{{$d->JAM_KELUAR != null ? $d->JAM_KELUAR :'Belum absen'}}</span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
            </div>
        </div>
        
    </div>



    
</div>
@endsection
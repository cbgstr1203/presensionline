@extends('layout.admin.tabler')
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data karyawan</h3>
    </div>

    
  <div class="col-12">
  <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#inputkary">
   Tambah data
  </a>  
    <div id="inputkary" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title">Input Data karyawan</h4>
       </div>

       <form action="/karyawan/store" method="POST" id="simpan" enctype="multipart/form-data">
        @csrf
       <div class="modal-body">
        <label>Nik</label>
         <input type="text" name="nik" id="nik" class="form-control" />
         <label>Nama Lengkap</label>
         <input type="text" name="nama" id="nama" class="form-control" />
         <br />
         <label>Departemen</label>
         <select name="dept_kode" id="dept_kode" class="form-control" >
          <option value="">Pilih Departemen</option>
          @foreach($datadept as $dd)
          <option {{Request('dept_kode')== $dd->dept_kode ?'selected':'' }}value="{{ $dd->dept_kode}}"> {{$dd->nama_dept}} </option>
          @endforeach
         </select>

         <br />
         <label>Nomor telepon</label>
         <input  name="nomor" id="nomor" class="form-control">
         <br />
         <label>Password</label>
         <input name="password" id="password" class="form-control">
         </textarea>
         <br />
        
         <button class="btn btn-danger btn-block">
             <ion-icon name="camera-outline"></ion-icon>
           Simpan
          </button> 
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
    </form>
  </div>

    <form action="/panel/karyawan" method="get">
    <div class="card-body border-bottom py-3">
      <div class="d-flex">
        <div class="ms-auto text-secondary">
          <div class="ms-2 d-inline-block">
            <input type="text" name="nama" class="form-control w-75 d-inline" id="nama" placeholder="Cari Nama" value="{{Request('nama')}}">
          </div>
          <div class="ms-2 d-inline-block">
            <select name="dept" id="dept" class="form-select" style="font-size: 16px"> 
            <option value="">Departemen</option>
            @foreach ($datadept as $k)
                <option {{Request('dept')==$k->dept_kode?'selected':''}} value="{{$k ->dept_kode}}"> {{$k->nama_dept}}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
      </div>
   
    
        </div>
        
    </div>
    </div>
    </form>

    <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
          </div>
          <div class="modal-body" id="loadeditform">
         </div>
      </div>
    </div>
    </div>


    
    <div class="table-responsive">

      
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th></th>
            <th>Departemen</th>
            <th>Nomor hp</th>
            <th>Foto</th>
            <th>Action</th>

          </tr>

        </thead>
        <tbody>
       @foreach ($datakaryawan as $db)
       @php
         $path = Storage::url('uploads/karyawan/'.$db->foto);
       @endphp
         <tr>
         <td>{{$loop->iteration + $datakaryawan->firstItem()-1}}</td>
         <td>{{$db->nik}}</td>
         <td>{{$db->nama_lengkap}}<td>
         <td>{{$db->nama_dept }}</td>
         <td>{{$db->no_hp }}</td>
         <td>
          @if(empty($db->foto))
           <img src="{{asset('assets/img/nofoto.png')}}" alt="" class="avatar">
          @else
          <img src="{{url($path)}}" alt="" class="avatar">
          @endif

          </td>
          <td> 
            <div class="d-flex">
            <a href="#" class="edit" nik={{$db->nik}}>
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#584def" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
            </a>
            <form method="POST" action="/departemen/{{$db->nik}}/delete" >
              @method('DELETE')
              @csrf
              <a href="" class="show_confirm" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e01f1f" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3" /></svg>
            </a> 
            </form>
            </div>
          </td>

          </tr>
          @endforeach
      </table>
      {{$datakaryawan->links('vendor.pagination.bootstrap-5')}}
  </div>
</div>
</div>
</div>
</div>

@endsection

@push('myscriptt')

<script>
$(function(){

$('#simpan').submit(function(){

       var nik =$('#nik').val();
       var nama =$("#nama").val();
       var divisi =$("#divisi").val();
       var nomor =$("#nomor").val();
       var password =$("#password").val();
       var dept_kode =$("#dept_kode").val();

        if (nik==""){
          alert('nik harus di isi');
          $("#nik").focus();
          return false;
        }

        if (nama==""){
          alert('nama harus di isi');
          $("#nama").focus();
          return false;
        }
        if (divisi==""){
          alert('divisi harus di isi');
          $("#divisi").focus();
          return false;
        }

        if (nomor==""){
          alert('nomor harus di isi');
          $("#nomor").focus();
          return false;
        }

        if (password==""){
          alert('password harus di isi');
          $("#password").focus();
          return false;
        }

        if (dept_kode==""){
          alert('departemen harus di isi');
          $("#dept_kode").focus();
          return false;
        }
      });
      
      $('.edit').click(function(){
       var nik=$(this).attr('nik');
       $.ajax({
        type:'POST',
        url:'/karyawan/edit',
        cache:false,
        data:{
          _token:"{{csrf_token ();}}",
         nik:nik
        },
        success:function(respond){
          $('#loadeditform').html(respond);
        }
       });
       $("#modal-editkaryawan").modal("show");

      });


    });

</script>

@endpush
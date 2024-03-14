@extends('layout.admin.tabler')
@section('content')

<div class="page-body">

<div class="container">
 <div class="row">    
<div class="col-12">
    <div class="card">
        <div class="my-4 col-12">
            <h1 class="float-left">Daftar Lokasi</h1>
          </div>

          <div class="col-12">
            <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#inputlok">
             Tambah data
            </a>
            <div class="modal modal-blur fade" id="inputlok" tabindex="-1" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">  
      
                <div class="modal-content">
                 <div class="modal-header">
                  <h4 class="modal-title">Input Data karyawan</h4>
                 </div>
          
    <form action="/lokasi/store" method="POST" id="simpanlokasi" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
    <h3>Form Tambah Lokasi</h3>
    <div class="form-group">
    <label>Nama Lokasi</label>
    <input class="form-control" type="text" name="nama_lokasi" id="nama_lokasi">
    </div>
    <div class="form-group">
    <label>Alamat</label>
    <input class="form-control" type="text" name="alamat" id="alamat">
    </div>
    <div class="form-group">
    <label>Nomor telepon</label>
    <input class="form-control" type="text" name="nomor_telepon" id="nomor_telepon">
    </div>
                  
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
  
            <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                  </div>
                  <div class="modal-body" id="loadeditform">
                 </div>
              </div>
            </div>
            </div>       
            
            <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="modal-title">Are you sure?</div>
                    <div>If you proceed, you will lose all your personal data.</div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                  
                  </div>
                </div>
              </div>
            </div>

          
          




      <div class="card-body border-bottom py-3">
        <div class="d-flex">
          <div class="text-secondary">
            Show
            <div class="mx-2 d-inline-block">
              <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
            </div>
            entries
          </div>
          <div class="ms-auto text-secondary">
            Search:
            <div class="ms-2 d-inline-block">
              <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
              </th>
              <th>Nama Lokasi</button></th>
              <th>Alamat</button></th>
              <th>Kota</button></th>
              <th>Nomor hp</button></th>
              <th>action</button></th>
            </tr>

          </thead>
          <tbody>
            <tr>
      
         @foreach ($datalokasi as $dl)
         <td>{{$loop->iteration + $datalokasi->firstItem()-1}}</td>
           <td>{{$dl->nama_lokasi }}</td>
           <td>{{$dl->alamat_lokasi }}</td>
           <td>{{$dl->kota }}</td>
           <td>{{$dl->telepon }}</td>
              <td> 
            <div class="d-flex">
            <a href="#" class="edit" lokasi_id={{$dl->lokasi_id}}>
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#584def" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
            </a>
            <form method="POST" action="/lokasi/{{$dl->lokasi_id}}/delete" >
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
        {{$datalokasi->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>
</div>
 </div>
</div>

@endsection

@push('myscriptt')

<script>
$(function(){

  $('#simpanlokasi').submit(function(){
         var nama_lokasi =$("#nama_lokasi").val();
         var alamat =$("#alamat").val();
         var nomor_telepon =$("#nomor_telepon").val();
  
  
        });

      $('.edit').click(function(){
       var lokasi_id=$(this).attr('lokasi_id');
       $.ajax({
        type:'POST',
        url:'/lokasi/edit',
        cache:false,
        data:{
          _token:"{{csrf_token ();}}",
         lokasi_id:lokasi_id
        },
        success:function(respond){
          $('#loadeditform').html(respond);
        }
       });
       $("#modal-editkaryawan").modal("show");

      });

      $('.delete').click(function(){
       $("#modal-delete").modal("show");
      });
    
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          event.preventDefault();
          swal.fire({
            title: 'Apakah yakin?',
            text: "Data terhapus tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya,Hapus!'
          })
          .then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Hapus!',
                'Data berhasil di hapus',
                'Berhasil'
                )
            }
        });
      });
    });
  
  </script>
  
  @endpush
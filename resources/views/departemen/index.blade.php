@extends('layout.admin.tabler')
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data departemen</h3>
    </div>

    
  <div class="col-12">
  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#inputdept">
   Tambah data
  </a>  

  <div class="modal modal-blur fade" id="inputdept" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Departement</h5>
        </div>
        <div class="modal-body" >
          <form action="/departemen/store" method="POST" id="simpandept" enctype="multipart/form-data">
            @csrf
              <fieldset class="form-fieldset">
                <div class="mb-3">
                  <label class="form-label required"> Kode Departemen</label>
                  <input class="form-control" type="text"  name="kode_dept"  id="kode_dept" placeholder="Masukkan kode departemen">
                </div>
            
                <div class="mb-3">
                  <label class="form-label required">Nama Departemen</label>
                  <input class="form-control" type="text" name="nama_dept" id="nama_dept" placeholder="masukkan Nama departemen">
                </div>
                  <div class="mb-3">
                    
                     <div class="modal-footer">
                      <button class="btn btn-primary "> <ion-icon name="camera-outline"></ion-icon>
                        Simpan
                       </button> 
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
                  </div>
                  
                </div>
              <fieldset>
               </form>

       </div>
    </div>
  </div>
  </div>

  





 <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Departemen</h5>
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
            <th class="w-1">No</th>
            <th>Kode dept</th>
            <th>Nama Departemen</th>
            <th>Action</th>
    

          </tr>

        </thead>
        <tbody>
          <tr>
          <?php $no=1;?>
       @foreach ($datadept as $dd)
         <td>{{$no}}</td>
         <td>{{$dd->dept_kode }}</td>
         <td>{{$dd->nama_dept}}</td>
         <td> 
          <div class="d-flex">
          <a href="#" class="edit" dept_kode={{$dd->dept_kode}}>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#584def" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
          </a>
          <form method="POST" action="/departemen/{{$dd->dept_kode}}/delete" >
            @method('DELETE')
            @csrf
            <a href="" class="show_confirm" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e01f1f" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3" /></svg>
          </a> 
          </form>
          </div>
        </td>
          </tr>
            <?php $no++ ;?>
          @endforeach


      </table>
  </div>
</div>
</div>
</div>
</div>

@endsection

@push('myscriptt')

<script>
$(function(){

$('#simpandept').submit(function(){
       var kode_dept =$('#kode_dept').val();
       var nama_dept =$("#nama_dept").val();
        if (kode_dept==""){
          alert('kode departemen harus di isi');
          $("#kode_dept").focus();
          return false;
        }
        if (nama_dept==""){
          alert('nama departemen harus di isi');
          $("#nama_dept").focus();
          return false;
        }
     
      });

      $('.edit').click(function(){
       var dept_kode=$(this).attr('dept_kode');
       $.ajax({
        type:'POST',
        url:'/departemen/edit',
        cache:false,
        data:{
          _token:"{{csrf_token ();}}",
         dept_kode:dept_kode
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
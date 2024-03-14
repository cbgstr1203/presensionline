@extends('layout.admin.tabler')
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Users</h3>
    </div>

    
  <div class="col-12">
  <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#inputkary">
   Tambah data
  </a>  
    <div id="inputkary" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title">Input Data Users</h4>
       </div>

       <form action="/user/store" method="POST" id="simpan" enctype="multipart/form-data">
        @csrf
       <div class="modal-body">
        <label>ID</label>
         <input type="text" name="id" id="id" class="form-control" />
         <label>Nama Lengkap</label>
         <input type="text" name="nama" id="nama" class="form-control" />
         <br />
         <label>Email</label>
         <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
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
            <th><button class="table-sort" data-sort="sort-nik">IG</button></th>
            <th><button class="table-sort" data-sort="sort-nama">Nama</button></th>
            <th><button class="table-sort" data-sort="sort-divisi">Email</button></th>
          </tr>

        </thead>
        <tbody>
          <tr>
          <?php $no=1;?>
       @foreach ($datauser as $db)
         <td>{{$no}}</td>
         <td data-sort="sort-nik">{{$db->id }}</td>
         <td data-sort="sort-nama">{{$db->name }}</td>
         <td data-sort="sort-divisi">{{$db->email }}</td>
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

$('#simpan').submit(function(){

       var id =$('#id').val();
       var nama =$("#nama").val();
       var email =$("#email").val();
       var password =$("#password").val();

        if (id==""){
          alert('id harus di isi');
          $("#id").focus();
          return false;
        }

        if (nama==""){
          alert('nama harus di isi');
          $("#nama").focus();
          return false;
        }
        if (email==""){
          alert('Email harus di isi');
          $("#email").focus();
          return false;
        }

        if (password==""){
          alert('password harus di isi');
          $("#password").focus();
          return false;
        }
      });
    });

</script>

@endpush
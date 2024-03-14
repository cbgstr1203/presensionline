
<form action="/departemen/{{$datadept->dept_kode}}/update" method="post" enctype="multipart/form-data" id="formdept">
    @csrf
<fieldset class="form-fieldset">
    <div class="mb-3">
      <label class="form-label required">Kode Dept</label>
      <input type="text" class="form-control" autocomplete="off" value="{{$datadept->dept_kode}}" name="dept_kode" id="kode_dept" readonly>
    </div>
    <div class="mb-3">
      <label class="form-label required">Nama Departemen</label>
      <input type="text" class="form-control" autocomplete="off" value="{{$datadept->nama_dept}}" name="nama_dept" id="nama_dept">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" >Save changes</button>
    </div>
    
  </fieldset>
</form>
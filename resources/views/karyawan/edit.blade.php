
<form action="/karyawan/{{$datakaryawan->nik}}/update" method="post" id="loadeditform">
    @csrf
<fieldset class="form-fieldset">
  <div class="mb-3">
    <label class="form-label required">NIK</label>
    <input type="text"  class="form-control" autocomplete="off" name="nama" value="{{$datakaryawan->nik}}" readonly>
  </div>
    <div class="mb-3">
      <label class="form-label required">Nama Lengkap</label>
      <input type="text"  class="form-control" autocomplete="off" name="nama" value="{{$datakaryawan->nama_lengkap}}">
    </div>
    <div class="mb-3">
      <label class="form-label required">Departemen</label>
      <select name="dept_kode" id="dept_kode" class="form-control" >
        <option value=""></option>
        @foreach($datadept as $dd)
        <option {{Request('dept_kode')== $dd->dept_kode ?'selected':'' }}value="{{ $dd->dept_kode}}"> {{$dd->nama_dept}} </option>
        @endforeach
       </select>
       </div>
    <div class="mb-3">
      <label class="form-label required">Nomor telepon</label>
      <input type="tel" class="form-control" autocomplete="off" name="nomor" value="{{$datakaryawan->no_hp}}">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="tel" class="form-control" autocomplete="off" name="password">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    
  </fieldset>
</form>
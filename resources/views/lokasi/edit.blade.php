
<form action="/lokasi/{{$datalokasi->lokasi_id}}/update" method="post" id="loadeditform">
    @csrf
<fieldset class="form-fieldset">
    <div class="mb-3">
      <label class="form-label required">Nama Lokasi</label>
      <input type="text"  class="form-control" autocomplete="off" name="nama" value="{{$datalokasi->nama_lokasi}}">
    </div>
    <div class="mb-3">
      <label class="form-label required">alamat lokasi</label>
      <input type="text" class="form-control" autocomplete="off" name="alamat" value="{{$datalokasi->alamat_lokasi}}">
    </div>
    <div class="mb-3">
      <label class="form-label">kota</label>
      <input type="tel" class="form-control" autocomplete="off" name="kota" value="{{$datalokasi->kota}}">
    </div>
    <div class="mb-3">
        <label class="form-label">telepon</label>
        <input type="number" class="form-control" autocomplete="off" name="telepon" value="{{$datalokasi->telepon}}">
      </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    
  </fieldset>
</form>
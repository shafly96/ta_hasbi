@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
    <h1>Form Galangan</h1>
  </div>
</div>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nama Galangan</label>
      <input type="text" class="form-control" placeholder="Nama Galangan" name="nama">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Logo</label>
      <input type="file" class="form-control-file" name="logo">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label>Deskripsi</label>
      <textarea class="form-control" rows="4"></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Jenis Kapal</label>
      <select class="form-control" name="jeniskapal">
        <option>1</option>
        <option>2</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label>Jenis Ukuran</label>
      <select class="form-control" name="jenisukuran">
        <option>1</option>
        <option>2</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <a href="{{url('')}}/galangan/create" class="btn btn-primary" role="button" style="margin-top: 20px">Simpan</a>
    </div>
  </div>
</form>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "lengthChange": false,
      "searching": false,
      "iDisplayLength": 5
    });
  });
</script>
@endpush
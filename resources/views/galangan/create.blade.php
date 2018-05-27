@extends('layouts.index')

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
    <h1>Form Galangan</h1>
  </div>
</div>
<form method="POST" action="{{url('')}}/galangan/store" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nama Galangan</label>
      <input type="text" class="form-control" placeholder="Nama Galangan" name="nama" required>
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
      <textarea class="form-control" rows="4" name="deskripsi" required></textarea>
    </div>
  </div>
  <!-- <div class="form-row">
    <div class="form-group col-md-4">
      <label>Jenis Kapal</label>
      <select class="form-control" name="jenis_kapal">
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label>Jenis Ukuran</label>
      <select class="form-control" name="jenis_ukuran">
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </div>
  </div> -->
  <div class="form-row">
    <div class="form-group col-md-5">
      <button class="btn btn-primary" type="submit" style="margin-top: 20px">Simpan</button>
    </div>
  </div>
</form>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
@endpush
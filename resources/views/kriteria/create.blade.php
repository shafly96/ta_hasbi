@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
    <h1>Form Kriteria</h1>
  </div>
</div>
<form method="POST" action="{{url('')}}/kriteria/store" enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Nama Kriteria</label>
      <input type="text" class="form-control" placeholder="Nama Kriteria" name="kriteria">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label>Sub-Kriteria</label>
      <div id="tempat_tambah">
        <input type="text" class="form-control" name="input[]" placeholder="Isi Kriteria">
      </div>
      <button class="btn btn-sm btn-info" id="tombol_tambah" style="margin-top: 20px"><i class="fas fa-plus-circle"></i></button>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <button class="btn btn-primary" type="submit" style="margin-top: 20px">Simpan</button>
    </div>
  </div>
</form>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
  $(document).ready(function(){

    var max_fields      = 10;
    var wrapper         = $("#tempat_tambah");
    var add_button      = $("#tombol_tambah");

    var x = 0;
    $(add_button).click(function(e){
      e.preventDefault();
      if(x < max_fields){
        $(wrapper).append('<div><input type="text" class="form-control" style="margin-top:10px" name="input[]" placeholder="Isi Kriteria "><button class="btn btn-sm btn-danger hapus" style="margin-top: 8px"><i class="fas fa-times"></i></button></div>');
        x++;
      }
    });

    $(wrapper).on("click",".hapus", function(e){
      e.preventDefault(); 
      x--;
      $(this).parent('div').remove();
    });
  });
</script>
@endpush
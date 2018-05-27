@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-6">
    <h1>History Perhitungan</h1>
  </div>
  <div class="col-md-5" style="text-align: right; margin-top: 10px">
    @if(session('success'))
    <div class="alert" role="alert" style="color: green">
      <b>{{session('success')}}</b>
    </div>
    @endif

    @if(session('failed'))
    <div class="alert" role="alert" style="color: red">
      <b>{{session('failed')}}</b>
    </div>
    @endif
  </div>
  <div class="col-md-1" style="">
    <a href="#" class="btn btn-primary btn-sm" role="button" style="float: right; margin-top: 20px" data-toggle="modal" data-target="#modal"><i class="fas fa-plus-circle"></i></a>
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Created</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nama</th>
        <th>Created</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="{{url('')}}/perhitungan/store">
          {!! csrf_field() !!}
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Nama Perhitungan</label>
              <input type="text" class="form-control" placeholder="Nama Perhitungan" name="nama">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Galangan</label>
              <select class="js-example-basic-multiple" name="galangan[]" multiple="multiple" style="width:100% !important">
                @foreach($galangan as $value1)
                <option value="G{{$value1->id}}">{{$value1->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Sub Kriteria</label>
              <select class="js-example-basic-multiple" name="subkriteria[]" multiple="multiple" style="width:90% !important">
                @for($i=0; $i<count($subkriteria); $i++)
                @if($i==0) <optgroup label="{{$subkriteria[$i]->kriteria}}"> @endif
                @if($i>0 && $subkriteria[$i-1]->kriteria != $subkriteria[$i]->kriteria) <optgroup label="{{$subkriteria[$i]->kriteria}}"> @endif
                <option value="S{{$subkriteria[$i]->id}}">{{$subkriteria[$i]->sub_kriteria}}</option>
                @if($i<43 && $subkriteria[$i+1]->kriteria != $subkriteria[$i]->kriteria) </optgroup> @endif
                @endfor
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <button class="btn btn-sm btn-primary" type="submit">Next</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "lengthChange": false,
      "searching": false,
      "iDisplayLength": 5,
      destroy: true,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: '{!! route('perhitungan.data') !!}',
      columns: [
      { data: 'nama' },
      { data: 'created_at' },
      { 
        data: null, 
        searchable: false,
        render: function(data) {
          return '<a href="{{url('')}}/perhitungan/perbandingan/'+data.id+'" class="btn btn-warning btn-sm" role="button"><b>perbandingan</b></a><a href="{{url('')}}/perhitungan/hapus/'+data.id+'" class="btn btn-danger btn-sm" style="margin-left: 8px" role="button"><i class="fas fa-trash"></i></a>';
        } 
      }
      ]
    });

    $('.js-example-basic-multiple').select2();
  });
</script>
@endpush
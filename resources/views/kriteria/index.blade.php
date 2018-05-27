@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-6">
    <h1>Data Kriteria</h1>
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
    <a href="{{url('')}}/kriteria/create" class="btn btn-primary btn-sm" role="button" style="float: right; margin-top: 20px"><i class="fas fa-plus-circle"></i></a>
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Jumlah Sub-Kriteria</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Nama</th>
        <th>Jumlah Sub-Kriteria</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
</div>
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
      "iDisplayLength": 10,
      destroy: true,
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: '{!! route('kriteria.data') !!}',
      columns: [
      { data: 'kriteria' },
      { data: 'jumlah' },
      { 
        data: null, 
        searchable: false,
        render: function(data) {
          return '<a href="{{url('')}}/kriteria/edit/'+data.kriteria+'" class="btn btn-warning btn-sm" role="button"><i class="fas fa-edit"></i></a><a href="{{url('')}}/kriteria/hapus/'+data.kriteria+'" class="btn btn-danger btn-sm" style="margin-left: 8px" role="button"><i class="fas fa-trash"></i></a>';
        } 
      }
      ]
    });
  });

</script>
@endpush
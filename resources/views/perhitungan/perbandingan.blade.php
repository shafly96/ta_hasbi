@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
  .select2-container .select2-selection--single{
    height: 36px !important;
  }
</style>
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <div class="col-md-12">
    <h1>Perbandingan</h1>
  </div>
  <div class="col-md-12 border-bottom">
    <form method="POST" action="{{url('')}}/perhitungan/tes">
      {!! csrf_field() !!}
      <div class="form-row">
        <div class="form-group col-md-5">
          <label>Node</label>
          <select class="js-example-basic-multiple" name="node" style="width:100% !important" onchange="ubah(this.value)">
            <option value="goal">Goal</option>
              @for($i=0; $i<count($array); $i++)
              @if($i==0) <optgroup label="<?php if(substr($array[$i]['id'],0,1)=='G') echo 'Galangan'; else if(substr($array[$i]['id'],0,1)=='K') echo 'Kriteria'; else echo 'Sub-Kriteria'; ?>"> @endif
              @if($i>0 && substr($array[$i-1]['id'],0,1) != substr($array[$i]['id'],0,1)) <optgroup label="<?php if(substr($array[$i]['id'],0,1)=='G') echo 'Galangan'; else if(substr($array[$i]['id'],0,1)=='K') echo 'Kriteria'; else echo 'Sub-Kriteria'; ?>"> @endif
              <option value="{{$array[$i]['id']}}">{{$array[$i]['nama']}}</option>
              <?php if($i<count($array)-1 && substr($array[$i+1]['id'],0,1) != substr($array[$i]['id'],0,1)) echo '</optgroup>'; ?>
              @endfor
          </select>
        </div>
        <div class="form-group" style="margin-left: 10px">
          <label>Cluster</label><br>
          <label style="margin-right: 8px"><input id="cluster1" type="radio" name="cluster" value="G"> Galangan</label>
          <label style="margin-right: 8px"><input id="cluster2" type="radio" name="cluster" value="K"> Kriteria</label>
          <label style="margin-right: 12px"><input id="cluster3" type="radio" name="cluster" value="S"> Sub-Kriteria</label>
        </div>
        <div class="form-group col-md-1">
          <button class="btn btn-sm btn-primary" style="margin-top: 35px" type="submit">Pilih</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
<script>
  window.onload=function(){
    var radios = document.getElementsByName('cluster');

    radios[0].disabled = true
    radios[1].checked = true;
    radios[2].disabled = true
  }

  function ubah(id){
    var radios = document.getElementsByName('cluster');

    if(id=='goal'){
      radios[0].disabled = true;
      radios[1].disabled = false;
      radios[1].checked = true;
      radios[2].disabled = true;
    }

    if(id.substr(0,1)=='K' || id.substr(0,1)=='S'){
      radios[0].disabled = false;
      radios[0].checked = true;
      radios[1].disabled = true;
      radios[2].disabled = true;
    }

    if(id.substr(0,1)=='G'){
      console.log('tes');
      radios[0].disabled = true;
      radios[1].disabled = false;
      radios[1].checked = true;
      radios[2].disabled = false;
    }
  }
</script>
@endpush
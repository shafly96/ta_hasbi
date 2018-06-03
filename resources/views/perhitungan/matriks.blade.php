@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<style>
  #table-unweight{
    overflow-x: scroll;
    padding-bottom: 20px;
  }

  #table-unweight table, td{
    border:1px solid black;
    text-align: center;
    font-size: 10px;
  }

  .vertical-text {
    transform: rotate(90deg);
  }
</style>
@endsection

@section('content')
<div class="row" style="margin: 50px 0px">
  <div class="col-md-12">
    <button class="btn btn-primary" id="unweight">Unweight</button>
    <button class="btn btn-primary" id="weight">Weight</button>
  </div>
  <div class="col-md-12" id="table-unweight" style="padding-top: 30px">
    <label>Unweight</label>
    <table>
      <tr>
        <td colspan="2" rowspan="2"></td>
        <td colspan="{{$span['g']}}">Galangan</td>
        <td colspan="{{$span['k']}}">Kriteria</td>
        <td colspan="{{$span['s']}}">Sub-Kriteria</td>
      </tr>
      <tr>
        <?php
          for($i=0;$i<count($nama);$i++){
            echo '<td style="white-space: nowrap; padding: 0px 8px;">'.$nama[$i].'</td>';
          }
        ?>
      </tr>
      <?php
        // dd($unweight);
        for($i=0; $i<count($nama); $i++){
          echo '<tr>';
          if($i==0) echo '<td rowspan="'.$span['g'].'" style="padding: 0px 8px;" class="vertical-text">Galangan</td>';
          if($i==$span['g']) echo '<td rowspan="'.$span['k'].'" style="padding: 0px 8px;" class="vertical-text">Kriteria</td>';
          if($i==$span['g']+$span['k']) echo '<td rowspan="'.$span['s'].'" style="white-space: nowrap;"" class="vertical-text">Sub-Kriteria</td>';
          echo '<td style="padding: 8px 8px;">'.$nama[$i].'</td>';
          for($j=0; $j<count($nama);$j++){
            if(isset($unweight[$i+1][$j+1])) echo '<td>'.$unweight[$i+1][$j+1].'</td>';
            else echo '<td> - </td>';
          }

          echo '</tr>';
        }
      ?>
    </table>
  </div>
  <div class="col-md-12" id="table-weight" style="padding-top: 30px">
    <label>Weight</label>
  </div>
</div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
  $("#table-unweight").hide();
  $("#table-weight").hide();

  $("#unweight").click(function(){
    $("#table-unweight").show();
    $("#table-weight").hide();

  });

  $("#weight").click(function(){
    $("#table-unweight").hide();
    $("#table-weight").show();

  });
</script>
@endpush
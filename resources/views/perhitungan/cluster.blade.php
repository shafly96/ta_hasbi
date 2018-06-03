@extends('layouts.index')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<style>
  .tengah { position:relative; margin:0 auto }
</style>
@endsection

@section('content')
<form method="POST" action="{{url('')}}/perhitungan/cluster_simpan/{{$array['id']}}">
        {!! csrf_field() !!}
  <div class="row" style="margin: 50px 0px">
      <table class="table table-striped" style="text-align:center">
        <thead>
          <tr>
            <td></td>
            <td>9</td>
            <td>8</td>
            <td>7</td>
            <td>6</td>
            <td>5</td>
            <td>4</td>
            <td>3</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Galangan <input type="hidden" name="kiri[0]" value="G"></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-9" @if(isset($array['data'][0]) && $array['data'][0]->value=='-9') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-8" @if(isset($array['data'][0]) && $array['data'][0]->value=='-8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-7" @if(isset($array['data'][0]) && $array['data'][0]->value=='-7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-6" @if(isset($array['data'][0]) && $array['data'][0]->value=='-6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-5" @if(isset($array['data'][0]) && $array['data'][0]->value=='-5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-4" @if(isset($array['data'][0]) && $array['data'][0]->value=='-4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-3" @if(isset($array['data'][0]) && $array['data'][0]->value=='-3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="-2" @if(isset($array['data'][0]) && $array['data'][0]->value=='-2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="1" @if(isset($array['data'][0]) && $array['data'][0]->value=='1') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="2" @if(isset($array['data'][0]) && $array['data'][0]->value=='2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="3" @if(isset($array['data'][0]) && $array['data'][0]->value=='3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="4" @if(isset($array['data'][0]) && $array['data'][0]->value=='4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="5" @if(isset($array['data'][0]) && $array['data'][0]->value=='5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="6" @if(isset($array['data'][0]) && $array['data'][0]->value=='6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="7" @if(isset($array['data'][0]) && $array['data'][0]->value=='7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="8" @if(isset($array['data'][0]) && $array['data'][0]->value=='8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[0]" value="9" @if(isset($array['data'][0]) && $array['data'][0]->value=='9') checked @endif></td>
            <td>Kriteria <input type="hidden" name="kanan[0]" value="K"></td>
          </tr>
          <tr>
            <td>Galangan <input type="hidden" name="kiri[1]" value="G"></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-9" @if(isset($array['data'][1]) && $array['data'][1]->value=='-9') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-8" @if(isset($array['data'][1]) && $array['data'][1]->value=='-8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-7" @if(isset($array['data'][1]) && $array['data'][1]->value=='-7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-6" @if(isset($array['data'][1]) && $array['data'][1]->value=='-6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-5" @if(isset($array['data'][1]) && $array['data'][1]->value=='-5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-4" @if(isset($array['data'][1]) && $array['data'][1]->value=='-4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-3" @if(isset($array['data'][1]) && $array['data'][1]->value=='-3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="-2" @if(isset($array['data'][1]) && $array['data'][1]->value=='-2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="1" @if(isset($array['data'][1]) && $array['data'][1]->value=='1') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="2" @if(isset($array['data'][1]) && $array['data'][1]->value=='2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="3" @if(isset($array['data'][1]) && $array['data'][1]->value=='3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="4" @if(isset($array['data'][1]) && $array['data'][1]->value=='4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="5" @if(isset($array['data'][1]) && $array['data'][1]->value=='5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="6" @if(isset($array['data'][1]) && $array['data'][1]->value=='6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="7" @if(isset($array['data'][1]) && $array['data'][1]->value=='7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="8" @if(isset($array['data'][1]) && $array['data'][1]->value=='8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[1]" value="9" @if(isset($array['data'][1]) && $array['data'][1]->value=='9') checked @endif></td>
            <td>Sub-Kriteria <input type="hidden" name="kanan[1]" value="S"></td>
          </tr>
          <tr>
            <td>Kriteria <input type="hidden" name="kiri[2]" value="K"></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-9" @if(isset($array['data'][2]) && $array['data'][2]->value=='-9') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-8" @if(isset($array['data'][2]) && $array['data'][2]->value=='-8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-7" @if(isset($array['data'][2]) && $array['data'][2]->value=='-7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-6" @if(isset($array['data'][2]) && $array['data'][2]->value=='-6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-5" @if(isset($array['data'][2]) && $array['data'][2]->value=='-5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-4" @if(isset($array['data'][2]) && $array['data'][2]->value=='-4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-3" @if(isset($array['data'][2]) && $array['data'][2]->value=='-3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="-2" @if(isset($array['data'][2]) && $array['data'][2]->value=='-2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="1" @if(isset($array['data'][2]) && $array['data'][2]->value=='1') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="2" @if(isset($array['data'][2]) && $array['data'][2]->value=='2') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="3" @if(isset($array['data'][2]) && $array['data'][2]->value=='3') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="4" @if(isset($array['data'][2]) && $array['data'][2]->value=='4') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="5" @if(isset($array['data'][2]) && $array['data'][2]->value=='5') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="6" @if(isset($array['data'][2]) && $array['data'][2]->value=='6') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="7" @if(isset($array['data'][2]) && $array['data'][2]->value=='7') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="8" @if(isset($array['data'][2]) && $array['data'][2]->value=='8') checked @endif></td>
            <td><input class="form-check-input tengah" type="radio" name="value[2]" value="9" @if(isset($array['data'][2]) && $array['data'][2]->value=='9') checked @endif></td>
            <td>Sub-Kriteria <input type="hidden" name="kanan[2]" value="S"></td>
          </tr>
        </tbody>
      </table>

      <div class="form-row">
        <div class="form-group col-md-5">
          <button class="btn btn-primary" type="submit" style="margin-top: 20px">Simpan</button>
        </div>
      </div>
  </div>
</form>

@if(isset($array['data'][0]))
<div class="col-md-12 border-bottom">
  <table class="table table-striped" style="margin-top: 50px">
    <thead>
      <tr>
        <td>Nama</td>
        <td>Eigen</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Galangan</td>
        <td>{{$array['data'][0]->eigen}}</td>
      </tr>
      <tr>
        <td>Kriteria</td>
        <td>{{$array['data'][1]->eigen}}</td>
      </tr>
      <tr>
        <td>Sub-Kriteria</td>
        <td>{{$array['data'][2]->eigen}}</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="col-md-12 border-bottom" style="margin-top: 30px; margin-bottom: 50px">
  <table>
    <tr>
      <td style="width: 200px">Pricipal Eigen Value</td>
      <td>
        <?php
          $balik1 = -1 * $array['data'][0]->value;
          $balik2 = -1 * $array['data'][1]->value;
          $balik3 = -1 * $array['data'][2]->value;

          $normal1 = $array['data'][0]->value;
          $normal2 = $array['data'][1]->value;
          $normal3 = $array['data'][2]->value;

          if($balik1 < 0) $balik1 = 1 / (-1 * $balik1);
          if($balik2 < 0) $balik2 = 1 / (-1 * $balik2);
          if($balik3 < 0) $balik3 = 1 / (-1 * $balik3);

          if($normal1 < 0) $normal1 = 1 / (-1 * $normal1);
          if($normal2 < 0) $normal2 = 1 / (-1 * $normal2);
          if($normal3 < 0) $normal3 = 1 / (-1 * $normal3);


           $sumrow1 = 1 + $balik1 + $balik2;
           $sumrow2 = 1 + $normal1 + $balik3;
           $sumrow3 = 1 + $normal2 + $normal3;

           $sumcol[0] = (1 / $sumrow1) + ($normal1 / $sumrow2) + ($normal2 / $sumrow3);
           $sumcol[1] = (1 / $sumrow2) + ($balik1 / $sumrow1) + ($normal3 / $sumrow3);
           $sumcol[2] = (1 / $sumrow3) + ($balik2 / $sumrow1) + ($balik3 / $sumrow2);

           $max = ($array['data'][0]->eigen * $sumrow1) + ($array['data'][1]->eigen * $sumrow2) + ($array['data'][2]->eigen * $sumrow3);
           echo $max;
        ?>
      </td>
    </tr>
    <tr>
      <td>CI</td>
      <td>
        <?php
          $ci = ($max-3)/2;
          echo $ci;
        ?>
      </td>
    </tr>
    <tr>
      <td>CR</td>
      <td>
        <?php
          $n = count($array['data']); 
          if($n==3) $ri = 0.58;
          elseif($n==4) $ri = 0.9;
          elseif($n==5) $ri = 1.12;
          elseif($n==6) $ri = 1.24;
          elseif($n==7) $ri = 1.32;
          elseif($n==8) $ri = 1.41;
          elseif($n==9) $ri = 1.45;
          elseif($n==10) $ri = 1.49;
          elseif($n==11) $ri = 1.51;
          elseif($n==12) $ri = 1.48;
          elseif($n==13) $ri = 1.56;
          elseif($n==14) $ri = 1.57;
          else $ri = 1.59;

          if($n==1 || $n==2) echo '~';
          else{
            $cr = ($ci/$ri);
            echo $cr.'%';
          }
        ?>
      </td>
    </tr>
    <tr>
      <td>Hasil Konsistensi</td>
      <?php
        if($n>2){
          if($cr < 0.1) echo '<td style="color: green"><b>KONSISTEN</b></td>';
          else echo '<td style="color: red"><b>TIDAK KONSISTEN</b></td>';
        }else echo '<td style="color: red"><b>TIDAK KONSISTEN</b></td>';
      ?>
    </tr>
  </table>
</div>

@endif

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
@endpush
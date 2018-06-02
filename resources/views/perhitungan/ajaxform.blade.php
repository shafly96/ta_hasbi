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
    <?php 
    $batas = count($array) - 1;
    $batas2 = count($array);
    $index = 0;
    $counter = 0;
    $index2 = 1;
    $counter2 = 1;
    ?>
    @for($i=0; $i<$total; $i++)
    <tr>
      <td><?php if($counter<$batas-1) { echo $array[$index]['nama']; echo '<input type="hidden" name="kiri['.$i.']" value="'.$array[$index]['id'].'">'; $counter++; } else { echo $array[$index]['nama'];  echo '<input type="hidden" name="kiri['.$i.']" value="'.$array[$index]['id'].'">'; $counter = 0; $index++; $batas--; } ?></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-9" @if(isset($array[$i]['value']) && $array[$i]['value']=='-9') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-8" @if(isset($array[$i]['value']) && $array[$i]['value']=='-8') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-7" @if(isset($array[$i]['value']) && $array[$i]['value']=='-7') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-6" @if(isset($array[$i]['value']) && $array[$i]['value']=='-6') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-5" @if(isset($array[$i]['value']) && $array[$i]['value']=='-5') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-4" @if(isset($array[$i]['value']) && $array[$i]['value']=='-4') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-3" @if(isset($array[$i]['value']) && $array[$i]['value']=='-3') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="-2" @if(isset($array[$i]['value']) && $array[$i]['value']=='-2') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="1" @if(isset($array[$i]['value']) && $array[$i]['value']=='1') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="2" @if(isset($array[$i]['value']) && $array[$i]['value']=='2') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="3" @if(isset($array[$i]['value']) && $array[$i]['value']=='3') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="4" @if(isset($array[$i]['value']) && $array[$i]['value']=='4') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="5" @if(isset($array[$i]['value']) && $array[$i]['value']=='5') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="6" @if(isset($array[$i]['value']) && $array[$i]['value']=='6') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="7" @if(isset($array[$i]['value']) && $array[$i]['value']=='7') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="8" @if(isset($array[$i]['value']) && $array[$i]['value']=='8') checked @endif></td>
      <td><input class="form-check-input tengah" type="radio" name="value[{{$i}}]" value="9" @if(isset($array[$i]['value']) && $array[$i]['value']=='9') checked @endif></td>
      <td><?php if($counter2<$batas2) { echo $array[$counter2]['nama']; echo '<input type="hidden" name="kanan['.$i.']" value="'.$array[$counter2]['id'].'">'; $counter2++; } else { $index2++; $counter2 = $index2; echo $array[$counter2]['nama']; echo '<input type="hidden" name="kanan['.$i.']" value="'.$array[$counter2]['id'].'">'; $counter2++; } ?></td>
    </tr>
    @endfor
  </tbody>
</table>

<div class="form-row">
  <div class="form-group col-md-5">
    <button class="btn btn-primary" type="submit" style="margin-top: 20px">Simpan</button>
  </div>
</div>

@if(isset($array[0]['value']))
<div class="col-md-12 border-bottom">
  <table class="table table-striped" style="margin-top: 50px">
    <thead>
      <tr>
        <td>Nama</td>
        <td>Eigen</td>
      </tr>
    </thead>
    <tbody>
      @for($i=0; $i<count($array2); $i++)
      <tr>
        <td>{{$array2[$i]['nama']}}</td>
        <td>{{$array2[$i]['eigen']}}</td>
      </tr>
      @endfor
    </tbody>
  </table>
</div>
<div class="col-md-12 border-bottom" style="margin-top: 30px">
  <table>
    <tr>
      <td style="width: 200px">Pricipal Eigen Value</td>
      <td>
        <?php
          $max = 0;
          for($i=0; $i<count($array2); $i++){
            $max = $max + ($array2[$i]['sumrow']*$array2[$i]['eigen']);
          }
          echo $max;
        ?>
      </td>
    </tr>
    <tr>
      <td>CI</td>
      <td>
        <?php
          $ci = ($max-count($array2))/(count($array2)-1);
          echo $ci;
        ?>
      </td>
    </tr>
    <tr>
      <td>CR</td>
      <td>
        <?php
          $n = count($array2); 
          if($n==1 || $n==2){ $ci=0; $ri=1;}
          elseif($n==3) $ri = 0.58;
          elseif($n==4) $ri = 0.9;
          elseif($n==5) $ri = 1.12;
          elseif($n==6) $ri = 1.24;
          elseif($n==7) $ri = 1.32;
          elseif($n==8) $ri = 1.41;
          elseif($n==9) $ri = 1.45;
          else $ri = 1.49;

          $cr = ($ci/$ri)*100;
          echo $cr.'%';
        ?>
      </td>
    </tr>
    <tr>
      <td>Hasil Konsistensi</td>
      <?php
        if($cr <= 10) echo '<td style="color: green"><b>KONSISTEN</b></td>';
        else echo '<td style="color: red"><b>TIDAK KONSISTEN</b></td>';
      ?>
    </tr>
  </table>
</div>

@endif
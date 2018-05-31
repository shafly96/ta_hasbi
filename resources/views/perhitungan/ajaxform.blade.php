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
  <table class="table table-striped" style="text-align:center">
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
@endif
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
    <td><?php if($counter<$batas-1) { echo $array[$index]['nama']; $counter++; } else { echo $array[$index]['nama']; $counter = 0; $index++; $batas--; } ?></td>
      <td style="text-align: center;"><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-9"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-8"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-7"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-6"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-5"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-4"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-3"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="-2"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="1"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="2"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="3"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="4"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="5"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="6"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="7"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="8"></td>
      <td><input class="form-check-input tengah" type="radio" name="exampleRadios" value="9"></td>
      <td><?php if($counter2<$batas2) { echo $array[$counter2]['nama']; $counter2++; } else { $index2++; $counter2 = $index2; echo $array[$counter2]['nama']; $counter2++; } ?></td>
    </tr>
    @endfor
  </tbody>
</table>
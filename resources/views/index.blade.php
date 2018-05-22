@extends('layouts.index')

@section('home')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Deskripsi dikit</h1>
  <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
</div>
@endsection

@section('content')
<div class="row" style="margin-top: 50px">
  <!-- @for($i=0; $i<11; $i++)
  <div class="col-md-4">
    <div class="card mb-4 box-shadow">
      <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='detail.html';">Detail</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endfor -->
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="{{url('')}}/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{{url('')}}/assets/js/vendor/popper.min.js"></script>
<script src="{{url('')}}/dist/js/bootstrap.min.js"></script>
<script src="{{url('')}}/assets/js/vendor/holder.min.js"></script>
<script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });
</script>
@endpush
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
	<h5 class="my-0 mr-md-auto font-weight-normal"><i class="fas fa-ship"></i> Sistem Galangan</h5>
	<nav class="my-2 my-md-0 mr-md-3">
		<a class="p-2 text-dark" href="{{url('')}}">Home</a>
		@if(Auth::user())
		<a class="p-2 text-dark" href="{{url('')}}/perhitungan">Perhitungan</a>
		<a class="p-2 text-dark" href="history.html">History</a>
		@endif
		@if(Auth::user() && Auth::user()->email == 'admin@gmail.com')
	      <a class="p-2 text-dark" href="#" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
	      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
	        <a class="dropdown-item" href="{{url('')}}/galangan">Data Galangan</a>
	        <a class="dropdown-item" href="{{url('')}}/kriteria">Data Kriteria</a>
	      </div>
		@endif
	</nav>
	@if(Auth::user())
	<div class="dropdown">
      <a class="p-2 text-dark" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-circle" src="{{url('')}}/assets/img/user-circle-01.png" width="20px" height="20px">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <p style="margin-left: 22px; margin-bottom: 30px; font-weight: bold">{{ Auth::user()->nama }}</p>
        <a class="dropdown-item" href="#">Edit Profil</a>
        <a class="dropdown-item" href="{{url('')}}/logout">Sign Out</a>
      </div>
    </div>
	@endif
	@if(!Auth::user())
	<a class="primary" href="{{url('')}}/user/sign_in">Sign in</a>
	@endif
</div>
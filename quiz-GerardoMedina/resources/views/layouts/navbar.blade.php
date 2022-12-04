
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('welcome')}}">Apps</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('trucks.index')}}">Trucks</a>
      </li>
      <li class="nav-item">
        <a href="{{route('purchases.index')}}" aria-current="page" class="nav-link">Purchases</a>
      </li>
      <li class="nav-item">
        <a href="{{route('vacas.index')}}" aria-current="page" class="nav-link">Vacas</a>
      </li>
    </ul>
  </div>
</nav>
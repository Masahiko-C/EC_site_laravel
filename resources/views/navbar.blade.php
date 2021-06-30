

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    
    <a class="navbar-brand" href="{{ route('home') }}">Market</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="{{ route('admin.index') }}">管理<span class="sr-only">(current)</span></a>
        </li>      
      </ul>

      <ul class="navbar-nav">
    @guest
          <li class="nab-item">
            <a class="nav-link" href="{{ route('register') }}">サインアップ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン </a>
          </li>
    @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </div>
        </li>
      @endguest
      </ul>
    </div>
  </div>
</nav>
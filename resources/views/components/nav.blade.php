<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Ecom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('product') }}">Dashboard</a>
          </li>
        </ul>

      </div>
      <div>
        @if (Auth::user())
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                           @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-responsive-nav-link>
        </form>
        @else
        <span><a href="{{ 'login' }}" class="auth-text"> Login | </a></span>
        <span><a href="{{ 'register' }}" class="auth-text"> Register</a></span>
        @endif
    </div>
    </div>
  </nav>

  <style>
    .navbar{
        background-color: #240c37;
    }
    .nav-link, .navbar-brand, .auth-text{
        color: #fff;
    }
    .nav-link:hover, .navbar-brand:hover, .auth-text:hover{
        color: rgb(224, 198, 246);
    }
</style>

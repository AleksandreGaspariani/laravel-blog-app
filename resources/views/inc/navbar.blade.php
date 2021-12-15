
<div class="container-fluid w-75 bg-light">
  <header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
      <li class="nav-item"><a href="{{route('index')}}" class="nav-link btn-outline-dark">Home</a></li>

      <li class="nav-item"><a href="#" class="nav-link btn-outline-dark">Contact Us</a></li>
      <li class="nav-item"><a href="#" class="nav-link btn-outline-dark">About</a></li>
      @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
        <li class="nav-item"><a href="{{route('home')}}" class="nav-link btn-outline-dark">My Profile</a></li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle btn-outline-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if (Auth::user()->role == '1')
                    <a href="/admin" class="dropdown-item">{{__('Admin CP')}}</a>
                @endif
                <a href=" {{ route('createPost') }} " class="dropdown-item">{{__('Add Post')}}</a>
                <a class="dropdown-item bg-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </li>
        @endguest
    </ul>
  </header>
</div>

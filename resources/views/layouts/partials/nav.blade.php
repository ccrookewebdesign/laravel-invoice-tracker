<nav class="flex">
  @auth
    <div 
      @if(Route::currentRouteName() === 'home')
        class="active"
      @endif
    >
      <a href="{{ route('home') }}">Home</a>
    </div>
    <div
      @if(strpos(Route::currentRouteName(), 'clients') !== false)
        class="active"
      @endif
    >
      <a href="{{ route('clients.index') }}">Clients</a>
    </div>
    <div
      @if(strpos(Route::currentRouteName(), 'tasks') !== false)
        class="active"
      @endif
    >
      <a href="tasks.cfm">Tasks</a>
    </div>
    <div
      @if(strpos(Route::currentRouteName(), 'invoices') !== false)
        class="active"
      @endif
    >
      <a href="invoices.cfm">Invoices</a>
    </div>
    <div
      @if(strpos(Route::currentRouteName(), 'expenses') !== false)
        class="active"
      @endif
    >
      <a href="expenses.cfm">Expenses</a>
    </div>
    <div
      @if(strpos(Route::currentRouteName(), 'reports') !== false)
        class="active"
      @endif
    ><a href="">Reports</a></div>
    <div>
      <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >{{ __('Logout') }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
      </form>
    </div>
    
  @else
    <div 
      @if(Route::currentRouteName() === 'login')
        class="active"
      @endif
    ><a href="{{ route('login') }}">Login</a></div>
  @endauth
</nav>
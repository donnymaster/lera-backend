<div class="user-logo">
    <img class="user-logo-img" src="{{ Auth::user()->avatar() }}" alt="user-logo">
    <div class="user-menu d-none">
        <ul class="menu-items">
            <li class="menu-item">
                <a class="menu-item__link" href="{{ route('user.index') }}">Аккаунт</a>
            </li>
            <li class="menu-item">
                <a class="menu-item__link" href="{{ route('feedback.create') }}">Зв'язок з адміністрацією</a>
            </li>
           @if (Auth::user()->role->name_role == 'moderator')
            <li class="menu-item">
                <a class="menu-item__link" href="{{ route('admin.index') }}">Управління сайтом</a>
            </li>
           @endif
            <li class="menu-item">
                <a class="menu-item__link" href="#"
                onclick="event.preventDefault();
                         document.getElementById('logout-form-desktop').submit();"
                >Вихід</a>
                <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</div>

<div class="user-logo">
    <img class="user-logo-img" src="{{ Auth::user()->avatar() }}" alt="user-logo">
    <div class="user-menu d-none">
        <ul class="menu-items">
            <li class="menu-item">
                <a class="menu-item__link" href="#">Личный аккаунт</a>
            </li>
            <li class="menu-item">
                <a class="menu-item__link" href="/feedback.html">Связь с администрацией</a>
            </li>
            <li class="menu-item">
                <a class="menu-item__link" href="#"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                >Выход</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</div>

                  <!-- modile menu -->
                  <a href="#" id="menuBtn">
                    <span class="lines"></span>
                </a>
                <div class="mainMenu">
                    <ul>
                        <li>
                            <a href="{{ route('broadcasts.index') }}">ТРАНСЛЯЦІЇ</a>
                        </li>
                        <li>
                            <a href="#">КОМАНДИ</a>
                        </li>
                        <li>
                            <a href="#">СПОРТСМЕНИ</a>
                        </li>
                        @if (Auth::check())
                        <li>
                            <a href="#">Личный аккаунт</a>
                        </li>
                        <li>
                            <a href="{{ route('feedback.create') }}">Связь с администрацией</a>
                        </li>
                        <li>
                            <a href="#"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                            >Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="btn suBtn">
                                    Вхід
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="btn suBtn">
                                    Реєстрація
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- end -->

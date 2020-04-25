@extends('layouts.user-side')

@section('title', 'Головна')

@section('content-footer')
    <div class="container flex-center-765">
          <div class="index__offer">
              <h1 class="offer__title">
                  Система зручного перегляду <br> спортивних трансляцій
              </h1>
              <h3 class="offer_desc">
                  Користуючись нашим сайтом у вас з'являється можливість
                  полегшити своє життя. При перегляді спортивних
                  трансляцій у вас є можливість коментувати матч в
                  прямому ефірі, адміністрація бере на себе стежити за
                  тим щоб в чаті співрозмовники вели себе порядно. Так
                  само адміністрація буде вам повідомляти в прямому ефірі
                  що відбувається в спортивному змаганні.
              </h3>
          </div>
          <a href="#detal" class="details btn">
              Докладніше
          </a>
        </div>
@endsection

@section('content-main')
<div class="section__about-site">
    <div id="detal"></div>
      <h2 class="about-site-titl">
        Наші переваги
      </h2>
      <div class="container">
          <div class="about-items">
              <div class="about-item">
                <img src="{{ asset('img/swearing.png') }}" alt="item_logo" class="item__logo">
                <div class="item-info">
                    <div class="item-title">
                        Система контролю повідомлень
                    </div>
                    <div class="item-desc">
                        Під час перегляду спортивної
                        трансляції ви можете коментувати
                        те, що відбувається і ваші
                        повідомлення будуть контролювати
                        за допомогою системи перевірки на лайку.
                    </div>
                </div>
              </div>
              <div class="about-item">
                <img src="{{ asset('img/create.png') }}" alt="item_logo" class="item__logo">
                <div class="item-info">
                    <div class="item-title">
                        Детальний опис спортивної події
                    </div>
                    <div class="item-desc">
                        Коли починається трансляція, адміністрація
                        може дивитися з вами і коментувати що
                        відбуваються і дані повідомлення будуть
                        відображатися внизу самої трансляції.
                    </div>
                </div>
              </div>
              <div class="about-item">
                <img src="{{ asset('img/email-send.png') }}" alt="item_logo" class="item__logo">
                <div class="item-info">
                    <div class="item-title">
                        Система сповіщення
                    </div>
                    <div class="item-desc">
                        Ви можете залишити собі оповіщення про
                        те що трансляція почнеться через
                        5 хвилин. Дане повідомлення
                        прийде вам на пошту.
                    </div>
                </div>
              </div>
          </div>
      </div>
      <div class="container">

        {!! $chart->container() !!}

      </div>
      <div class="container">
        <div class="team-line"></div>
    </div>
      <div class="container">
        <div class="brodcasts__index">
            <h2 class="brodcasts__index-title">
              Трансляції
            </h2>
            <div class="brodcasts__index-items">
              <div class="brodcasts__index-item">
                  <img src="https://via.placeholder.com/300x250" alt="broadcasts" class="main-img-broad">
                  <div class="index-item__title">
                      Назва трансляции
                  </div>
                  <div class="index-item__body">
                      <div class="wrapped-body">
                          <div class="typ-sport">Футбол</div>
                          <div class="is-offline">Offline</div>
                      </div>
                      <div class="index-item__desc">
                          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima sapiente esse architecto animi ipsa officia pariatur ratione iusto, tempora laboriosam voluptas del
                      </div>
                  </div>
              </div>
              <div class="brodcasts__index-item">
                <img src="https://via.placeholder.com/300x250" alt="broadcasts" class="main-img-broad">
                <div class="index-item__title">
                    Назва трансляции
                </div>
                <div class="index-item__body">
                    <div class="wrapped-body">
                        <div class="typ-sport">Футбол</div>
                        <div class="is-offline">Offline</div>
                    </div>
                    <div class="index-item__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima sapiente esse architecto animi ipsa officia pariatur ratione iusto, tempora laboriosam voluptas del
                    </div>
                </div>
            </div>
            <div class="brodcasts__index-item">
                <img src="https://via.placeholder.com/300x250" alt="broadcasts" class="main-img-broad">
                <div class="index-item__title">
                    Назва трансляции
                </div>
                <div class="index-item__body">
                    <div class="wrapped-body">
                        <div class="typ-sport">Футбол</div>
                        <div class="is-online">Online</div>
                    </div>
                    <div class="index-item__desc">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima sapiente esse architecto animi ipsa officia pariatur ratione iusto, tempora laboriosam voluptas del
                    </div>
                </div>
            </div>
            </div>
            <div class="container">
                <div class="go-broadcasts">
                    <a href="{{ route('broadcasts.index') }}" class="link-go line-link">Всі трансляції</a>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
@endsection

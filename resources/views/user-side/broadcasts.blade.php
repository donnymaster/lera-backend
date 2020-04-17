@extends('layouts.user-side')

@section('title', 'Головна')

@section('content-footer')
    <div class="container">
        <div class="index__offer">
            <h1 class="offer__title">
                Трансляції
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
    </div>
@endsection

@section('content-main')

<div class="container">
    <div class="two-column">
        <div class="two-column__filter">
            <!-- <div class="filter__title">
                Укажите фильтр
            </div> -->
          <form class="form-filter">
              <div class="form-filter__status">
                  <div class="status-title">
                    Статус трансляции
                  </div>
                  <div class="broad-status">
                    <input type="radio" id="in_oinline" name="contact" value="phone" class="radio-btn">
                    <label for="in_oinline" class="is-radio">онлайн</label>
                  </div>
                  <div class="broad-status">
                    <input type="radio" id="ont_online" name="contact" value="mail" class="radio-btn">
                    <label for="ont_online" class="is-radio">скоро будет</label>
                  </div>
                  <div class="broad-status">
                    <input type="radio" id="end" name="contact" value="mail" class="radio-btn">
                    <label for="end" class="is-radio">прошли</label>
                  </div>
                  <div class="broad-status">
                    <input type="radio" id="all" name="contact" value="mail" class="radio-btn">
                    <label for="all" class="is-radio">все</label>
                  </div>
              </div>
              <div class="form-filter__status no-border">
                <div class="status-title">
                Вид спорта
                </div>
                <div class="broad-status">
                <input type="checkbox" id="sport-1" name="sport" value="phone" class="checkbox-btn">
                <label for="sport-1" class="is-checkbox">бокс</label>
                </div>
                <div class="broad-status">
                    <input type="checkbox" id="sport-2" name="sport" value="phone" class="checkbox-btn">
                    <label for="sport-2" class="is-checkbox">хоккей</label>
                </div>
            </div>
            <div class="form-filter__status no-border">
                <div class="update-filter">
                    <button class="btn no-border filter-btn">Обновить</button>
                    </div>
            </div>
            </form>
        </div>
        <div class="two-column__elements">
                <div class="elements__header">
                    <div class="title-header">
                        Трансляції
                    </div>
                    <div class="sort-items">
                        <form class="form-sort-items" action="#">
                            <p class="fort-sort-title">Сортировка</p>
                            <select name="sort" class="sort-items-form">
                                <option value="date">По возрастанию</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="broadcast-wrapped">
                    <div class="broadcast__item">
                        <div class="logo_broadcast">
                            <img src="https://via.placeholder.com/250x150" alt="broad-img" class="broad-fon">
                            <div class="status-broadcast">
                                <img src="{{ asset('img/offline-2.png') }}" alt="status" class="img-status">
                            </div>
                        </div>
                        <div class="desc_broadcast">
                            <div class="desc_broadcast__head">
                               <a class="desc_broadcast__title line-link" href="/broadcast-1.html">
                                Lorem ipsum dolor sit
                               </a>
                                <div class="status-noty">
                                    <div class="add-noty">
                                        <form action="#">
                                            <img src="{{ asset('img/alarm.png') }}" alt="" class="notify-img">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="desc_broadcast__desc">
                                Lorem ipsum dolor sit amet consectetur,
                                 adipisicing elit. Voluptatum placeat
                                 sit, iure a et nemo consequuntur quis
                                 nisi ab voluptatem dicta ipsa aliquid
                                 incidunt laborum maxime dolore voluptate
                                  molestiae totam!
                            </div>
                        </div>
                    </div>
                    <div class="broadcast__item">
                        <div class="logo_broadcast">
                            <img src="https://via.placeholder.com/250x150" alt="broad-img" class="broad-fon">
                            <div class="status-broadcast">
                                <img src="{{asset('img/online-1.png') }}" alt="status" class="img-status">
                            </div>
                        </div>
                        <div class="desc_broadcast">
                            <div class="desc_broadcast__head">
                               <a class="desc_broadcast__title line-link" href="/broadcast-1.html">
                                Lorem ipsum dolor sit
                               </a>
                                <div class="status-noty">
                                    <div class="add-noty">
                                        <form action="#">
                                            <img src="{{asset('img/no-reminders.png') }}" alt="" class="notify-img">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="desc_broadcast__desc">
                                Lorem ipsum dolor sit amet consectetur,
                                 adipisicing elit. Voluptatum placeat
                                 sit, iure a et nemo consequuntur quis
                                 nisi ab voluptatem dicta ipsa aliquid
                                 incidunt laborum maxime dolore voluptate
                                  molestiae totam!
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
  </div>
@endsection


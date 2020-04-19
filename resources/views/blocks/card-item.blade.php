<a class="card-teams-item" href="{{ route($route_name, [$parameter_name => $item->id]) }}">
    <div class="card-teams-item--link">
        <img class="card-link-arrow" src="{{ asset('img/forward-arrow.png') }}" alt="arrow">
    </div>
        <div class="card-teams-img">
            <img src="https://via.placeholder.com/250x300" alt="team">
        </div>
        <div class="card-teams-body">
            <div class="card-teams-title">
                {{ $item->name }}
            </div>
            <div class="card-teams-info">
                <div class="card-teams-info__city">
                    {{ $item->city }}
                </div>
                <div class="card-teams-info__sport">
                    {{ $item->kind_sport->name_kind_sport }}
                </div>
            </div>
            <div class="card-teams-desc">
                {{ Str::words($item->description, 20 , '...') }}
            </div>
        </div>
</a>

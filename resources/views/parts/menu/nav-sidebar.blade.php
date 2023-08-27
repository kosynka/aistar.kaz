<nav class="nav">
    <div>
        <a href="" class="nav_logo">
            <i class="bx bx-layer nav_logo-icon"></i>
            <span class="nav_logo-name">{{ strtoupper(config('app.name')) }}</span>
        </a>

        <div class="nav_list">
            @foreach($menu as $name => $items)
                <a class="nav_link btn" data-bs-toggle="collapse" href="#collapse{{ $name }}" role="button" aria-expanded="false" aria-controls="collapse{{ $name }}">
                    <i class="bx {{ $items[0]['logo'] }} nav_icon"></i>
                    <span class="nav_name">{{ $name }}</span>
                </a>
                <div class="collapse" id="collapse{{ $name }}">
                    <ul class="">
                        @foreach($items as $item)
                            <li class="text-white"><a class="text-white" href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <a href="{{ route('logout') }}" class="nav_link">
        <i class="bx bx-log-out nav_icon"></i>
        <span class="nav_name">Выйти</span>
    </a>
</nav>

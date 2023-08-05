<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Меню</h3>

        <ul class="nav side-menu">
            @foreach($menu as $name => $items)
                <li>
                    <a><i class="fa fa-at"></i> {{ $name }} <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @foreach($items as $route => $item)
                            <li><a href="{{ $route }}">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<ul class="footer-links-list">
    @foreach ($menus as $menu)
        <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>

    @endforeach
</ul>

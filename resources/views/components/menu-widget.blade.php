<ul class="footer-links-list">
    @foreach ($menus as $menu)
        <li><a href="{{ $menu->url }}">{{ $menu->name }} {{ $ulclass }}</a></li>
    @endforeach
</ul>

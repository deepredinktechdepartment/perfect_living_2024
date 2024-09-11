<!-- resources/views/menus/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Menus</h1>





            <h2>Menu Shortcode</h2>
            <p>The <code> &#64;menu('position','ul class','li class','a class','single link (true/false)') &#125;&#125;</code> directive allows you to display menus based on their position.</p>

            <h3>Usage</h3>
            <p>To use the menu shortcode, include it in your Blade templates as follows:</p>

            <pre><code>
    &lt;!-- Example of using the menu shortcode --&gt;
    &lt;!--  &#64;menu('header') &#125;&#125; --&gt;
    &lt;!--  &#64;menu('footer') &#125;&#125; --&gt;
    &lt;!--  &#64;menu('sidebar') &#125;&#125; --&gt;
            </code></pre>





        @if ($menus->isEmpty())
        <div class="alert alert-info">
                No menus found. <a href="{{ route('menus.create') }}" class="btn bg-persian-green">Create a New Menu</a>
            </div>
        @else
            <div class="row mt-4">
                @foreach ($menus as $position => $items)
                    <div class="col-sm-4 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $position }}</h5>
                            </div>
                            <ul class="list-group list-group-flush flex-fill">
                                @foreach ($items as $menu)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                                        <div>
                                            <a href="{{ route('menus.edit', $menu->id) }}" class="text-primary me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="delete-form" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0 text-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="card-body">
                                <!-- You might add additional content here if needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

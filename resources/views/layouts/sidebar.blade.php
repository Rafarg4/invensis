<aside class="main-sidebar sidebar-dark-primary elevation-4"style="font-size: 12px;">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/logo_redondo.png"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar" style="font-size: 12px;">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>

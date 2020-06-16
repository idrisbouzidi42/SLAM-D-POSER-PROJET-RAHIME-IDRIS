<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">@yield('title-page')</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title-page')</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    @yield('content')

                </div>
            </div>
        </div>
    </main>
</div>
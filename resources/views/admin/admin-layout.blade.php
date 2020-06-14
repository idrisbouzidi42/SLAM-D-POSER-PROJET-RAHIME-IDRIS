@include('includes.head')

@include('includes.navigation-admin')

<section id="section-admin">
    <div class="admin-bg">
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert" style="top:10%">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
        </div>
        @endif
        @yield('content')

    </div>
</section>
@include('includes.footer')
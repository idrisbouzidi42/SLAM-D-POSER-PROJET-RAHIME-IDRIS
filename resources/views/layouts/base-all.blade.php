@include('includes.head')

@include('includes.navigation')

@include('includes.header-all')

<main id='main'>
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
    @endif

    @yield('content')
</main>

@include('includes.footer')
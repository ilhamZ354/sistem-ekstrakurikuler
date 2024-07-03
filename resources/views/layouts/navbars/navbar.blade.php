@auth()
    @include('layouts.navbars.navs.auth')
    @include('sweetalert::alert')
@endauth
    
@auth('siswas')
@include('layouts.navbars.navs.auth')
@include('sweetalert::alert')
@endauth


@guest()
    @include('layouts.navbars.navs.guest')
    @include('sweetalert::alert')
@endguest
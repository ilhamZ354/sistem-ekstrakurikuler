@auth()
    @include('layouts.navbars.navs.auth')
@endauth
    
@auth('siswas')
@include('layouts.navbars.navs.auth')
@endauth


@guest()
    @include('layouts.navbars.navs.guest')
@endguest
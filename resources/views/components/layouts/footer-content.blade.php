<footer class="p-3 mt-auto footer bg-slate-700">
    <div class="text-center text-gray-200 navbar-nav w-100">
        <div class="tw-text-sm">
            IXP Manager v{{ APPLICATION_VERSION }} 

            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;

            @if( Auth::check() && Auth::getUser()->isSuperUser() )
                Generated in
                {{ sprintf( "%0.3f", microtime(true) - APPLICATION_STARTTIME ) }} 
                seconds
            @else
                Copyright &copy; 2009 - {{ now()->format('Y') }} Internet Neutral Exchange Association CLG
            @endif

            &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            Discover IXP Manager at:

            <a href="https://www.ixpmanager.org/">
                <i class="mx-1 fa fa-globe"></i>
            </a>

            <a href="{{ config('social.facebook.url') }}">
                <i class="mx-1 fa fa-facebook" ></i>
            </a>

            <a  href="{{ config('social.twitter.url') }}">
                <i class="mx-1 fa fa-twitter"></i>
            </a>

            <a  href="{{ config('social.github.url') }}">
                <i class="mx-1 fa fa-github"></i>
            </a>

            <a  href="https://docs.ixpmanager.org/">
                <i class="mx-1 fa fa-book"></i>
            </a>
        </div>
    </div>
</footer>
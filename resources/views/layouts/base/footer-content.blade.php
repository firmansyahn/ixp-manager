<footer class="p-3 mt-auto footer bg-slate-700">
    <div class="text-center text-gray-200 navbar-nav w-100">
        <div class="text-sm">
            IXP Manager @php APPLICATION_VERSION @endphp

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
                <i class="mx-1 fa fa-globe fa-inverse"></i>
            </a>

            <a href="https://www.facebook.com/ixpmanager">
                <i class="mx-1 fa fa-facebook fa-inverse" ></i>
            </a>

            <a  href="https://twitter.com/ixpmanager">
                <i class="mx-1 fa fa-twitter fa-inverse"></i>
            </a>

            <a  href="https://github.com/inex/IXP-Manager">
                <i class="mx-1 fa fa-github fa-inverse"></i>
            </a>

            <a  href="https://docs.ixpmanager.org/">
                <i class="mx-1 fa fa-book fa-inverse"></i>
            </a>
        </div>
    </div>
</footer>
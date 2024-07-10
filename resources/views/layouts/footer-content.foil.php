<footer class="p-3 mt-auto footer bg-dark">
    <div class="text-center navbar-nav w-100 text-light">
        <div>
            <small>
                IXP Manager V<?= APPLICATION_VERSION; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;

                <?php if( Auth::check() && Auth::getUser()->isSuperUser() ): ?>
                    Generated in
                    <?= sprintf( "%0.3f", microtime(true) - APPLICATION_STARTTIME ) ?>
                    seconds
                <?php else: ?>
                    Copyright &copy; 2009 - <?= now()->format('Y') ?> Internet Neutral Exchange Association CLG
                <?php endif; ?>
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

            </small>
        </div>
    </div>
</footer>
<footer class="p-3 mt-auto footer tw-text-sm">
    <div class="text-center navbar-nav w-100">
        <div class="tw-text-gray-700">
            IXP Manager v<?= APPLICATION_VERSION; ?>

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

            <a href="<?= config('identity.corporate_url') ?>">
                <i class="mx-1 fa fa-globe"></i>
            </a>

            <a href="<?= config('social.facebook.url') ?>">
                <i class="mx-1 fa fa-facebook" ></i>
            </a>

            <a  href="<?= config('social.twitter.url') ?>">
                <i class="mx-1 fa fa-twitter"></i>
            </a>

            <a  href="<?= config('social.github.url') ?>">
                <i class="mx-1 fa fa-github"></i>
            </a>

            <a  href="https://docs.ixpmanager.org/">
                <i class="mx-1 fa fa-book"></i>
            </a>
        </div>
    </div>
</footer>
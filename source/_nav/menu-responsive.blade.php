<nav id="js-nav-menu" class="nav-menu hidden lg:hidden fixed top-16 w-full">
    <ul class="my-0">
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Blog"
                href="/blog"
                class="nav-menu__item {{ $page->isActive('/blog') ? 'active text-green-900' : '' }}"
            >Blog</a>
        </li>

        <li class="px-4">
            <a href="https://github.com/jamessessford/"
                class="nav-menu__item text-green-800 hover:text-green-900">
                GitHub
            </a>
        </li>

        <li class="px-4">
            <a href="https://twitter.com/@sesticles"
                class="nav-menu__item text-green-800 hover:text-green-900">
                Twitter
            </a>
        </li>

        <li class="px-4">
            <a href="https://uk.linkedin.com/in/james-sessford-349b1511"
                class="nav-menu__item text-green-800 hover:text-green-900">
                Linked In
            </a>
        </li>

        <li class="px-4">
            <a href="https://open.spotify.com/artist/02ohzrviz4Z6EKjBysCRcg"
                class="nav-menu__item text-green-800 hover:text-green-900">
                Spotify
            </a>
        </li>
    </ul>
</nav>

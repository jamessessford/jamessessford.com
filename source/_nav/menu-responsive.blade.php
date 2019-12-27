<nav id="js-nav-menu" class="nav-menu hidden lg:hidden">
    <ul class="my-0">
        {{-- <li class="pl-4">
            <a
                title="{{ $page->siteName }} Blog"
                href="/blog"
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/blog') ? 'active text-blue' : '' }}"
            >Blog</a>
        </li> --}}

        <li class="px-4">
            <a title="James Sessford' GitHub account" href="#"
                class="nav-menu__item flex justify-between items-center">
                <img class="h-8 md:h-10 mr-3 inline-block" src="/assets/img/github-alt-brands.svg" alt="James Sessford' GitHub Account" />
                GitHub
            </a>
        </li>

        <li class="px-4">
            <a title="James Sessford' Twitter account" href="#"
                class="nav-menu__item flex justify-between items-center">
                <img class="h-8 md:h-10 mr-3 inline-block" src="/assets/img/twitter-square-brands.svg" alt="James Sessford' Twitter Account" />
                Twitter
            </a>
        </li>

        <li class="px-4">
            <a title="James Sessford' Linked In account" href="#"
                class="nav-menu__item flex justify-between items-center">
                <img class="h-8 md:h-10 mr-3 inline-block" src="/assets/img/linkedin-brands.svg" alt="James Sessford' Linked In Account" />
                Linked In
            </a>
        </li>
    </ul>
</nav>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->meta_description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
        <link rel="alternate" type="application/rss+xml" title="{{ $page->siteName }}" href="{{ $page->baseUrl.'/blog/rss.xml' }}" />

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans relative">
        <a class="focusable visually-hidden top-16 py-4 text-center block" href="#main-content">Skip to main content</a>
        <header class="flex items-center shadow bg-white border-b h-16 py-4" role="banner">
            <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <img class="h-8 md:h-10 mr-3 b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />

                        <h1 class="no-underline text-lg md:text-2xl text-green-800 font-semibold hover:text-green-900 my-0">{{ $page->siteName }}</h1>
                    </a>
                </div>
            </div>
        </header>

        @include('_nav.menu-responsive')

        <main role="main" class="flex-auto w-full container max-w-4xl mx-auto py-16 px-6" id="main-content">
            @yield('body')
        </main>

        <footer class="bg-white text-center text-sm mt-12 py-4 justify-center" role="contentinfo">
            Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>,
            <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a> and <a href="https://github.com/alpinejs/alpine/">Alpine</a>.
            <br />
            <a href="https://github.com/jamessessford/">
                Github
            </a>
            <a href="https://twitter.com/@sesticles" class="ml-4">
                Twitter
            </a>
            <a href="https://uk.linkedin.com/in/james-sessford-349b1511" class="ml-4">
                Linked In
            </a>
            <a href="https://open.spotify.com/artist/02ohzrviz4Z6EKjBysCRcg" class="ml-4">
                Spotify
            </a>
        </footer>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <script src="{{ mix('js/main.js', 'assets/build') }}" defer async></script>
        @stack('scripts')
    </body>
</html>

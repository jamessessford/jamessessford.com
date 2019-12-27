@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    
<img src="/assets/img/logo-large.svg"
        alt="Animated image of James Sessford"
        class="flex h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6 text-2xl">Hello friend, </p>

    <p class="mb-6">A Scottish PHP &amp; JavaScript developer spending time over the border.</p>

    <p class="mb-6">
        Currently bringing car leasing websites to a screen near you via <a href="http://www.atticusconsultancy.co.uk">Atticus Consultancy</a> and trying to
        improve the internet, one website at a time, with most of the other free time I have.
    </p>

    <p>My tech stack at work is:</p>
    <ul>
        <li>PHP (custom CMS built by Atticus)</li>
        <li>CSS (CSS3/Bootstrap)</li>
        <li>JavaScript (Vanilla/jQuery)</li>
        <li>MySQL</li>
        <li>Docker</li>
        <li>SCM (Git)</li>
        <li>Node.js</li>
    </ul>

    <p>My freelance tech stack is:</p>
    <ul>
        <li>All of the above &plus;</li>
        <li>Laravel</li>
        <li>React</li>
        <li>Tailwind</li>
        <li>Inertia.js</li>
    </ul>

    <p>Through work, freelance and tinkering in my own time, I have exposure to:</p>
    <ul>
        <li>React Native</li>
        <li>Materialize</li>
        <li>Skeleton</li>
        <li>TypeScript</li>
        <li>WordPress</li>
        <li>Linux</li>
        <li>Livewire</li>
    </ul>

    <p class="mb-6">
        I'm not currently looking for a new full time opportunity but I'm very interested in new freelance work.
        If you have a project you'd like to discuss, please get in touch via email @ hello(at)jamessessford(dot)com.
    </p>

    {{-- <p class="mb-6">
        Here you'll find musings on code, music, films, games and all of the other things I feel like talking about or trying to arrange into more cohesive thoughts.
    </p> --}}
@endsection

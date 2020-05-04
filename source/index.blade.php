@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')
    <img class="flex h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10 b-lazy"
        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
        data-src="/assets/img/logo-large.svg"
        alt="Animated image of James Sessford"
        >

    <p class="mb-6">A Scottish programmer, specialising in web application and UI development.</p>

    <h2 class="mb-2">The day job</h2>

    <p class="mb-2">
        By day I'm a senior developer at <a href="https://www.preferredmanagement.co.uk/">Preferred Management Solutions</a> and tasked with writing PHP, JavaScript &amp; CSS for Axis Workflow - a cloud based claims management system.
    </p>

    <p class="mb-6">
        I've long held the belief that if a project could run and be successful in the wild, it should be built and able to run
        on the most limited hardware I had access to. Whilst my original laptop and Rasbperry Pi have since been retired,
        this ethos has remained and all personal projects go through a development cycle reliant on my Raspberry Pi.
    </p>
    
    <h2 class="mb-2">The tech stack</h2>

    <p class="mb-2">Day to day, I'll be working with:</p>
    <ul class="mb-6">
        <li>PHP</li>
        <li>Laravel</li>
        <li>WordPress</li>
        <li>Livewire</li>
        <li>JavaScript</li>
        <li>TypeScript</li>
        <li>React</li>
        <li>Inertia.js</li>
        <li>React Native (Android)</li>
        <li>Redux</li>
        <li>CSS</li>
        <li>Tailwind</li>
        <li>Less</li>
        <li>Materialize</li>
        <li>Skeleton</li>
        <li>MySQL</li>
        <li>Redis</li>
        <li>Docker</li>
        <li>Linux</li>
        <li>Git, GitFlow, GitHub &amp; BitBucket</li>
        <li>Node.js</li>
    </ul>

    <p class="mb-6">
        <a href="/blog" title="{{ $page->siteName }}' blog">In my blog</a>, you'll find musings on code, music, films, games and all of the other things I feel like talking about or trying to arrange into more cohesive thoughts.
    </p>
@endsection

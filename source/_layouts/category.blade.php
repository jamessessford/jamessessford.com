@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')

    @if ($categories)
        <div class="flex flex-row justify-start flex-wrap">
            @foreach ($categories as $category => $_category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="bg-gray-300 hover:bg-blue-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded px-3 pt-px mr-2 mb-2"
            >
                {{ $category }}
            </a>
            @endforeach
        </div>
    @endif

    <h1>{{ $page->title }}</h1>

    <div class="text-2xl border-b border-blue-200 mb-6 pb-10">
        @yield('content')
    </div>

    @foreach ($page->posts($posts) as $post)
        @include('_components.post-preview-inline')

        @if (! $loop->last)
            <hr class="w-full border-b mt-2 mb-6">
        @endif
    @endforeach
@stop

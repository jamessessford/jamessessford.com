---
pagination:
    collection: posts
    perPage: 6
categories:
    collection: categories
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }} Blog" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="The list of blog posts for {{ $page->siteName }}" />
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

    <div class="flex flex-col md:my-4 divide-y divide-gray-400 space-y-2">
        @foreach ($pagination->items as $post)
            <div class="w-full py-4">
                @include('_components.post-preview-inline')
            </div>
        @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-gray-200 hover:bg-gray-400 text-green-800 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-green-900' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop

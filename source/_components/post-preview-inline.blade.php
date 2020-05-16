<div class="flex flex-col mb-4">
    <section class="flex flex-col lg:flex-row lg:justify-between lg:px-0">
        <p class="text-gray-700 font-medium my-0">
            {{ $post->getDate()->format('l F jS, Y') }}
        </p>

        @if ($post->categories)
            <section class="flex flex-row flex-wrap justify-start lg:justify-end">
                @foreach ($post->categories as $i => $category)
                    <span
                        class="inline-block bg-gray-300 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded px-3 pt-px mr-2 mb-2"
                    >{{ $category }}</span>
                @endforeach
            </section>
        @endif
    </section>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>
</div>

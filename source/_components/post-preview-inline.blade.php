<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-0">
        {{ $post->getDate()->format('l F jS, Y') }}
    </p>

    @if ($post->categories)
        <section class="flex flex-row flex-wrap my-2">
            @foreach ($post->categories as $i => $category)
                <span
                    class="inline-block bg-gray-300 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
                >{{ $category }}</span>
            @endforeach
        </section>
    @endif

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>
</div>

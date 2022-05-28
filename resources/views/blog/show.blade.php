<x-app-layout>
    <div class="container">
        <section class="bg-white relative border flex flex-col overflow-hidden rounded-lg">
            <div class="min-h-full w-auto" data-aos="fade-left">
                <img src="{{asset($post->imagePath)}}" class="h-full w-full aspect-video" alt="" />
            </div>
            <div class="flex flex-col flex-1 gap-3 px-3 py-2">
                <h1 class="text-lg font-medium">{{$post->title}}</h1>
                <div class="about-text">
                    {!!$post->body!!}
                </div>
                <p class="border-t bg-gradient-to-b mt-auto">
                    {{$post->created_at->diffForHumans()}}
                    <span>Written By {{$post->user->name}}</span>
                </p>

            </div>
        </section>
        <section class="my-3">
            <p>Похожие</p>
            <div class="grid grid-cols-6 gap-3">
                @foreach ($relatedPosts as $relatedPost )
                <a href="{{ route('blog.show', $relatedPost) }}">
                    <div class="border bg-white rounded-lg overflow-hidden">
                        <img src="{{asset($relatedPost->imagePath)}}" alt="" loading="lazy" />
                        <h4 class="p-2">
                            {{$relatedPost->title}}
                        </h4>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        <section>
            <p>Комментарии</p>
        </section>
    </div>
</x-app-layout>
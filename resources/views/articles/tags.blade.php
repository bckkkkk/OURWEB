<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('所有標籤') }}
        </h2>
    </x-slot>
	

    <div class="m-6"></div>

	
    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="mb-6 bg-gray-400 shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-6 text-gray-900 ">
                    <div class="flex flex-wrap">
                        @if($ifall == 1)
                        <div class="mx-2 mb-2">
                            <a href="{{ route('showalltags') }}" class="whitespace-nowrap bg-gray-200 text-gray-900 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"># {{ __("All") }}</a>
                        </div>
                        @else
                        <div class="mx-2 mb-2">
                            <a href="{{ route('showalltags') }}" class="whitespace-nowrap bg-white text-gray-900 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"># {{ __("All") }}</a>
                        </div>
                        @endif
                        @foreach($alltags as $tag)
                            @if($tag -> slug != $passtaged)
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('tagspage', $tag->slug) }}" class="whitespace-nowrap bg-white text-gray-900 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"># {{$tag -> name}}</a>
                                </div>
                            @else
                                <div class="mx-2 mb-2">
                                    <a href="{{ route('tagspage', $tag->slug) }}" class="whitespace-nowrap bg-gray-200 text-gray-900 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"># {{$tag -> name}}</a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

            @foreach($articles as $article)
                <div class="my-2">
                <div class="bg-white  shadow-sm sm:rounded-lg divide-y">
                    <div class="text-lg p-6 text-gray-900 ">
                        <div class="flex justify-between items-center">
                            <div class="font-semibold px-4">
                                <a href = "{{ route('articles.show', $article) }}"> {{ $article->title }} </a> 
                            </div>

                            @if ($article->user->is(auth()->user()))

                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('articles.edit', $article)">
                                                {{ __('修改') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('articles.destroy', $article) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('articles.destroy', $article)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('刪除') }}
                                                </x-dropdown-link>
                                            </form>
                                            <x-dropdown-link :href="route('joiners.show', $article)">
                                                {{ __('查看參加資料') }}
                                            </x-dropdown-link>
                                            @if($article -> send_already == 1)
                                            <x-dropdown-link :href="route('checks.show', $article)">
                                                {{ __('點名表') }}
                                            </x-dropdown-link>
                                            @endif
                                        </x-slot>
                            </x-dropdown>
                            @endif

                        </div>

                        <div class = "ml-2 text-base text-gray-500 py-4 px-6">
                            {{ $article->summary }}
                        </div>

                    </div>
                </div>   
                </div>
            @endforeach
                </div>
            </div>

        </div>
    </div>

</x-app-layout>

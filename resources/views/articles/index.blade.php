<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('文章列表') }}
        </h2>
    </x-slot>
	
	<a href = "{{route('articles.create')}}"> 新增文章</a>
    
	@foreach($articles as $article)
    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-6 text-gray-900 ">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold">
                            <a href = "{{ route('articles.show', $article) }}"> {{ $article->title }} </a> 
                        </div>

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
                                    </x-slot>
                        </x-dropdown>
                    </div>

                    <div class = "ml-2 text-gray-600 py-4">
						{{ $article->summary }}
                    </div>

                </div>
            </div>
        </div>
    </div>
	@endforeach
</x-app-layout>

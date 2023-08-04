<x-app-layout>
    <x-slot name="header" >
        <div class="flex space-x-12">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('attend') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    {{ __('參加的活動') }}
                </a>
            </div>
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('interest') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    {{ __('喜歡的活動') }}
                </a>
            </div>
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ route('hold') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    {{ __('籌辦的活動') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <button type = "submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250">
            <a href = "{{route('articles.create')}}"> 新增活動</a>
        </button>
    </div>

	@foreach(auth() -> user() -> articles  as $article)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-6 text-gray-900 ">
                <div class="flex justify-between items-center">
                        <div class="font-semibold px-4">
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
                                        <x-dropdown-link :href="route('joiners.show', $article)">
                                            {{ __('查看參加資料') }}
                                        </x-dropdown-link>
                                    </x-slot>
                        </x-dropdown>

                    </div>

                    <div class = "ml-2 text-base text-gray-500 py-4 px-6">
						{{ $article->summary }}
                    </div>

                </div>
            </div>
        </div>
    </div>
	@endforeach
</x-app-layout>

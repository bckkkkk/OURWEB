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

    <div class="m-6"></div>

	@foreach(auth() -> user() -> joinArticles  as $article)
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-6 text-gray-900 ">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold px-4">
                            <a href = "{{ route('articles.show', $article) }}"> {{ $article->title }} </a> 
                        </div>

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

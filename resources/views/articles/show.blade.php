<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('活動內容') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class = 'font-semibold text-3xl py-6 text-center'> {{ $article->title }}</h1>
                    <p class = "text-lg text-gray-700 py-2 px-6 whitespace-pre-wrap leading-relaxed">
                        {{ $article -> content }}
                    </P>

                    <div class="flex m-6 space-x-6 justify-center">
                    @auth
                        @if(auth() -> user() -> joinArticles -> find($article -> id))
                            <div class=" ">                            
                                <form method=" " action="{{ route('joiners.edit', $article) }}">
                                    @csrf
                                    <button class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("修改報名資料")}} </button>
                                </form>
                            </div>
                        @else
                        @if($isdate)
                            <div class=" ">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("我要報名！")}} </button>
                                </form>
                            </div>
                        @else
                            <div class="">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}" disabled class="px-3 py-1 rounded bg-indigo-125 text-white "> {{__("我要報名！")}} </button>
                                </form>
                                <p class = "text-sm text-red-500 py-2  ">{{ __("*現在不是報名期間") }}</P>
                            </div>
                        @endif
                        @endif
                    @else  
                        @if($isdate)
                        <div class=" ">                            
                            <form method=" " action="{{ route('joiners.create') }}">
                                @csrf
                                <button name="article_id" value="{{ $article->id }}" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("我要報名！")}} </button>
                            </form>
                        </div>
                         @else
                            <div class="">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}" disabled class="px-3 py-1 rounded bg-indigo-125 text-white "> {{__("我要報名！")}} </button>
                                </form>
                                <p class = "text-sm text-red-500 py-2  ">{{ __("*現在不是報名期間") }}</P>
                            </div>
                         @endif
                    @endauth

                        <div>
                            <form method="POST" action="{{ route('prefers.store') }}">
                                @csrf
                                <button name="article_id" value="{{ $article->id }}" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 "> {{__("加入喜歡清單")}} </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center px-12 pb-4">
                        @if(!$isdate)
                            
                        @endif
					    <a href = "{{route('dashboard')}}"> {{ __("回活動列表") }} </a>
                    </div>
                    <div>
						{!! $shareButtons !!}
					</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

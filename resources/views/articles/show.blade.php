<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('活動內容') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg " >
                <div class="p-6 text-gray-900">
                    <h1 class = 'font-semibold text-3xl py-6 text-center'> {{ $article->title }}</h1>
                    <p class = "text-lg text-gray-700 py-2 px-6 whitespace-pre-wrap leading-relaxed">
                        {{ $article -> content }}
                    </P>
                    @if($article->image != NULL)
                    <!-- <div class="flex">
                        <div class = "text-base text-gray-700 py-2 px-6  leading-relaxed">
                            {{ __("活動海報") }}
                        </div>
                        <div class=" w-full">
                            <hr class="w-64 h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
                            <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900"> {{ __("活動海報") }}</span>
                        </div>
                    </div> -->

                    <div class="inline-flex items-center py-2 px-6 w-full">
						<hr class="w-64 h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
						<span class="absolute px-3 font-medium text-gray-900  bg-white  dark:text-white dark:bg-gray-900">{{ __('活動海報') }}</span>
					</div>

                    <section class=" flex  items-start">
                        <button onclick="document.getElementById('myModal').showModal()" id="btn" class="py-2 px-6 ">
                            <img src="{{ asset('storage/' . $article->image) }}" class="max-w-sm h-auto"/>
                        </button>
                    </section>

                    <dialog id="myModal" class="h-8/12 w-11/12 md:w-1/2 md:h-4/6 lg:h-auto p-5 bg-white rounded-md ">
                            
                    <div class="flex flex-col w-full h-auto ">
                            <!-- Header -->
                            <div class="flex w-full h-auto justify-center items-center">
                            <div class="object-right w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold"> </div>
                            <svg onclick="document.getElementById('myModal').close();" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                                </svg>
                            <!--Header End-->
                            </div>
                            <!-- Modal Content-->
                            <div class="flex w-full h-auto py-2 px-2 justify-center items-center text-center content-center text-gray-500">
                                    <div class="py-2 px-6">
                                        <img src="{{ asset('storage/' . $article->image) }}" class=""/>
                                    </div>
                            </div>
                            <!-- End of Modal Content-->

                            </div>
                    </dialog>
                    @endif

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
                            @if($article -> maximum != NULL && count($article -> joiners) >= $article -> maximum)
                            <div class="">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}"  class="px-3 py-1 rounded bg-indigo-125 text-white hover:bg-indigo-150"> {{__("我要報名！")}} </button>
                                </form>
                                <p class = "text-sm text-red-500 py-2  ">{{ __("*報名人數已滿") }}</P>
                            </div>
                            @else
                            <div class=" ">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("我要報名！")}} </button>
                                </form>
                            </div>
                            @endif
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
                        @if($article -> maximum != NULL && count($article -> joiners) >= $article -> maximum)
                            <div class="">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}"  class="px-3 py-1 rounded bg-indigo-125 text-white hover:bg-indigo-150"> {{__("我要報名！")}} </button>
                                </form>
                                <p class = "text-sm text-red-500 py-2  ">{{ __("*報名人數已滿") }}</P>
                            </div>
                            @else
                            <div class=" ">                            
                                <form method=" " action="{{ route('joiners.create') }}">
                                    @csrf
                                    <button name="article_id" value="{{ $article->id }}" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("我要報名！")}} </button>
                                </form>
                            </div>
                            @endif
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

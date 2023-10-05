<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('點名表') }}
        </h2>
    </x-slot>
    <form action = "{{ route('decidedDate') }}" method = "post">  
		@csrf
        <input type="hidden" name="article_id" value="{{$article->id}}">

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 lg:pt-12 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="px-6 py-2">
                    {{ __("請選擇你需要的時間") }}
                </div>
                <div class="px-6 py-2 m-auto">
                    <select class="" name="decided">
                    @foreach($datePeriod as $date)
                        <option value="{{$date}}">{{$date}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="flex mt-4 space-x-6 px-6 py-2">
                    <div class="actions">
                        <button type="submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("填寫點名表")}} </button>
                    </div>
                    <div class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 ">	
                        <a href = "{{route('dashboard')}}" > {{__("回活動列表")}} </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('點名表') }}
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 lg:pt-12 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @foreach($Datelist as $date)
            <div> {{ $date }} </div>
            @endforeach
            {{ __("請選擇你需要的時間") }}
        </div>
    </div>
</x-app-layout>
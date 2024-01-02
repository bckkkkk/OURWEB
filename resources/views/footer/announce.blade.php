<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('發布注意事項') }}
    </h2>
</x-slot>
    @if(auth() -> user() -> allow == 'manager' || auth() -> user() -> allow == 'organizer')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 p-6">{{__("Hello World")}}</div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 p-6">{{__("(暫無消息)")}}</div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
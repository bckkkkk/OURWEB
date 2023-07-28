<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('參與名單') }}
        </h2>
    </x-slot>
	
	@foreach($article -> joiners as $joiner)
    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-6 text-gray-900 ">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold px-4">
                            <div> {{ $joiner -> name }} </div> 
                            <div> {{ $joiner -> email }} </div> 
                            <div> {{ $joiner -> gender }} </div> 
                            <div> {{ $joiner -> pivot -> phone }} </div> 
                            <div> {{ $joiner -> pivot -> birthday }} </div>
                            <div> {{ $joiner -> pivot -> ID_number }} </div>
                            <div> {{ $joiner -> pivot -> note }} </div>

                        </div>


                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
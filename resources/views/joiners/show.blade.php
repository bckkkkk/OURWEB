<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('參與名單') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white medium shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed w-full text-left dark:text-gray-400">
                            <thead class=" text-gray-900 uppercase dark:text-gray-400 text-base">
                                <tr>
                                    <th scope="col" class="px-6 py-3">{{ __(" ") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("姓名") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("信箱") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("性別") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("電話") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("生日") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("身分證字號") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("備註") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("缺席率") }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action = "{{ route('blackcheck') }}" method = "post">  
		@csrf
        <input type="hidden" name="article_id" value="{{$article->id}}">

	@foreach($blackfalse as $joiner)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed sm:w-auto lg:w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead>

                            </thead>
                            <tbody>
                                <tr scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                                    <td class="px-4 py-2 "> 
										<select class="" name="blacklist[]">
                                            <option value="notsure" {{ ($joiner -> pivot -> blacklist == "notsure")? 'selected':'' }}> {{__("備取")}} </option>
											<option value="false" {{ ($joiner -> pivot -> blacklist == "false")? 'selected':'' }}> {{__("已錄取")}} </option>
											<option value="true" {{ ($joiner -> pivot -> blacklist == "true")? 'selected':'' }}> {{__("加入黑名單")}} </option>
										</select>
										<input type="hidden" name="user_id[]" value="{{$joiner -> id}}">
									</td>
                                    <td class="px-6 py-2 "> {{ $joiner -> name }} </td> 
                                    <td class="px-6 py-2 break-words"> {{ $joiner -> email }} </td> 
                                    <td class="px-6 py-2"> {{ $joiner -> gender }} </td> 
                                    <td class="px-6 py-2"> {{ $joiner -> pivot -> phone }} </td> 
                                    <td class="px-6 py-2"> {{ $joiner -> pivot -> birthday }} </td>
                                    <td class="px-6 py-2"> {{ $joiner -> pivot -> ID_number }} </td>
                                    <td class="px-6 py-2 text-sm whitespace-nowrap lg:whitespace-pre-wrap"> {{ $joiner -> pivot -> note }} </td>
                                    @if($joiner -> attendance != 0)
                                        @if(($joiner -> absence)/($joiner -> attendance) >= 0.2)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $joiner -> absence }} {{__("/")}} {{ $joiner -> attendance }}</td>
                                        @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $joiner -> absence }} {{__("/")}} {{ $joiner -> attendance }}</td>
                                        @endif
                                    @elseif($joiner -> attendance != 0 && $joiner -> absence != 0)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $joiner -> absence }} {{__("/")}} {{ $joiner -> attendance }}</td>
                                    @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $joiner -> absence }} {{__("/")}} {{ $joiner -> attendance }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="inline-flex items-center justify-center w-full">
    <hr class="w-64 h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
    <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-gray-100 left-1/2 dark:text-white dark:bg-gray-900">{{ __('備取名單') }}</span>
    </div>

    @foreach($notsure as $notsurelist)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed sm:w-auto lg:w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead>

                            </thead>
                            <tbody>
                                <tr scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                                    <td class="px-4 py-2 "> 
										<select class="" name="blacklist[]">
                                            <option value="notsure" {{ ($notsurelist -> pivot -> blacklist == "notsure")? 'selected':'' }}> {{__("備取")}} </option>
											<option value="false" {{ ($notsurelist -> pivot -> blacklist == "false")? 'selected':'' }}> {{__("已錄取")}} </option>
											<option value="true" {{ ($notsurelist -> pivot -> blacklist == "true")? 'selected':'' }}> {{__("加入黑名單")}} </option>
										</select>
										<input type="hidden" name="user_id[]" value="{{$notsurelist -> id}}">
									</td>
                                    <td class="px-6 py-2 "> {{ $notsurelist -> name }} </td> 
                                    <td class="px-6 py-2 break-words"> {{ $notsurelist -> email }} </td> 
                                    <td class="px-6 py-2"> {{ $notsurelist -> gender }} </td> 
                                    <td class="px-6 py-2"> {{ $notsurelist -> pivot -> phone }} </td> 
                                    <td class="px-6 py-2"> {{ $notsurelist -> pivot -> birthday }} </td>
                                    <td class="px-6 py-2"> {{ $notsurelist -> pivot -> ID_number }} </td>
                                    
                                    <td class="px-6 py-2 text-sm whitespace-nowrap lg:whitespace-pre-wrap"> {{ $notsurelist -> pivot -> note }} </td>
                                    @if($notsurelist -> attendance != 0)
                                        @if(($notsurelist -> absence)/($notsurelist -> attendance) >= 0.2)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $notsurelist -> absence }} {{__("/")}} {{ $notsurelist -> attendance }}</td>
                                        @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $notsurelist -> absence }} {{__("/")}} {{ $notsurelist -> attendance }}</td>
                                        @endif
                                    @elseif($notsurelist -> attendance != 0 && $notsurelist -> absence != 0)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $notsurelist -> absence }} {{__("/")}} {{ $notsurelist -> attendance }}</td>
                                    @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $notsurelist -> absence }} {{__("/")}} {{ $notsurelist -> attendance }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="inline-flex items-center justify-center w-full">
    <hr class="w-64 h-px my-8 bg-gray-400 border-0 dark:bg-gray-700">
    <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-gray-100 left-1/2 dark:text-white dark:bg-gray-900">{{ __('黑名單') }}</span>
    </div>

    @foreach($blacktrue as $blacklist)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed sm:w-auto lg:w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead>

                            </thead>
                            <tbody>
                                <tr scope="row" class="px-6 py-4 text-gray-900 dark:text-white">
                                    <td class="px-4 py-2 "> 
										<select class="" name="blacklist[]">
                                            <option value="notsure" {{ ($blacklist -> pivot -> blacklist == "notsure")? 'selected':'' }}> {{__("備取")}} </option>
											<option value="false" {{ ($blacklist -> pivot -> blacklist == "false")? 'selected':'' }}> {{__("已錄取")}} </option>
											<option value="true" {{ ($blacklist -> pivot -> blacklist == "true")? 'selected':'' }}> {{__("加入黑名單")}} </option>
										</select>
										<input type="hidden" name="user_id[]" value="{{$blacklist -> id}}">
									</td>
                                    <td class="px-6 py-2 "> {{ $blacklist -> name }} </td> 
                                    <td class="px-6 py-2 break-words"> {{ $blacklist -> email }} </td> 
                                    <td class="px-6 py-2"> {{ $blacklist -> gender }} </td> 
                                    <td class="px-6 py-2"> {{ $blacklist -> pivot -> phone }} </td> 
                                    <td class="px-6 py-2"> {{ $blacklist -> pivot -> birthday }} </td>
                                    <td class="px-6 py-2"> {{ $blacklist -> pivot -> ID_number }} </td>
                                    <td class="px-6 py-2 text-sm whitespace-nowrap lg:whitespace-pre-wrap"> {{ $blacklist -> pivot -> note }} </td>
                                    @if($blacklist -> attendance != 0)
                                        @if(($blacklist -> absence)/($blacklist -> attendance) >= 0.2)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $blacklist -> absence }} {{__("/")}} {{ $blacklist -> attendance }}</td>
                                        @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $blacklist -> absence }} {{__("/")}} {{ $blacklist -> attendance }}</td>
                                        @endif
                                    @elseif($blacklist -> attendance != 0 && $blacklist -> absence != 0)
                                        <td class="px-6 py-2  indent-2 text-red-600 text-sm whitespace-nowrap"> {{ $blacklist -> absence }} {{__("/")}} {{ $blacklist -> attendance }}</td>
                                    @else
                                        <td class="px-6 py-2  indent-2 text-sm  whitespace-nowrap"> {{ $blacklist -> absence }} {{__("/")}} {{ $blacklist -> attendance }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if($article -> send_already != 1) 
    <div class="flex mt-4 space-x-6 max-w-7xl mx-auto sm:px-6 lg:px-8 ">
		<div class="actions">
            <button type="submit" class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250"> {{__("確定更改")}} </button> 
		</div>
        </form>

        <div>
            <form method = "post" action="{{ route('gainCheck') }}">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <button type="submit" class="px-3 py-1 rounded bg-red-150 text-white hover:bg-red-250">
                    {{__("取得點名表")}}
                </button> 
            </form>
            <div class="pt-2 text-red-600 text-sm ">	
                {{__("*取得點名表後無法更改參與名單")}}
            </div>
            <div class=" text-red-600 text-sm ">	
                {{__("*請先確定更改後再取得點名表")}}
            </div>
        </div>
	</div>
    @endif

    <div class="text-center px-12 p-4">
		<a href = "{{route('dashboard')}}"> {{ __("回活動列表") }} </a>
    </div>


</x-app-layout>
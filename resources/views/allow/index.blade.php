<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('參與名單') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white semibold shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed w-full text-left dark:text-gray-400">
                            <thead class=" text-gray-900 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">{{ __("姓名") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("信箱") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("性別") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("電話") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("生日") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("身分證字號") }}</th>
                                    <th scope="col" class="px-6 py-3">{{ __("備註") }}</th>
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
	
	@foreach($users as $user)
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class=" bg-white  shadow-sm sm:rounded-lg divide-y">
                <div class="text-lg p-4 text-gray-900 ">
                    <div class="relative overflow-x-auto">
                        <table class="table-fixed w-full text-base text-left text-gray-500 dark:text-gray-400">
                            <thead>

                            </thead>
                            <tbody>
								<form action = "{{ route('allow.update', $user) }}" method = "post">  
								@csrf
								@method('patch')
									<tr scope="row" class="px-6 py-4 text-gray-900">
										<td class="px-6 py-2 "> 
											<select class="" name="allow">
												<option value="manager" {{ ($user -> allow == "manager")? 'selected':'' }}> {{__("manager")}} </option>
												<option value="organizer" {{ ($user -> allow == "organizer")? 'selected':'' }}> {{__("organizer")}} </option>
												<option value="joiner" {{ ($user -> allow == "joiner")? 'selected':'' }}> {{__("joiner")}} </option>
											</select>
											<input type="hidden" name="user_id" value="{{$user->id}}">
										</td>
										<td class="px-6 py-2 "> {{ $user -> name }} </td>	
										<td>
											<button type="submit" class=""> {{__("修改")}} </button>	
										</td>
									</tr>
								</form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <button class="px-3 py-1 rounded bg-indigo-150 text-white hover:bg-indigo-250">	
            <a href = "{{route('dashboard')}}" > {{__("回到活動列表")}} </a>
        </button>
    </div>

</x-app-layout>
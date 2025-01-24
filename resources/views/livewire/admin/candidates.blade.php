<div class="candidates">
    <x-card title="WAGOMBEA" class="my-4 border-2 border-green-500 rounded-sm " shadow separator>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-4">

            @if ($candidates->count() > 0)

                @php
                    $president0 = \App\Models\Student::find($candidates[0]->president_id);
                    $vice0 = \App\Models\Student::find($candidates[0]->vice_id);
                @endphp

                <div class="border border-blue-500 jozi-1 first">
                    <div class="grid grid-cols-2">
                        <x-card class="w-full shadow-0">
                            <div class="my-2 bg-green-500">
                                <h3 class="text-xl font-bold text-center text-white">RAISI</h3>
                            </div>
                            <img src="{{ $candidates[0]->president_img }}" class="object-cover w-full">
                            <div class="p-3 bg-gray-100">
                                <h3 class="text-lg font-bold text-cente">
                                    {{ $president0->middle_name}} {{ $president0->first_name}} {{ $president0->last_name}}
                                </h3>
                                <an>{{ $president0->admission_number}} | <span class="font-bold text-green-500">{{ $president0->option }}</span></p>
                            </div>
                        </x-card>

                        <x-card class="w-full shadow-0">
                            <div class="my-2 bg-blue-500">
                                <h3 class="text-xl font-bold text-center text-white">MAKAMU</h3>
                            </div>
                            <img src="{{ $candidates[0]->vice_img }}" class="object-cover w-full">
                            <div class="p-3 bg-gray-100">
                                <h3 class="text-lg font-bold text-cente">
                                    {{ $vice0->middle_name}} {{ $vice0->first_name}} {{ $vice0->last_name}}
                                </h3>
                                <an>{{ $vice0->admission_number}} | <span class="font-bold text-green-500">{{ $vice0->option }}</span></p>
                            </div>
                        </x-card>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-button label="ONDOA JOZI HII" type='submit' icon-right="o-trash" spinner class="w-full max-w-md mb-2 rounded-none btn-error" />
                    </div>
                </div>
            @endif

            @if ($candidates->count() > 1)

                @php
                    $president1 = \App\Models\Student::find($candidates[1]->president_id);
                    $vice1 = \App\Models\Student::find($candidates[1]->vice_id);
                @endphp

                <div class="border border-green-500 jozi-1 first">
                    <div class="grid grid-cols-2">
                        <x-card class="w-full shadow-0">
                            <div class="my-2 bg-green-500">
                                <h3 class="text-xl font-bold text-center text-white">RAISI</h3>
                            </div>
                            <img src="{{ $candidates[1]->president_img }}" class="object-cover w-full">
                            <div class="p-3 bg-gray-100">
                                <h3 class="text-lg font-bold text-cente">
                                    {{ $president1->middle_name}} {{ $president1->first_name}} {{ $president1->last_name}}
                                </h3>
                                <an>{{ $president1->admission_number}} | <span class="font-bold text-green-500">{{ $president1->option }}</span></p>
                            </div>
                        </x-card>

                        <x-card class="w-full shadow-0">
                            <div class="my-2 bg-blue-500">
                                <h3 class="text-xl font-bold text-center text-white">MAKAMU</h3>
                            </div>
                            <img src="{{ $candidates[1]->vice_img }}" class="object-cover w-full">
                            <div class="p-3 bg-gray-100">
                                <h3 class="text-lg font-bold text-cente">
                                    {{ $vice1->middle_name}} {{ $vice1->first_name}} {{ $vice1->last_name}}
                                </h3>
                                <an>{{ $vice1->admission_number}} | <span class="font-bold text-green-500">{{ $vice1->option }}</span></p>
                            </div>
                        </x-card>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-button label="ONDOA JOZI HII" type='submit' icon-right="o-trash" spinner class="w-full max-w-md mb-2 rounded-none btn-error" />
                    </div>
                </div>

            @endif

        </div>

    </x-card>

    <x-card title="FOMU YA KUWEKA WAGOMBEA" class="my-4 border-2 border-black rounded-sm " shadow separator>
        @if ($candidates->count() == 2)
            <x-button label="WAGOMBEA WOTE WAMESHASAJILIWA" type='submit' icon-right="o-check" spinner class="w-full mb-2 text-white rounded-none btn-lg btn-success" />
        @else
            <x-form wire:submit="registerCandidate">
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-4">

                    <x-card class="w-full shadow-0">
                        <div class="my-2 bg-green-500">
                            <h3 class="text-xl font-bold text-center text-white">MGOMBEA WA URAISI</h3>
                        </div>

                        <label for="president_id" class="block my-4 text-lg font-bold text-gray-700">CHAGUA JINA LA MGOMBEA</label>
                        <select id="president_id" name="president_id" required wire:model='president_id' class="block w-full mt-1 border-gray-300 rounded-md shadow-sm select select-lg">
                            <option value="">WEKA MGOMBEA</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" class="text-lg">
                                     {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} - {{ $student->admission_number }}
                                </option>
                            @endforeach
                        </select>

                        <div class="flex items-center justify-center my-4">
                            <x-file wire:model="president_img" required accept="image/png, image/jpeg">
                                <img src="{{ $user->avatar ?? '/img/avatar_sample.png' }}" class="h-40 rounded-lg" />
                            </x-file>
                        </div>

                    </x-card>

                    <x-card class="w-full shadow-0">
                        <div class="my-2 bg-blue-500">
                            <h3 class="text-xl font-bold text-center text-white">MAKAMU WA RAISI</h3>
                        </div>

                        <label for="vice_id" class="block my-4 text-lg font-bold text-gray-700">CHAGUA JINA LA MGOMBEA</label>
                        <select id="vice_id" name="vice_id" required wire:model='vice_id' class="block w-full mt-1 border-gray-300 rounded-md shadow-sm select select-lg">
                            <option value="">WEKA MAKAMU</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" class="text-lg">
                                     {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }} - {{ $student->admission_number }}
                                </option>
                            @endforeach
                        </select>

                        <div class="flex items-center justify-center my-4">
                            <x-file wire:model="vice_img" required accept="image/png, image/jpeg">
                                <img src="{{ $user->avatar ?? '/img/avatar_sample.png' }}" class="h-40 rounded-lg" />
                            </x-file>
                        </div>
                    </x-card>

                </div>

                <div class="flex items-center justify-center">
                    <x-button label="SAJILI WAGOMBEA" type='submit' icon-right="o-archive-box" spinner class="w-full mb-2 text-white rounded-none btn-success btn-lg" />
                </div>
            </x-form>
        @endif

    </x-card>
</div>

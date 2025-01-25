<div>
    <div class="flex items-center justify-center">
        <h1 class="text-4xl font-bold text-white uppercase glowing-text">
            UCHAGUZI WA SERIKALI YA WANACHUO {{ now()->year }}
        </h1>
    </div>

    <x-card>
        <x-header title="KARIBU {{ $voter->first_name }} {{ $voter->middle_name }} {{ $voter->last_name }}" subtitle="Paza sauti yako kwa kupiga kura kwa rais na makamu wa rais unaempendelea!" size="text-2xl" class="text-green-500" separator progress-indicator>
            <x-slot:middle class="!justify-end">
                <x-button label="Ondoka kwenye akaunti" class="text-white btn-sm btn-error" icon-right="o-power" spinner no-wire-navigate link="/voter/logout" />
            </x-slot:middle>
        </x-header>
        <p>Admission Number: <b>{{ $voter->admission_number }}</b></p>
        <p>Option: <b>{{ $voter->option }}</b></p>

        @if ($hasVoted)
            <div class="flex justify-center h-20 mt-4 text-3xl font-bold text-center text-white bg-green-500 border align-self-center">
                <div class="flex items-center py-2">
                    <b>HONGERA UMESHAPIGA KURA 😊</b>
                </div>
            </div>

            @php
                $pr = \App\Models\Student::find($selectedCandidate->president_id);
                $vc = \App\Models\Student::find($selectedCandidate->vice_id);
            @endphp

            <div class="flex justify-center">
                <div class="grid grid-cols-2 gap-12 my-4">
                    <div class="text-center president">
                        <img src="{{ $selectedCandidate->president_img }}" alt="">
                        <b> RAISI:</b>
                        {{ $pr->first_name }}
                        {{ $pr->middle_name }}
                        {{ $pr->last_name }}
                    </div>

                    <div class="text-center vice">
                        <img src="{{ $selectedCandidate->vice_img }}" alt="">
                        <b> MAKAMU:</b>
                        {{ $vc->first_name }}
                        {{ $vc->middle_name }}
                        {{ $vc->last_name }}
                    </div>
                </div>
            </div>
        @else
            <x-alert icon="o-information-circle" class="my-6 text-center text-white alert-info">
                <b>KARIBU KUPIGA KURA. KURA YAKO NI MUHIMU</b>
            </x-alert>
        @endif
    </x-card>

    @if (!$hasVoted)
        <x-card title="WAGOMBEA WA UCHAGUZI WA SERIKALI YA WANACHUO {{ now()->year }}" class="my-4 border-2 border-green-500 rounded-sm" shadow separator>
            <form wire:submit='submitVote'>
                @csrf
                <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-4">
                    @if ($candidates->count() > 0)
                        @php
                            $president0 = \App\Models\Student::find($candidates[0]->president_id);
                            $vice0 = \App\Models\Student::find($candidates[0]->vice_id);
                        @endphp

                        <div class="p-4 border border-blue-500 jozi-1 first">
                            <div class="grid grid-cols-2">
                                <x-card class="w-full shadow-0">
                                    <div class="my-2 bg-green-500">
                                        <h3 class="text-xl font-bold text-center text-white">RAISI</h3>
                                    </div>
                                    <img src="{{ $candidates[0]->president_img }}" class="object-cover w-full">
                                    <div class="p-3 bg-gray-100">
                                        <h3 class="text-lg font-bold">
                                            {{ $president0->middle_name }} {{ $president0->first_name }} {{ $president0->last_name }}
                                        </h3>
                                        <p>{{ $president0->admission_number }} | <span class="font-bold text-green-500">{{ $president0->option }}</span></p>
                                    </div>
                                </x-card>

                                <x-card class="w-full shadow-0">
                                    <div class="my-2 bg-blue-500">
                                        <h3 class="text-xl font-bold text-center text-white">MAKAMU</h3>
                                    </div>
                                    <img src="{{ $candidates[0]->vice_img }}" class="object-cover w-full">
                                    <div class="p-3 bg-gray-100">
                                        <h3 class="text-lg font-bold">
                                            {{ $vice0->middle_name }} {{ $vice0->first_name }} {{ $vice0->last_name }}
                                        </h3>
                                        <p>{{ $vice0->admission_number }} | <span class="font-bold text-green-500">{{ $vice0->option }}</span></p>
                                    </div>
                                </x-card>
                            </div>

                            <div class="flex justify-center mt-4 bg-gray-200 border border-green-600">
                                <label class="flex items-center py-2">
                                    <input type="radio" name="candidate" wire:model='candidate' value="{{ $candidates[0]->id }}" class="m-4 radio radio-success input-md cursor-grab" required>
                                    <span class="text-xl font-bold">CHAGUA WAGOMBEA HAWA</span>
                                </label>
                            </div>

                        </div>
                    @endif

                    @if ($candidates->count() > 1)
                        @php
                            $president1 = \App\Models\Student::find($candidates[1]->president_id);
                            $vice1 = \App\Models\Student::find($candidates[1]->vice_id);
                        @endphp

                        <div class="p-4 border border-green-500 jozi-1 first">
                            <div class="grid grid-cols-2">
                                <x-card class="w-full shadow-0">
                                    <div class="my-2 bg-green-500">
                                        <h3 class="text-xl font-bold text-center text-white">RAISI</h3>
                                    </div>
                                    <img src="{{ $candidates[1]->president_img }}" class="object-cover w-full">
                                    <div class="p-3 bg-gray-100">
                                        <h3 class="text-lg font-bold">
                                            {{ $president1->middle_name }} {{ $president1->first_name }} {{ $president1->last_name }}
                                        </h3>
                                        <p>{{ $president1->admission_number }} | <span class="font-bold text-green-500">{{ $president1->option }}</span></p>
                                    </div>
                                </x-card>

                                <x-card class="w-full shadow-0">
                                    <div class="my-2 bg-blue-500">
                                        <h3 class="text-xl font-bold text-center text-white">MAKAMU</h3>
                                    </div>
                                    <img src="{{ $candidates[1]->vice_img }}" class="object-cover w-full">
                                    <div class="p-3 bg-gray-100">
                                        <h3 class="text-lg font-bold">
                                            {{ $vice1->middle_name }} {{ $vice1->first_name }} {{ $vice1->last_name }}
                                        </h3>
                                        <p>{{ $vice1->admission_number }} | <span class="font-bold text-green-500">{{ $vice1->option }}</span></p>
                                    </div>
                                </x-card>
                            </div>

                            <div class="flex justify-center mt-4 bg-gray-200 border border-green-600">
                                <label class="flex items-center py-2">
                                    <input type="radio" name="candidate" wire:model='candidate' value="{{ $candidates[1]->id }}" class="m-4 radio radio-success input-md cursor-grab" required>
                                    <span class="text-xl font-bold">CHAGUA WAGOMBEA HAWA</span>
                                </label>
                            </div>

                        </div>
                    @endif
                </div>
                <div class="mt-6 text-center">
                    <button type="submit" class="w-full mb-2 text-white rounded-none btn btn-success btn-lg">THIBITISHA CHAGUO LAKO</button>
                </div>
            </form>
        </x-card>
    @endif
</div>

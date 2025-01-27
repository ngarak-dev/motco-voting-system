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
        <hr class="my-4">

        <div class="grid grid-cols-1 my-8 text-center bg-red-300 rounded-md justify-items-center">
            <img src="{{ asset('img/time_management.gif') }}" class="h-48 my-6" alt="">

            <div class="flex items-center justify-center w-full h-20 mt-4 text-3xl font-bold text-center text-white bg-amber-500">
                <b>MUDA WA UCHAGUZI HAUJAFIKA AU UMEISHA</b>
            </div>
        </div>

    </x-card>
</div>

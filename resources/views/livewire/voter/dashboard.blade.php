<div>
    <div class="flex items-center justify-center">
        <h1 class="text-4xl font-bold text-white uppercase glowing-text ">UCHAGUZI WA SERIKALI YA WANACHUO {{ now()->year }}</h1>
    </div>

    <x-card>
        <x-header title="KARIBU {{ $voter->first_name}} {{ $voter->middle_name  }} {{ $voter->last_name  }}" subtitle="Paza sauti yako kwa kupiga kura kwa rais na makamu wa rais unaempendelea!" size="text-2xl" class="text-green-500" separator progress-indicator>
            <x-slot:middle class="!justify-end">
                <x-button label="Ondoka kwenye akaunti" class="text-white btn-sm btn-error" icon-right="o-power" spinner no-wire-navigate link="/voter/logout" />
            </x-slot:middle>
        </x-header>
        <p>Admission Number: <b>{{ $voter->admission_number }}</b></p>
        <p>Option: <b>{{ $voter->option }}</b></p>

        <x-alert icon="o-exclamation-triangle" class="my-6 text-center text-white alert-success">
            <b>BADO HAUJAPIGA KURA</b>
        </x-alert>
    </x-card>

</div>

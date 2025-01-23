<div>
    <div class="flex justify-center mb-4">
        <h1>UCHAGUZI WA SERIKALI YA WANACHUO 2025</h1>
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

    <style>
        h1 {
            font-size: 3rem;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: textGlow 2s ease-in-out infinite alternate;
        }

        /* Glowing Text Animation */
        @keyframes textGlow {
            0% {
                text-shadow: 0 0 15px #0b871c, 0 0 25px #0b871c, 0 0 35px #0b871c;
            }
            100% {
                text-shadow: 0 0 15px #1abc9c, 0 0 25px #1abc9c, 0 0 35px #1abc9c;
            }
        }
    </style>

</div>

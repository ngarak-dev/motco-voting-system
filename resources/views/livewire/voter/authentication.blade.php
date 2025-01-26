<div class="flex items-center justify-center min-h-screen">

    <style>
        body::before {
            background: url({{ asset('img/election.png') }}) no-repeat center center fixed !important;
        }
    </style>

    <x-card shadow separator class="w-full max-w-md border border-green-600 shadow-md login-container">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/logo_kura.svg') }}" class="h-46"/>
        </div>

        <x-header title="{{ $title }}" size="text-xl" subtitle="Ingia kwenye akaunti" separator progress-indicator>
            <x-slot:actions>
                <x-theme-toggle darkTheme="dark" lightTheme="light" />
            </x-slot:actions>
        </x-header>

        <x-form wire:submit='login' class="flex flex-col items-center w-full">
            <x-input class="w-full uppercase input-success input-lg" oninput="this.value = this.value.toUpperCase();" placeholder="Namba ya usajili" icon="o-user" wire:model="admission_number" type="text" />
            <x-input class="w-full uppercase input-success input-lg" oninput="this.value = this.value.toUpperCase();" placeholder="Neno siri" icon="o-key" hint="" wire:model.defer='password' type="password" />

            <x-button @click="$wire.infoModal = true" class="text-white btn-error">JINSI YA KUJUA NENO SIRI</x-button>

            <div class="w-full mt-4">
                <x-button label="Ingia" type="submit" icon-right="o-cursor-arrow-rays" spinner class="w-full text-white rounded-none btn-success" />
            </div>
        </x-form>
    </x-card>

    <x-modal wire:model="infoModal" class="w-full backdrop-blur">
        <x-card title="NENO SIRI" class="w-full text-start" shadow separator>
            <p class="border-bottom">Kila mpiga kura ataingia kwenye mfumo kwa kutumia namba yake ya usajili na neno siri ambalo ni mchanganyiko wa taarifa zake binafsi. Neno siri linajumuisha herufi ya kwanza ya jina la mpiga kura, mwaka wa kuzaliwa, mwezi wa kuzaliwa na kifupi cha aina ya program anayosoma.</p>
            <pre class="my-4">
                <u class="font-bold">MFANO</u>
                Jina la kwanza: JUMA
                Tarehe ya kuzaliwa: 02.11.2000
                Programu: <b>SD</b> yaani SPECIAL / <b>OD</b> yaani NORMAL

                <i>Mchanganyiko</i>: HERUFI YA KWANZA YA JINA, MWAKA WA KUZALIWA,
                MWEZI WA KUZALIWA, KIFUPI CHA PROGRAMU
                Neno siri litakua: <b>J200011OD</b>
            </pre>
        </x-card>
        <x-button label="Funga dirisha" @click="$wire.infoModal = false" />
    </x-modal>
</div>

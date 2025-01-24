<div class="flex flex-col items-center justify-center min-h-screen space-y-6 text-center">
    <x-theme-changer class="hidden"></x-theme-changer>

    <div class="flex items-center justify-center">
        <h1 class="text-5xl font-bold text-white uppercase glowing-text ">UCHAGUZI WA SERIKALI YA WANACHUO {{ now()->year }}</h1>
    </div>

    <x-card title="NENO SIRI" class="max-w-6xl text-start" shadow separator>
        <p class="border-bottom">Kila mpiga kura ataingia kwenye mfumo kwa kutumia namba yake ya usajili na neno siri ambalo ni mchanganyiko wa taarifa zake binafsi. Neno siri linajumuisha herufi ya kwanza ya jina la mpiga kura, mwaka wa kuzaliwa, mwezi wa kuzaliwa na kifupi cha aina ya program anayosoma.</p>
        <pre class="my-4">
            <u class="font-bold">MFANO</u>
            Jina la kwanza: JUMA
            Tarehe ya kuzaliwa: 11.02.2000
            Programu: <b>SD</b> yaani SPECIAL / <b>OD</b> yaani NORMAL

            Mchanganyiko: HERUFI YA KWANZA YA JINA, MWAKA WA KUZALIWA, MWEZI WA KUZALIWA, KIFUPI CHA PROGRAMU
            Neno siri litakua: <b>J200011OD</b>
        </pre>
    </x-card>

    <x-button label="INGIA KUPIGA KURA" class="text-white rounded-none btn-success btn-lg" icon-right="o-lock-closed" no-wire-navigate spinner link="/voter/sign-in" />
</div>

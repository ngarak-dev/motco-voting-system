<div class="flex flex-col items-center justify-center min-h-screen space-y-6 text-center">
    <x-theme-changer class="hidden"></x-theme-changer>
    <h1>KARIBU KWENYE MFUMO WA UPIGAJI KURA</h1>

    <x-card title="NENO SIRI" subtitle="Kila mpiga kura ataingia kwenye mfumo kwa kutumia namba yake ya usajili na neno siri ambalo ni mchanganyiko wa taarifa zake binafsi. Neno siri linajumuisha herufi ya kwanza ya jina la mpiga kura, mwaka wa kuzaliwa, mwezi wa kuzaliwa na kifupi cha aina ya program anayosoma."
        class="max-w-6xl text-start" shadow separator>
        <pre class="my-4">
            <u class="font-bold">MFANO</u>
            Jina la kwanza: JUMA
            Tarehe ya kuzaliwa: 11.02.2000
            Programu: <b>SD</b> yaani SPECIAL / <b>OD</b> yaani NORMAL

            Mchanganyiko: HERUFI YA KWANZA YA JINA, MWAKA WA KUZALIWA, MWEZI WA KUZALIWA, KIFUPI CHA PROGRAMU
            Neno siri litakua: <b>J200011OD</b>
        </pre>
    </x-card>

    <x-button label="INGIA KUPIGA KURA" class="rounded-none btn-primary btn-lg" icon-right="o-lock-closed" no-wire-navigate spinner link="/voter/sign-in" />

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
                text-shadow: 0 0 15px #ff6347, 0 0 25px #ff6347, 0 0 35px #ff6347;
            }
            100% {
                text-shadow: 0 0 15px #1abc9c, 0 0 25px #1abc9c, 0 0 35px #1abc9c;
            }
        }
    </style>
</div>

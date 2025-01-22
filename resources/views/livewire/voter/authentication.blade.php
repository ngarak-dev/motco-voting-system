<div class="flex items-center justify-center min-h-screen">
    <style>
        .login-container {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

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
            <x-input class="w-full input-success" placeholder="Namba ya usajili" icon="o-user" wire:model="admission_number" type="text" />
            <x-input class="w-full input-success" placeholder="Neno siri" icon="o-key" hint="" wire:model.defer='password' type="password" />

            <div class="w-full mt-4">
                <x-button label="Ingia" type="submit" icon-right="o-cursor-arrow-rays" spinner class="w-full rounded-none" />
            </div>
        </x-form>
    </x-card>
</div>

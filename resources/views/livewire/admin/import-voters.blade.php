<div class="my-5">
    <x-card title="PANDISHA ORODHA YA WAPIGA KURA KWENYE MFUMO" class="my-4" shadow separator progress-indicator>
        <x-form wire:submit='importStudents'>
            <x-file wire:model="excel_file" class=" focus" label="Weka orodha ya wapiga kura" hint="Excel Documents Only"
                accept=".xls,.xlsx" />

                @if ($is_uploading)
                    <div>
                        Inapindisha majina ya wapiga kura ..
                    </div>
                @endif

            <x-button label="Pandisha wapiga kura" type='submit' icon-right="o-paper-clip" spinner class="text-green-500" />
        </x-form>
    </x-card>

    <x-card>
        <x-header subtitle="REGISTERED VOTERS" class="text-xl text-bold" separator progress-indicator>
            <x-slot:middle class="!justify-end">
                <x-input placeholder="Tafuta..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
            </x-slot:middle>
        </x-header>

        <x-table :headers="$headers" :rows="$voters" :sort-by="$sortBy" per-page="perPage" :per-page-values="[20, 50, 100]">
            <x-slot:empty>
                <x-icon name="o-cube" label="Hamna wapiga kura." />
            </x-slot:empty>
        </x-table>
    </x-card>
</div>

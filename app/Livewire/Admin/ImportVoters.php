<?php

namespace App\Livewire\Admin;

use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Imports\StudentImport;
use Livewire\Attributes\Title;
use App\Models\RegisteredVoter;
use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('components.layouts.admin')]
#[Title('Pandisha wapiga kura')]
class ImportVoters extends Component {
    use WithFileUploads;
    use Toast;
    use WithPagination;

    #[Validate('required')]
    public $excel_file;
    public bool $is_uploading = false;
    public string $search = '';
    public array $sortBy = ['column' => 'id', 'direction' => 'asc'];
    public int $perPage = 20;

    public function headers(): array {
        return [
            ['key' => 'admission_number', 'label' => 'NAMBA YA USAJILI', 'class'=> 'w-40 font-bold'],
            ['key' => 'first_name', 'label' => 'JINA LA KWANZA', 'class' => 'w-64'],
            ['key' => 'middle_name', 'label' => 'JINA LA KATI', 'class' => 'w-64'],
            ['key' => 'last_name', 'label' => 'JINA LA MWISHO', 'class' => 'w-64'],
            ['key' => 'sex', 'label' => 'JINSIA', 'class' => 'w-40'],
            ['key' => 'program', 'label' => 'PROGRAMU', 'class' => 'w-80'],
            ['key' => 'option', 'label' => 'TAHASUSI', 'class' => 'w-40'],
        ];
    }

    public function voters(): \Illuminate\Pagination\LengthAwarePaginator {
        $query = Student::query()->orderBy(...array_values($this->sortBy));

        if ($this->search) {
            $searchTerm = strtolower($this->search);
            $query->where(function ($query) use ($searchTerm) {
                $query->whereRaw('LOWER(first_name) LIKE ?', ["%{$searchTerm}%"])
                    ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$searchTerm}%"])
                    ->orWhereRaw('LOWER(admission_number) LIKE ?', ["%{$searchTerm}%"]);
            });
        }

        return $query->paginate($this->perPage);
    }

    public function importStudents(Request $request) {
        $this->is_uploading = true;
        Excel::import(new StudentImport, $this->excel_file);

        $this->success('Imefanikiwa', 'Wanachuo wameingia kwenye mfumo!');
        $this->is_uploading = false;
        return redirect()->back();
    }

    public function render() {
        return view('livewire.admin.import-voters', [
            'headers' => $this->headers(),
            'voters' => $this->voters()
        ]);
    }
}

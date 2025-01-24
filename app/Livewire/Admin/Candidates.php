<?php

namespace App\Livewire\Admin;

use Tinify\Tinify;
use Mary\Traits\Toast;
use App\Models\Student;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.admin')]

class Candidates extends Component {

    use WithFileUploads;
    use Toast;

    public $students, $candidates;

    #[Validate('required')]
    public $president_img;

    #[Validate('required')]
    public $vice_img;

    #[Validate('required')]
    public $president_id;

    #[Validate('required')]
    public $vice_id;

    public function mount () {
        $this->students = Student::orderBy('first_name', 'asc')->get();
        $this->candidates = Candidate::with('student')->orderBy('id', 'asc')->get();
    }

    public function registerCandidate () {
        $this->validate();

        $presidentImgSource = $this->president_img->getPathName();
        $viceImgSource = $this->vice_img->getPathName();

        $prImgContent = file_get_contents($presidentImgSource);
        $presidentBase64 = 'data:image/' . $this->president_img->getClientOriginalExtension() . ';base64,' . base64_encode($prImgContent);

        $vcImgContent = file_get_contents($viceImgSource);
        $viceBase64 = 'data:image/' . $this->vice_img->getClientOriginalExtension() . ';base64,' . base64_encode($vcImgContent);

        Log::info('IDS', [$this->president_id, $this->vice_id]);

        Candidate::upsert([
            'president_id' => $this->president_id,
            'president_img' => $presidentBase64,
            'vice_id' => $this->vice_id,
            'vice_img' => $viceBase64,
        ], []);

        $this->success('Jozi ya wagombea imeingia kwenye mfumo !');
        return redirect()->route('admin-candidates')->with('success', 'Jozi ya wagombea imeingia kwenye mfumo !');
    }

    public function removeCandidate ($string) {
        $candidate = Candidate::find($string);
        $candidate[0]->delete();

        $this->success('Jozi ya wagombea imetolewa kwenye mfumo !');
        return redirect()->route('admin-candidates')->with('success', 'Jozi ya wagombea imetolewa kwenye mfumo !');
    }

    public function render()   {
        return view('livewire.admin.candidates');
    }
}

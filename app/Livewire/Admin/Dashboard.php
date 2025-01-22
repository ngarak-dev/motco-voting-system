<?php

namespace App\Livewire\Admin;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\StudentImport;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Dashboard extends Component {

    use Toast;
    use WithFileUploads;

    #[Validate('required')]
    public $excel_file;


    public function logout () {
        Auth::logout();
        $this->success('Imefanikiwa');
        return redirect()->route('admin-sign-in');
    }

    public function importStudents(Request $request) {
        Excel::import(new StudentImport, $this->excel_file);

        $this->success('Imefanikiwa', 'Wanachuo wameingia kwenye mfumo!');
        return redirect()->back();
    }

    public function render() {
        return view('livewire.admin.dashboard');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactComponent extends Component
{
    public $data, $name, $phone, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = Contact::all();
        return view('livewire.contacts.component');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Contact::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->phone = $record->phone;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Contact::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contact::where('id', $id);
            $record->delete();
        }
    }
}

<?php
namespace App\Livewire\Firma;

use Livewire\Component;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;

class Ilanlar extends Component
{
    public $ilanlar;
    public $title;
    public $description;
    public $editing = false;
    public $editId;

    public function mount()
    {
        $this->loadIlanlar();
    }

    public function loadIlanlar()
    {
        $this->ilanlar = JobPost::where('user_id', auth()->id())->latest()->get();
    }

   public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        JobPost::create([
            'title' => $this->title,
            'description' => $this->description,
            'firma_id' => Auth::user()->firma_id,
            'user_id' => Auth::id(),
        ]);

        $this->reset(['title', 'description']);
        $this->loadIlanlar();
    }

    public function edit($id)
    {
        $ilan = JobPost::findOrFail($id);
        $this->editId = $ilan->id;
        $this->title = $ilan->title;
        $this->description = $ilan->description;
        $this->editing = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $ilan = JobPost::findOrFail($this->editId);
        $ilan->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description', 'editing', 'editId']);
        $this->loadIlanlar();
    }

    public function cancel()
    {
        $this->reset(['title', 'description', 'editing', 'editId']);
    }

    public function delete($id)
    {
        $ilan = JobPost::findOrFail($id);
        $ilan->delete();
        $this->loadIlanlar();
    }

    public function render()
    {
        return view('livewire.firma.ilanlar');
    }
}

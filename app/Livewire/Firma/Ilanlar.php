<?php
namespace App\Livewire\Firma;

use Livewire\Component;
use App\Models\JobPost;

class Ilanlar extends Component
{
    public $ilanlar;

    public $title;
    public $description;
    public $editingId = null;

    public function mount()
    {
        $this->loadIlanlar();
    }

    public function loadIlanlar()
    {
        $this->ilanlar = JobPost::where('user_id', auth()->id())->latest()->get();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($this->editingId) {
            // Güncelleme
            $ilan = JobPost::where('user_id', auth()->id())->findOrFail($this->editingId);
            $ilan->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            session()->flash('success', 'İlan başarıyla güncellendi.');
        } else {
            // Yeni kayıt
            JobPost::create([
                'user_id' => auth()->id(),
                'title' => $this->title,
                'description' => $this->description,
            ]);
            session()->flash('success', 'İlan başarıyla eklendi.');
        }

        // Formu sıfırla
        $this->reset(['title', 'description', 'editingId']);

        // Listeyi yenile
        $this->loadIlanlar();
    }

    public function edit($id)
    {
        $ilan = JobPost::where('user_id', auth()->id())->findOrFail($id);

        $this->editingId = $ilan->id;
        $this->title = $ilan->title;
        $this->description = $ilan->description;
    }

    public function delete($id)
    {
        $ilan = JobPost::where('user_id', auth()->id())->findOrFail($id);
        $ilan->delete();

        session()->flash('success', 'İlan silindi.');

        $this->loadIlanlar();
    }

    public function cancelEdit()
    {
        $this->reset(['title', 'description', 'editingId']);
    }

    public function render()
    {
        return view('livewire.firma.ilanlar');
    }
}

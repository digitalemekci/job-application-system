<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">CV Yükle</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="upload" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="cv" class="block font-semibold mb-2">CV (PDF)</label>
            <input type="file" id="cv" wire:model="cv" accept="application/pdf" class="w-full border p-2 rounded">
            @error('cv') 
                <span class="text-red-600 text-sm">{{ $message }}</span> 
            @enderror
        </div>

        <button type="submit" 
                class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            Yükle
        </button>
    </form>
</div>

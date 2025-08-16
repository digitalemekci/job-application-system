<div>
    <form wire:submit.prevent="upload" enctype="multipart/form-data">
        <input type="file" wire:model="cv">
        <button type="submit">CV Yükle</button>

        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
    </form>

</div>

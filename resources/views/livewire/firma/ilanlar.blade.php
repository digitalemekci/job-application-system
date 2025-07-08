<div>
    <h1 class="text-2xl font-bold mb-4">İlanlarım</h1>

    {{-- Yeni ilan ekleme formu --}}
    <form wire:submit.prevent="create">
        <div class="mb-2">
            <input wire:model="title" type="text" placeholder="İlan Başlığı" class="border p-2 w-full">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <textarea wire:model="description" placeholder="İlan Açıklaması" class="border p-2 w-full"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Ekle</button>
    </form>

    <hr class="my-4">

    {{-- İlan listesi --}}
    <table class="w-full text-left">
        <thead>
            <tr>
                <th class="border-b p-2 text-white">Başlık</th>
                <th class="border-b p-2 text-white">Açıklama</th>
                <th class="border-b p-2 text-white">İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ilanlar as $ilan)
                <tr>
                    <td class="border-b p-2 text-white">{{ $ilan->title }}</td>
                    <td class="border-b p-2 text-white">{{ $ilan->description }}</td>
                    <td class="border-b p-2 text-white">
                        <button wire:click="edit({{ $ilan->id }})" class="text-blue-500">Düzenle</button>
                        <button wire:click="delete({{ $ilan->id }})" class="text-red-500 ml-2">Sil</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Güncelleme formu --}}
    @if($editing)
    <hr class="my-4">
    <h2 class="text-xl font-semibold">İlan Güncelle</h2>
    <form wire:submit.prevent="update">
        <div class="mb-2">
            <input wire:model="title" type="text" class="border p-2 w-full">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <textarea wire:model="description" class="border p-2 w-full"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded">Kaydet</button>
        <button type="button" wire:click="cancel" class="ml-2 text-gray-600">İptal</button>
    </form>
    @endif
</div>

<div class="space-y-6">

    <h3 class="text-lg font-semibold">
        @if($editingId)
            İlan Düzenle
        @else
            Yeni İlan Ekle
        @endif
    </h3>

    @if (session()->has('success'))
        <div class="p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Başlık</label>
            <input type="text" wire:model.defer="title" class="mt-1 block w-full border-gray-300 rounded" />
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Açıklama</label>
            <textarea wire:model.defer="description" class="mt-1 block w-full border-gray-300 rounded"></textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">
                @if($editingId)
                    Güncelle
                @else
                    Kaydet
                @endif
            </button>

            @if($editingId)
                <button type="button" wire:click="cancelEdit" class="px-4 py-2 bg-gray-500 text-white rounded">
                    İptal
                </button>
            @endif
        </div>
    </form>

    <hr class="my-6">

    <h3 class="text-lg font-semibold">İlanlarım</h3>

    @if($ilanlar->isEmpty())
        <p>Henüz ilanınız yok.</p>
    @else
        <ul class="space-y-2">
            @foreach($ilanlar as $ilan)
                <li class="p-4 bg-white shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <strong>{{ $ilan->title }}</strong>
                            <p class="text-gray-600">{{ $ilan->description }}</p>
                        </div>
                        <div class="space-x-2">
                            <button wire:click="edit({{ $ilan->id }})" class="text-blue-600">Düzenle</button>
                            <button wire:click="delete({{ $ilan->id }})" class="text-red-600">Sil</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

</div>

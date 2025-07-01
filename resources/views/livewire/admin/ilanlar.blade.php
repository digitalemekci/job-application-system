<div>
    <h3 class="text-lg font-semibold mb-4">Tüm İlanlar</h3>
    @if($ilanlar->isEmpty())
        <p>Henüz ilan eklenmemiş.</p>
    @else
        <ul class="space-y-2">
            @foreach($ilanlar as $ilan)
                <li class="p-4 bg-white shadow rounded">
                    <strong>{{ $ilan->title }}</strong> <span class="text-xs text-gray-500">(Firma: {{ $ilan->user->name }})</span>
                    <p class="text-gray-600">{{ $ilan->description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>

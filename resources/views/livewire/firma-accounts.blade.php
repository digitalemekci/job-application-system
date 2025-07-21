<div class="py-8">
    <h2 class="text-2xl font-semibold mb-6 text-white">Firma Hesapları</h2>

    @if($accounts->isEmpty())
        <p class="text-white">Bu firmaya ait hiç kullanıcı hesabı yok.</p>
    @else
        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
            <table class="w-full text-sm text-left text-white">
                <thead class="uppercase tracking-wider text-xs bg-gray-700 text-white">
                    <tr>
                        <th scope="col" class="px-4 py-3">ID</th>
                        <th scope="col" class="px-4 py-3">Ad Soyad</th>
                        <th scope="col" class="px-4 py-3">E-posta</th>
                        <th scope="col" class="px-4 py-3">Rol</th>
                        <th scope="col" class="px-4 py-3">Oluşturulma</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $account)
                        <tr class="border-b border-gray-700 hover:bg-gray-700">
                            <td class="px-4 py-2">{{ $account->id }}</td>
                            <td class="px-4 py-2">{{ $account->name }}</td>
                            <td class="px-4 py-2">{{ $account->email }}</td>
                            <td class="px-4 py-2 capitalize">{{ $account->role }}</td>
                            <td class="px-4 py-2">{{ $account->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x text-gray-800 leading-tight">
            Upravljanje Državama i Proizvodima
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold mb-4">Popis Proizvoda i kategorija</h3>
                        @can('admin-access')
                            <a href="{{ route('products.create') }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                <i class="bi bi-plus-circle"></i> Nova Proizvod</a>
                        @endcan
                    </div>
                    <div class="admin-table-wrapper">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Država</th>
                                    <th>Regija</th>
                                    <th>Broj Stanovnika</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products_countries as $pc)
                                    <tr>
                                        <td>{{ $pc->naziv }}</td>
                                        <td>{{ $pc->country?->naziv }}</td>
                                        <td>{{ $pc->country?->regija }}</td>
                                        <td>{{ number_format($pc->country?->broj_stanovnika,0,',','.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $products_countries->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

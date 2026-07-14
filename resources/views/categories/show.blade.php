<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategorija
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-red-600 mb-6">
                        Detalji Kategorije
                    </h3>

                    <table class="admin-table">
                        <tr>
                            <td>ID</td>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <td>Naziv</td>
                            <td>{{ $category->naziv }}</td>
                        </tr>
                        <tr>
                            <td>Opis</td>
                            <td>{{ $category->opis }}</td>
                        </tr>
                        <tr>
                            <td>Aktivna</td>
                            <td>{{ $category->active ? "DA" : "NE" }}</td>
                        </tr>
                        <tr>
                            <td>Kreirana</td>
                            <td>{{ $category->created_at?->format('d.m.Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td>Ažurirana</td>
                            <td>{{ $category->updated_at?->format('d.m.Y H:i:s') }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

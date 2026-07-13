@php
    $projectName = basename(base_path());
@endphp
<footer class="bg-white border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="min-h-16 flex flex-col sm:flex-row items-center justify-between gap-2 py-4">

            <div class="text-xs text-gray-500">
                &copy; {{ date('Y') }}
                <span class="font-semibold text-gray-700">
                    {{ $projectName }}
                </span>

                <span class="hidden sm:inline">
                    — Sva prava pridržana.
                </span>
                <span class="ml-10">
                    Vrijeme učitavanja:
                    <span class="font-semibold text-gray-700">
                        {{ now()->format('H:i:s') }}
                    </span>
                </span>
            </div>


            <div class="text-xs text-gray-500">
                Administracijska nadzorna ploča
            </div>

        </div>
    </div>
</footer>

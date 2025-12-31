<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Update Terbaru
        </x-slot>
 
        <div class="space-y-4">
            @if($updates->isEmpty())
                <div class="text-sm text-gray-500">Belum ada update terbaru.</div>
            @else
                @foreach($updates as $update)
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between py-2 border-b last:border-0 border-gray-200 dark:border-gray-700">
                        <div class="flex items-center mb-2 sm:mb-0">
                            <x-filament::badge :color="$update['type'] === 'Berita' ? 'info' : 'success'">
                                {{ $update['type'] }}
                            </x-filament::badge>
                            <span class="ml-3 font-medium text-gray-900 dark:text-gray-100 truncate max-w-md">
                                {{ $update['title'] }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($update['created_at'])->locale('id')->isoFormat('dddd, D MMMM Y HH:mm') }}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

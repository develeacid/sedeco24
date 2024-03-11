<div class="row">
    <div class="col-md-9">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>

        <div class="mt-5">
            <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                {{ $content }}
            </div>
        </div>
    </div>
</div>


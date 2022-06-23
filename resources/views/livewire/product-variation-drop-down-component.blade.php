<div class="mt-3">

    <div class="font-semibold mb-1">

        {{ Str::title($variations->first() ?->type) }}

    </div>

    <x-select class="w-full" wire:model="selectedVariation">

        <option value="">Choose an Option</option>

        @foreach($variations as $variation)
            <option value="{{ $variation->id }}" {{ $variation->outOfStock()?'disabled':'' }}>
                {{ $variation->name }} {{ $variation->lowStock()?'(Low Stock)':'' }}
                {{ $variation->stockCount()?'(Out of Stock)':'' }}
            </option>
        @endforeach

    </x-select>
    @if($this->selectedVariationModel?->children->count())
        <livewire:product-variation-drop-down-component
            :variations="$this->selectedVariationModel->children->sortBy('order')" :key="$selectedVariation"/>
    @endif
</div>

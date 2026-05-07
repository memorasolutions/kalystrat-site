{{-- Icône Tabler — DRY générique : <x-admintabler::icon name="bell" /> --}}
@props(['name', 'size' => 1, 'class' => ''])
<i class="ti ti-{{ $name }} icon icon-{{ $size }} {{ $class }}" {{ $attributes->except(['name', 'size', 'class']) }}></i>

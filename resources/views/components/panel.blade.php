@props(['title' => false])
<div {{ $attributes->merge(['class' => 'relative p-4 bg-white rounded-lg shadow space-y-2']) }}>
  @if ($title)
    <h2 class="text-lg font-medium">{{ $title }}</h2>
  @endif
  <div>
    {{ $slot }}
  </div>
</div>
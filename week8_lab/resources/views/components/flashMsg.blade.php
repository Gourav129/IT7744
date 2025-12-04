@props(['msg'])

@if ($msg)
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-lg mb-4">
        {{ $msg }}
    </div>
@endif

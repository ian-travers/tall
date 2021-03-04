<div>
    @if ($alert = session('status'))
        <x-alert-message type="{{ $alert['type'] }}">{{ $alert['message'] }}</x-alert-message>
    @endif
</div>

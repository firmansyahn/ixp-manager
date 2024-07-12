@props([
    'id' => null,
    'message' => 'Alert! Change a few things up and try submitting again.'
])

{{-- @if($message = session('ixp.utils.view.alerts'))
{{ $message }}
@endif --}}
{{ $message }}
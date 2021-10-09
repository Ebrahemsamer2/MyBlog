@props(['status'])

@if(session()->has($status))
	<div class="alert alert-{{ $status == 'success' ? 'info' : 'danger' }} global-message {{ $status == 'success' ? 'info' : 'error' }} ">
		{{ session($status) }}
	</div>
@endif
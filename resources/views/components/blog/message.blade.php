@props(['status'])

@if(session()->has($status))
	<div class="alert alert-{{ $status == 'success' ? 'info' : 'danger' }}">
		{{ session($status) }}
	</div>
@endif
@props(['type' => 'text', 'name', 'placeholder', 'required' => 'true', 'value'])

<input value='{{ $value }}' {{ $required == 'true' ? 'required' : '' }} type="{{ $type }}" id="{{ $name }}" name='{{ $name }}' class="form-control" placeholder="{{ $placeholder }}">

@error($name)
<small class="text-danger">{{ $message }}</small>
@enderror
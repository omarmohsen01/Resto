@props([
    'name','value'=>false,'label'=>false,'class'=>false
])
@if($label)
    <label for="exampleTextarea1">{{ $label }}</label>
@endif

<textarea class="form-control {{ $class }}" name="{{ $name }}" rows="4">{{ old($name, $value) }}</textarea>

@error($name)
    <div class="text-danger" style="width: 450px">{{ $message }}</div>
@enderror 
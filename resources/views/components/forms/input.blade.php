@props([
    'type'=>'text','name','value'=>false,'label'=>false,'placeholder'=>false,'class'=>false
])
@if($label)
    <label for="exampleInputName1">{{ $label }}</label>
@endif
    <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $class }}" placeholder="{{ $placeholder }}" 
        value="{{ old($name, $value) }}">
@error($name)
        <div class="text-danger" style="width: 450px">{{ $message }}</div>
@enderror 

@props([
    'name','options','checked'=>false,'label'=>false
])
@if($label)
    <label for="exampleTextarea1">{{ $label }}</label>
@endif

@foreach ($options as $value=>$text)
  <div class="form-check">
    <input type="radio" class="form-check-input" name="{{ $name }}"  value="{{ $value }}"
    @checked(old($name,$checked)==$value)>
    <label class="form-check-label">
        {{ $text }}
    </label>
  </div>
@endforeach

@error($name)
    <div class="text-danger" style="width: 450px">{{ $message }}</div>
@enderror

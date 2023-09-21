@props([
    'name','options','value'=>false,'label'=>false,'selected'=>false
])

@if ($label)
<label for="exampleFormControlSelect2">{{ $label }}</label>
@endif

<select name="{{ $name }}" class="form-control  @error('{{ $name }}')
                is-invalid @enderror">
    @foreach ($options as $option)
        <option value="{{ $option->id }}" @selected($value == $selected)>
                {{ $option->id }}</option>
    @endforeach
</select>
@error($name)
    <div class="text-danger" style="width: 450px">{{ $message }}</div>
@enderror


<label for="">
    {{ $label}}  <span class="color-red">{{(isset($required) && $required) ? ' *' : ''}}</span>
</label>
<input type="text" name="{{ $name}}" class="{{ $class ?? '' }}" {{(isset($required) && $required) ? 'required' : ''}} placeholder="{{ $placeholder ?? ''}}" 
value="{{ old($name,$default) }}">
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror

<label for="">{{ $label}}</label>
<input type="text" name="{{ $name}}" {{(isset($required) && $required) ? 'required' : ''}} placeholder="{{ $placeholder ?? ''}}" 
value="{{ old($name,$default) }}">
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
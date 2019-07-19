<label for="">{{ $label }} <span class="color-red">{{(isset($required) && $required) ? ' *' : ''}}</span></label>
<textarea name="{{ $name}}" class="{{ $class ?? '' }}" {{(isset($required) && $required) ? 'required' : ''}} placeholder="{{ $placeholder ?? ''}}" rows="4">{{ old($name,$default) }}</textarea>
@error($name)
    <small class="form-text text-danger">{{ $message }}</small>
@enderror
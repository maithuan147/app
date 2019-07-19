<h4>{{ $label}} <span class="color-red">{{(isset($required) && $required) ? ' *' : ''}}</span></h4>
<div></div>
<label for="{{ $name}}" style="display: flex;justify-content: center;"><img src="{{asset($img) }}" alt="{{ old($name,$default) }}" class="img-file" id="blah"></label>
<input type="file" name="{{ $name}}" id="{{ $name}}" class="{{ $class ?? '' }}" {{(isset($required) && $required) ? 'required' : ''}} placeholder="{{ $placeholder ?? ''}}" 
value="{{ old($name,$default) }}" style="visibility: hidden; width: 0px; height: 0px;">
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
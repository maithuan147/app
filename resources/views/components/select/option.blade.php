    <label>
        {{ $label ?? '' }} <span class="color-red">{{(isset($required) && $required) ? ' *' : ''}}</span>
    </label>
    <select  class="{{ $class ?? '' }}"
        name="{{ $name }}" {{ isset($required) && $required ? 'required' : '' }}>
        @if(isset($placeholder))
            <option value="" {{ old($name, $default) == $placeholder ? 'selected' : '' }}>{{ $placeholder }}</option>
        @endif
        @if(isset($options))
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ old($name, $default) == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        @endif
    </select>    
    @error($name)
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror                                        

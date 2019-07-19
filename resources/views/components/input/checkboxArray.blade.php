@php
    if (isset($checkbox)) {
    $checked = in_array($value, $$checkbox->$array()) ? 'checked' : '';
}
@endphp
<input type="checkbox" name="{{ $name }}[]" class="{{ $class ?? '' }} styled-checkbox" id="{{ $id ?? '' }}" value="{{ $value }}" {{ $checked ?? ''}} {{ (is_array(old($name)) && in_array($value, old($name))) ? 'checked' : ''}}>
<label for="{{ $id ?? '' }}" class="ml-10">{{ $label }}</label>

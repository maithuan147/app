@php
    if (isset($checkbox)) {
    $checked = in_array($value, $$checkbox->$array()) ? 'checked' : '';
}
@endphp
<input type="checkbox" name="{{ $name }}" class="{{ $class ?? '' }}" id="{{ $value }}" value="{{ $value }}" {{ $checked ?? ''}} {{ old($checkbox) ? 'checked' : '' }}>
<label for="{{ $value }}" class="ml-10">{{ $label }}</label>
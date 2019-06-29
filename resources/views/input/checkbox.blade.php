@php
    if (isset($role)) {
    $checked = in_array($value, $role->getDsPer()) ? 'checked' : '';
}
@endphp
<input type="checkbox" name="{{ $name }}" id="{{ $value }}" value="{{ $value }}" {{ $checked ?? ''}}>
<label for="{{ $value }}">{{ $label }}</label>
@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }}{!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50', 'rows' => '4', 'cols' => '100']) !!}>{{ trim($slot) }}</textarea>

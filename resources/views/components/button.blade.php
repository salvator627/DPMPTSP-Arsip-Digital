<button
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
        'class' => 'btn-login'
    ]) }}
>
    {{ $slot }}
</button>

@props(['active' => false])

<a {{ $attributes }}
class="{{ $active ? 'nav-link active text-danger' : 'nav-link' }}"
aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
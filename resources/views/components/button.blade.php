<?php
/**
 * Button
 *
 * @var string color // color of button - primary|normal|success|important|danger|warning
 * @var string transparent // is button transparent - boolean, def. false
 * @var string size // size of button - sm|md|lg
 *
 * @var string attributes
 *
 * @var \Illuminate\Support\HtmlString $slot
 *
 */
?>

@props([
    'color' => 'primary',
    'transparent' => false,
    'size' => 'lg', // sm, md, lg
])

@php

switch ($color) {
    case 'normal':
        $color_class = 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50';
        break;

    case 'success':
        $color_class = 'text-white bg-green-500 hover:bg-green-600 focus:ringgreen-500';
        $transparent_color_class = 'text-green-500 bg-green-500 bg-opacity-10 hover:bg-opacity-20';
        break;

    case 'important':
        $color_class = 'text-white bg-important hover:bg-important-600 focus:ring-indigo-500';
        break;

    case 'danger':
        $color_class = 'text-white bg-danger hover:bg-danger-600 focus:ring-indigo-500';
        $transparent_color_class = 'text-danger-500 bg-danger bg-opacity-10 hover:bg-opacity-20';
        break;

    case 'warning':
        $color_class = 'text-white bg-warning hover:bg-warning-600 focus:ring-indigo-500';
        break;

    case 'secondary':
        $color_class = 'text-primary bg-gray-100 hover:bg-gray-200 focus:ring-primary border border-primary';
        break;

    default:
        $color_class = 'text-white bg-primary hover:bg-primary-600 focus:ring-indigo-500';
        $transparent_color_class = 'text-primary-500 bg-danger bg-opacity-10 hover:bg-opacity-20';
        break;
}

switch ($size) {
    case 'sm':
        $size_class = 'px-2.5 py-1.5 text-xs';
        break;

    case 'md':
        $size_class = 'px-3 py-2 text-sm leading-4';
        break;

    default:
        $size_class = 'px-4 py-2 text-sm';
        break;
}

switch ($transparent) {
    case true:
        $transparent_class = $transparent_color_class;
        break;
    case false:
        $transparent_class = '';
        break;
}

@endphp

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => implode(' ', [
            'inline-flex items-center border justify-center border-transparent font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2',
            $color_class,
            $transparent_class,
            $size_class,
        ]),
    ]) }}>

    {{ $slot }}

</button>

<?php

namespace App\DTO\Fields\Interfaces;

interface QuillGroupInterface
{
    public static function build(QuillInlineFieldInterface ...$fields): array;
}

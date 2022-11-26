<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

final class ItalicInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'italic';
    }
}

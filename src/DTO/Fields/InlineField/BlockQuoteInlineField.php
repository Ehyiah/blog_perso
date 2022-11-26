<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

final class BlockQuoteInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'blockquote';
    }
}

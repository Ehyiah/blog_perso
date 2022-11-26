<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

class UnderlineInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'underline';
    }
}

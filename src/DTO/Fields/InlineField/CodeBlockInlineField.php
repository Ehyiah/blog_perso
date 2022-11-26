<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

class CodeBlockInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'code-block';
    }
}

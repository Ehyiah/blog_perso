<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

class StrikeInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'strike';
    }
}

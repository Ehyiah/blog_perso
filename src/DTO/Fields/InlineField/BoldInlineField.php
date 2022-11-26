<?php

namespace App\DTO\Fields\InlineField;

use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

final class BoldInlineField implements QuillInlineFieldInterface
{
    public function getOption(): string
    {
        return 'bold';
    }
}

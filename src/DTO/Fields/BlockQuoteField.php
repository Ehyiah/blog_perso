<?php

namespace App\DTO\Fields;

use App\DTO\QuillFieldInterface;

final class BlockQuoteField implements QuillFieldInterface
{
    public function getOption(): string
    {
        return 'blockquote';
    }
}

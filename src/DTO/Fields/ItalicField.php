<?php

namespace App\DTO\Fields;

use App\DTO\QuillFieldInterface;

final class ItalicField implements QuillFieldInterface
{
    public function getOption(): string
    {
        return 'italic';
    }
}

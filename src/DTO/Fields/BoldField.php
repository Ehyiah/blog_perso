<?php

namespace App\DTO\Fields;

use App\DTO\QuillFieldInterface;

final class BoldField implements QuillFieldInterface
{
    public function getOption(): string
    {
        return 'bold';
    }
}

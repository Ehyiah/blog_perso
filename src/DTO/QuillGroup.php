<?php

namespace App\DTO;

use App\DTO\Fields\Interfaces\QuillBlockFieldInterface;
use App\DTO\Fields\Interfaces\QuillGroupInterface;
use App\DTO\Fields\Interfaces\QuillInlineFieldInterface;

final class QuillGroup implements QuillGroupInterface
{
    public static function build(QuillInlineFieldInterface|QuillBlockFieldInterface|QuillCompondFieldInterface ...$fields): array
    {
        $array = [];
        foreach ($fields as $field) {
            if ($field instanceof QuillInlineFieldInterface) {
                $array[] = $field->getOption();
            }
            if ($field instanceof QuillBlockFieldInterface) {
                foreach ($field->getOption() as $key => $option) {
                    $array[][$key] = $option;
                }
            }
        }

        return $array;
    }
}

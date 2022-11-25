<?php

namespace App\DTO;

final class QuillGroup implements QuillGroupInterface
{
    /**
     * @var array<QuillFieldInterface>
     */
    public array $fields = [];

    public static function build(QuillFieldInterface ...$fields): array
    {
        $array = [];
        foreach ($fields as $field) {
            $array[] = $field->getOption();
        }

        return $array;
    }
}

<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class DateTimeTransformer implements DataTransformerInterface
{
    public function transform($value): ?string
    {
        if ($value === null) {
            return null;
        }
        return $value->format('Y-m-d H:i:s');
    }

    public function reverseTransform($value): ?\DateTimeInterface
    {
        if (!$value) {
            return null;
        }

        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
            throw new TransformationFailedException(sprintf(
                'Unable to transform "%s" into a valid date/time object: %s',
                $value,
                $e->getMessage()
            ), $e->getCode(), $e);
        }
    }
}

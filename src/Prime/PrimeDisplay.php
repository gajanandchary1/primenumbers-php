<?php
namespace Prime;

use Numbers\outputInterface;

class PrimeDisplay extends Prime implements outputInterface
{

    var $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function render(): string
    {
        $displayString = '';
        if ($this->limit) {
            $displayString .= ' | ' . implode(' ', $this->numbersCollection->getValues());
            $displayString .= '---+';
        } else {
            $displayString .= 'No prime numbers with specified limit:' . $this->limit;
            return $displayString;
        }

        for ($i = 0; $i < $this->limit; $i ++) {
            $displayString .= ' ' . $this->numbersCollection->get($i) . ' |';
            for ($j = 0; $j < $this->limit; $j ++) {
                $displayString .= ' ' . $this->numbersCollection->get($i) * $this->numbersCollection->get($j);
            }
        }

        return $displayString;
    }
}
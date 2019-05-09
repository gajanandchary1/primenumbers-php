<?php
namespace Prime;

use Doctrine\Common\Collections\ArrayCollection;

class Prime implements primeInterface
{

    var $numbersCollection;

    public function decideNumbers(): Prime
    {
        $i = 0;
        $this->numbersCollection = new ArrayCollection();
        while ($this->numbersCollection->count() < $this->limit) {
            if ($this->isPrime($i)) {
                $this->numbersCollection->add($i);
            }
            $i ++;
        }
        return $this;
    }

    private function isPrime(int $num): bool
    {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= $num / 2; $i ++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
}



<?php
namespace Prime\Number;

class Table {
    
    var $limit;
    
    public function __construct(int $limit) {
        $this->limit = $limit;
    }
    
    public static function isPrime(int $num):bool {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
    
    public function getPrimeNumbers():array {
        $collectedPrimeNumbers = [];
        $i = 0;
        while (count($collectedPrimeNumbers) < $this->limit)
        {
            if($this->isPrime($i)){
                $collectedPrimeNumbers[] = $i;
            }
            $i++;
        }
        return $collectedPrimeNumbers;
    }
    
    public function renderPrimeTable():string {
        $primeNumbers = $this->getPrimeNumbers();
        $displayString = '';
        if($this->limit){
            $displayString .= ' | '. implode(' ', $primeNumbers);
            $displayString .= '---+';
        } else {
            $displayString .= 'No prime numbers with specified limit:'.$this->limit;
            return $displayString;
        }
        
        for($i=0;$i<$this->limit;$i++){ 
            $displayString .= ' '.$primeNumbers[$i].' |';
            for($j=0;$j<$this->limit;$j++){
                $displayString .= ' '.$primeNumbers[$i]*$primeNumbers[$j];
            }
        }
       
        return $displayString;
    }
}



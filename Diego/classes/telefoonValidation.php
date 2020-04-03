<?php

namespace classes;

class telefoonValidation
{
    private $telefoon;

    public function setPhone($telefoon)
    {
        $this->telefoon = trim($telefoon);
    }

    public function getPhone()
    {
        return $this->telefoon;
    }

    public function checkOnlyNumbers($telefoon)
    {
        $temp = str_split($telefoon);
        for ($i = 0; $i < count($temp); $i++)
        {
            $Number = preg_match("@[0-9]@", $temp[$i]);
            if ($Number)
            {
                continue;
            }
            else
            {
                $i = count($temp);
                return false;
            }
        }
        $this->setPhone($telefoon);
    }
}
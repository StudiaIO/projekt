<?php

namespace app\forms;

class BookingForm
{
    public $chceck_in_date;
    public $chceck_out_date;
 

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}
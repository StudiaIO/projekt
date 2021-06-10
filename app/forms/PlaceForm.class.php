<?php

namespace app\forms;

class PlaceForm
{
    public $room_no;
    public $price;
    public $type;
    public $description;
    public $chceck_in_datee;
    public $chceck_out_date;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}
<?php


namespace app\forms;


class SearchForm
{
    public $shopName;
    public $price;
    public $type;
    public $category;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}
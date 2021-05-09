<?php


class Component
{
    protected $data;
    function __construct($data)
    {
        $this->data = $data;
        echo $this->render();
    }

    function render(){

        return "";
    }
}
?>
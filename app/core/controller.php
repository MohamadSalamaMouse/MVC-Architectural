<?php

namespace mvc\core;

class controller
{
    public function view($path, $arr = [])
    {

        require views . $path . ".php";
        return $arr;
    }
}

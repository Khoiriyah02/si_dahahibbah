<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/danahibah/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'staffkesra', 'link' => $base . 'staffkesra'),
            array('text' => 'penerimahibah', 'link' => $base . 'penerimahibah'),
            array('text' => 'bupati', 'link' => $base . 'bupati')
        ];
        return $data;
    }
}

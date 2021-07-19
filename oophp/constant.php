<?php 
    // define('NAMA', 'Hugo YAW');
    // echo NAMA;
    // echo "<br>";
    // const UMUR = 27;
    // echo UMUR;

    // class Coba {
    //     const NAMA = 'Hugo YAW';
    // }
    // echo Coba::NAMA;

    echo "LINE : " . __LINE__; echo "<br>";
    echo "FILE : " . __FILE__; echo "<br>";
    echo "DIR : " . __DIR__; echo "<br>";
    echo "FUNCTION : " . __FUNCTION__; echo "<br>";
    echo "CLASS : " . __CLASS__; echo "<br>";
    echo "TRAIT : " . __TRAIT__; echo "<br>";
    echo "METHOD : " . __METHOD__; echo "<br>";
    echo "NAMESPACE : " . __NAMESPACE__; echo "<br>";

    echo "<br>";
    function coba() {
        return "FUNCTION : " . __FUNCTION__;
    }
    echo coba();

    echo "<br>";
    class Coba {
        public $kelas = "CLASS : " . __CLASS__;
    }
    $obj = new Coba;
    echo $obj->kelas;
?>
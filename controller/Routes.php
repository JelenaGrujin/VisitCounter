<?php

class Routes
{

    public function pages(){

        $dir = 'public';
        $directory = scandir($dir);
        $files = array_diff($directory, array('..', '.'));
        return $files;
    }

    public function action($page){
        if(in_array($page,$this->pages())){
            include 'public/'.$page;
        }else{
            include 'public/first_page.php';
        }
    }
}
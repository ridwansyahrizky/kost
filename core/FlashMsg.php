<?php

class FlashMsg{

    public static function setFlash($menu,$pesan, $aksi, $tipe,$ket)
    {
        $_SESSION["flash"] = [
            'menu' => $menu,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'ket' => $ket,
            'tipe' => $tipe
        ];
    }

    public static function flash()    
    {
        if(isset($_SESSION["flash"])) 
        {
            echo '<div class="alert alert-'.$_SESSION['flash']['tipe'] .' alert-dismissible fade-show" role="alert">
                Data '.$_SESSION['flash']['menu'].' <strong>'.$_SESSION['flash']['pesan'].'</strong> '. $_SESSION['flash']['aksi'].'
                '. $_SESSION['flash']['ket'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
            ';

            unset($_SESSION['flash']);
        }
    }
}
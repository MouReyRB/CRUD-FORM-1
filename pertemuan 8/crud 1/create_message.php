<?php
    // Digunakan sebagai file tersendiri agar dapat digunakan oleh berbagai file lain
    function create_message($text,$type,$icon){
        // inisiasi session
        session_start();
        $_SESSION["message"]['text'] = $text;
        $_SESSION["message"]['type'] = $type;
        $_SESSION["message"]['icon'] = $icon;
        $_SESSION["message"]['show'] = "show";
}
?>
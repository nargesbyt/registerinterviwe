<?php

if(!function_exists('displayFlashMessage')){
    function displayFlashMessage(){
        if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
            echo '<div class="alert alert-danger">';
            echo '<ul>';
            foreach($_SESSION['errors'] as $error){
                echo '<li>'.htmlSpecialchars($error).'</li>';
            }
            echo '</ul>';
            echo '</div>';
            unset($_SESSION['errors']);
        }
    
    }
}
<?php

function getView($uri){
    if(!$uri[1]) {
        return "home";
    } else if($uri[1] === 'about' && count($uri) === 2) {
        return "about";
    }
    return "404";
}

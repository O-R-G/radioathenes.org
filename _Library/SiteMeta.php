<?php
/* 
    add a record "site meta" to the top level of o-r-g. 
    it should contain the following fields
    deck     -> site title
    address1 -> keywords
    body     -> description
    notes    -> ga script
    media: [favicon], [preview] , [preview-twitter]
*/

class SiteMeta{
    public $url = '';
    public $title = '';
    public $keywords = '';
    public $description = '';
    public $favicon = '';
    public $preview = '';
    public $preview_twitter = '';
    public $gtm_head = '';
    public $gtm_body = '';
    public $view = '';
    private $item;
    private $db;

    function __construct($pageTitle, $keywords, $description) {
        $this->title = $this->unescape($pageTitle);
        $this->keywords = $this->unescape($keywords);
        $this->description = $this->unescape($description);
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $this->url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        
    }
    private function unescape($str, $br2Space=true){
        $output = html_entity_decode($str, ENT_QUOTES | ENT_HTML5);
        $output = str_replace("\xC2\xA0", ' ', $output);
        // Optionally convert <br> to real newlines (for JS rendering or clarity)
        if($br2Space)
            $output = str_replace('<br>', " ", $output);
        return $output;
    }
    public function generate(){

        $output = '<title>' . $this->title . '</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="title" content="'. $this->title .'">
        <meta name="description" content="' . $this->description .'">
        <meta name="keywords" content="' . $this->keywords .'">
        <link rel="canonical" href="' . $this->url .'" />

        <!-- Open Graph / Facebook --> <!-- this is what Facebook and other social websites will draw on -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="' . $this->url .'">
        <meta property="og:site_name" content="'. $this->title .'">
        <meta property="og:title" content="'. $this->title .'">	
        <meta property="og:description" content="' . $this->description .'">

        <!-- Twitter --> 
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="' . $this->url .'">
        <meta property="twitter:title" content="'. $this->title .'">
        <meta property="twitter:description" content="' . $this->description .'">

        <meta name="apple-mobile-web-app-title" content="' . $this->title .'">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
            
        <script type="application/ld+json">
            {
            "@context" : "https://schema.org",
            "@type" : "WebSite",
            "name" : "' . $this->title .'",
            "url" : "' . $this->url .'"
            }
        </script>';

        return $output;
    }

}
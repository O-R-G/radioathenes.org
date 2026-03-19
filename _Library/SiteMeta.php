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

    function __construct($db, $view, $item) {
        $this->db = $db;
        $this->view = $view;
        $this->item = $item;
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $this->url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $record = $this->getRecord();
        $this->getValues($record);
    }
    private function getRecord(){
        $sql = "SELECT 
            objects.name2 as `title`, 
            objects.address1 as `keywords`, 
            objects.body as `description`,
            objects.notes as `gtm_head`,
            objects.deck as `gtm_body`,
            JSON_ARRAYAGG(
                JSON_OBJECT(
                    'id', media.id,
                    'type', media.type,
                    'metadata', media.weight,
                    'caption', REPLACE(CONVERT(media.caption USING utf8), '\\r\\n', '')
                )
            ) AS media  
            FROM objects 
            JOIN wires ON objects.id = wires.toid 
            LEFT JOIN media ON media.object = objects.id AND media.active = 1
            WHERE objects.active = 1 
            AND wires.active = 1 
            AND objects.url = 'site-meta'
            GROUP BY objects.id
            LIMIT 1";

        $result = $this->db->query($sql);
        if(!$result) return $result;

        $output = $result->fetch_assoc();
        $output['media'] = json_decode($output['media'], true);
        return $output;
    }
    private function getValues($record){
        foreach($record as $key => $value) {
            if($key === 'media') {
                foreach($value as $m) {
                    if(!$m['caption']) continue;
                    $caption = $m['caption'];  
                    if( strpos($caption, '[preview]') !== false ){
                        $this->preview = m_url($m);
                    } else if( strpos($caption, '[preview-twitter]') !== false ){
                        $this->preview_twitter = m_url($m);
                    } else if( strpos($caption, '[favicon]') !== false ){
                        $this->favicon = m_url($m);
                    } 
                }
            } else if($key === 'title'){
                $this->$key = $this->getPageTitle($value);
            } else if(strpos($key, 'gtm_') !== false) {
                $this->$key = $value ? $this->unescape($value) : $value;
            } else {
                $this->$key = $value;
            }
        }
    }
    private function getPageTitle($site_title){
        global $item;
        global $uri;
        $output = $site_title;
        if($this->view === 'slideshow' || $this->view === 'home') {
            return $output;
        } else if($this->view === '404') {
            $output .= ' | PAGE NOT FOUND';
        } else {
            if($this->item)
                $output .= ' | ' . $this->item['name1'];
            else 
                $output .= ' | PAGE NOT FOUND';
        }
        return $output;
    }
    private function unescape($str, $br2Nl=true){
        $output = html_entity_decode($str, ENT_QUOTES | ENT_HTML5);
        $output = str_replace("\xC2\xA0", ' ', $output);
        // Optionally convert <br> to real newlines (for JS rendering or clarity)
        if($br2Nl)
            $output = str_replace('<br>', "\n", $output);
        return $output;
    }
    public function generate(){
        global $site_env;
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
        <meta property="og:image" content="' . $this->preview . '">
        <!-- Twitter --> 
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="' . $this->url .'">
        <meta property="twitter:title" content="'. $this->title .'">
        <meta property="twitter:description" content="' . $this->description .'">
        <meta property="twitter:image" content="' . $this->preview_twitter . '">

        <link rel="icon" type="image/x-icon" href="' . $this->favicon . '">
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
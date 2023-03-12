<?php
include_once('simplehtmldom/simple_html_dom.php');
header("Content-Type:text/plain");

$courses = [];

for($i = 0; $i < 10; $i++) {
    $course = 'link-' . $i;
    $courses[] = ($_POST[$course]);
}

foreach($courses as $course) {
    if($course == "") {
        continue;
    }
    $html = file_get_html($course);
    
    foreach($html->find('meta[property=udemy_com:price]') as $element) {
        echo $course . ' | '. $element->getAttribute('content') . PHP_EOL;
    }
}
?>
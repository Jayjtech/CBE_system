<?php
$term = "Third Term";

if($term == "First Term"){

}

if($term == "Second Term"){
    $course_code = "ENG402";

    $ft_CD = substr($course_code,0,5).'1';
    echo $ft_CD;
}

if($term == "Third Term"){
    $course_code = "ENG403";

    $ft_CD = substr($course_code,0,5).'1';
    $st_CD = substr($course_code,0,5).'2';
    echo $course_code.'<br/>';
    echo $st_CD.'<br/>';
    echo $ft_CD.'<br/>';
}
?>
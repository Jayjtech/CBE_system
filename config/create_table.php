<?php
$cr_result_checker = "CREATE TABLE IF NOT EXISTS `result_checker` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fullname` varchar(225) NOT NULL,
    `adm_no` varchar(225) NOT NULL,
    `term` varchar(255) NOT NULL,
    `session` varchar(225) NOT NULL,
    `code` varchar(225) NOT NULL,
    `validity` varchar(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

mysqli_query($conn, $cr_result_checker);


$cr_evaluation = "CREATE TABLE IF NOT EXISTS `evaluation` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `term` varchar(225) NOT NULL,
    `session` varchar(225) NOT NULL,
    `adm_no` varchar(225) NOT NULL,
    `overall_score` int(11) NOT NULL,
    `out_of` int(11) NOT NULL,
    `percent_score` float(11) NOT NULL,
    `t_comment` varchar(500) NOT NULL,
    `p_comment` varchar(500) NOT NULL,
    `n_absent` int(11) NOT NULL,
    `n_present` int(11) NOT NULL,
    `punctuality` int(11) NOT NULL,
    `attentiveness` int(11) NOT NULL,
    `neatness` int(11) NOT NULL,
    `honesty` int(11) NOT NULL,
    `relationship` int(11) NOT NULL,
    `skills` int(11) NOT NULL,
    `sport` int(11) NOT NULL,
    `clubs` int(11) NOT NULL,
    `fluency` int(11) NOT NULL,
    `handwriting` int(11) NOT NULL,
    `position` int(11) NOT NULL,
    `promoted_to` varchar(225) NOT NULL,
    `next_term_date` varchar(225) NOT NULL,
    `class` varchar(225) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

mysqli_query($conn, $cr_evaluation);

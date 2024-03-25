<?php
include("myfunctions.inc");
html_header("My first function demo");
html_h1("These functions are going to save me lots of time");
html_h2("This is a heading level 2");
echo "I pay £" . calculatetax(15000,22) . " tax";
html_footer();
?>



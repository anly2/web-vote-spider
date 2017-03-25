<?php
$voted_in = $_GET['site'];
//remove $vote_in from available vote sites untill 24 hours have passed
//reward

// IMPORTANT

      function redirect($to, $delay="0"){
         echo '<META HTTP-EQUIV="REFRESH" CONTENT="'.$delay.'; URl='.$to.'">'."\n";
      }

if($voted_in == 'www.xtremetop100.com') redirect('http://www.xtremetop100.com/in.php?site=1132265591');
if($voted_in == 'www.jagtoplist.com')   redirect('http://www.jagtoplist.com/in.php?site=774');
?>
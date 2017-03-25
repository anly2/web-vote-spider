<?php
// Offered checking is not anywhere close to perfect!!!
// PS: I guess you should change the names of the files (like this one's).
//     But carefull not to miss it somewhere in the code

// The only improvement is that this way you can check
// if the user has passed through the vote pages
// and hadn't just closed the vote site...
// (XtreemeTop100 is an exeption)


// The main concept is loading the voting site
// into a frame where you can access it.
// In fact we only need onload event.
// On each load the function proceeds to the next stage


// You can call this page with ?site=VOTESITE
// This skip the button page and go directly to Stage 1
// Example:
//    http://l2blackbird.com/votesite/voting check.php?site=http://www.xtremetop100.com/in.php?site=1132265591
// OR using relative urls
//    voting check.php?site=http://www.jagtoplist.com/in.php?site=774

if(isset($_GET['site'])) $c=true; // $Special_Case = true
$votesite = ($c)? $_GET['site'] : "voting check_frame.php";


// These two votesites are exeptions because remove the IFrame.
if($votesite == 'http://www.xtremetop100.com/in.php?site=1132265591'){
   // Redirect
   echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URl=vote_reward.php?site=www.xtremetop100.com">';
}
if($votesite == 'http://www.jagtoplist.com/in.php?site=774'){
   // Redirect
   echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URl=vote_reward.php?site=www.jagtoplist.com">';
}

?>
<head>
<title>Test</title>

<script type="text/javascript">
//All what must be done, apart of the frameset,
//is this simple function.
//(Unlike I said, Sorry for which, this is Javascript)

//Some variables the function uses
//No modification needed
var voting_in = '<?php echo ($c)? $votesite : ''; ?>';
var voting_stage = 0;


// A function for easier writing at the top of the window
// shortenFrame MUST have been called before
function write_e(text){
   document.getElementById("writeExplanation").innerHTML = text;
}


// Gives a line for writing at the top of the window
function shortenFrame(){
   document.getElementById("frameObj").style.height = "95%";
   document.getElementById("frameObj").style.top = "5%";
}

// Extracts the hostname from a given url
function get_hostname(url){
   var re = new RegExp('^(?:f|ht)tp(?:s)?\://([^/]+)', 'im');
   return url.match(re)[1].toString();
}

function vote_process(){
   if(voting_in == '') return false;
   voting_stage++;


// Stage 1 represents the capcha form
// At the top of the window will appear an explanation of what you must do.
//  (In case someone is going to miss the link in Stage 2)

   if(voting_stage == 1){
      shortenFrame();
      write_e('<font color="#990000"><u><strong>After you have filled the form please follow the link that will appear here</strong></u>.</font>');
   }


// Stage 2 represents the list to which you are sent after filling the capcha form
// At the top of the window will appear a link. You MUST click it or else you WILL NOT be rewarded with vote point.

   if(voting_stage == 2){
      write_e('<a style="color:#990000;" href="vote_reward.php?site='+get_hostname(voting_in)+'><u><strong>Click here to go back</strong></u>.</a>');
   }
}


</script>
</head>
<body>

<div id="writeExplanation"></div>

<iframe id="frameObj" onload="vote_process()" src="<?php echo $votesite; ?>"
 style="width: 100%; height: 100%; position: absolute; top: 0px; left: 0px;" />

 </body>
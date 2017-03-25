<html>
<head>
<title> Vote for L2 BlackStar </title>
<script type="text/javascript" src="getVotes.js.php"></script>
<script type="text/javascript">
function getCookie(c_name)
{
   if (document.cookie.length>0){
     c_start=document.cookie.indexOf(c_name + "=");
     if (c_start!=-1)
     {
       c_start=c_start + c_name.length+1;
       c_end=document.cookie.indexOf(";",c_start);
       if (c_end==-1) c_end=document.cookie.length;
       return unescape(document.cookie.substring(c_start,c_end));
     }
   }
   return false;
}
function delete_cookie ( cookie_name )
{
  var cookie_date = new Date ( );  // current date & time
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
function inArray(arr, value){
   for (var i=0; i < arr.length; i++)
      if (arr[i] == value) return true;

   return false;
}



function Reward(votesite){
   alert("You have received a votepoint for voting in "+Sites[votesite].hostname+".");
}
function RegisterVote(votesite){
   deleteCookie("votesite"+ci);
   //  Make user unable to vote again for the next 12/24 hours
   //disable_user_vote(votesite, current_user);
}
//
//for(var ci in Sites){
//   //if(isAbleToVote(ci, current_user)){
//      if((prev_votes = getCookie("votesite"+ci)) != false){
//          cur_votes = getVotes(ci);
//         if(prev_votes < cur_votes[0]){
//            Reward(ci);
//            RegisterVote(ci);
//         }
//      }
//   //}
//}

function handleVotes(){ try{
   var voted = new Array();

   for(var ci in Sites){ // Cycle through all of the specified votesites
      voted[ci] = false; // And register them in the "voted" array

      //if(!isAbleToVote(ci, current_user))  return false;// This is already done you at opening of the page

      if((prev_votes = getCookie("votesite"+ci)) != false){ // If there are recorded votes
         cur_votes = getVotes(ci);                          // Fetch the current votes
         if(prev_votes < cur_votes[0]){                     // And if the current votes are more than the recorded
            voted[ci] = true;                               // Reward (reward for only 1 site here, full reward in the end)
            //RegisterVote(ci);                             // And register as already voted
            // Note that the parameter ci is optional for you to use
         }
      }
   }

   if(inArray(voted, false) return false;
   return true; // Reward by submiting the form
   }catch(e){alert(e);}
}

function lol(){
   alert("here "+handleVotes());
}
</script>
</head>
<body>
<center>

<script type="text/javascript">
for(var k in Sites){
   document.writeln('<a href="mediumVote.php?votesite='+k+'"><img src="'+Sites[k].vImg+'" border="0"></a>');
}
</script>
   <br /><br />
   <form action="vote_index.php" method="post" onsubmit="try{lol(); return false;}catch(e){alert(e);}">
      <table>
         <tr><td>Game Account Name:      </td><td>  <input name="game_acc" type="value">    </td></tr>
         <tr><td>Game account Password:  </td><td>  <input name="password" type="password"> </td></tr>
      </table>
      <input type="submit" name="submit" value="Submit" />
   </form>
</center>
</body>
</html>
<?php
 if(!isset($_SERVER['HTTP_REFERER'])) exit;
?>

         // XML functions
         var xmlhttp;
         function GetXmlHttpObject(){
            if (window.XMLHttpRequest){
               // code for IE7+, Firefox, Chrome, Opera, Safari
               return new XMLHttpRequest();
            }
            if (window.ActiveXObject){
            // code for IE6, IE5
            return new ActiveXObject("Microsoft.XMLHTTP");
            }
            alert ("Your browser does not support XMLHTTP!");
            return null;
         }

         function loadXMLDoc(url){
            xmlhttp=GetXmlHttpObject();
            xmlhttp.open("GET",url,false);
            xmlhttp.send(null);
         }

      function trimHtml(text){
         var arr = text.split("<");
         var ar = new Array();
         for(ki in arr){
            ar[ki] = arr[ki].substr(arr[ki].indexOf(">")-(-1));
         }
         return ar.join("");
      }

      function get_tagEnd(str, tag){
         var cur_ind = 0;

         while(1){
            cind = str.indexOf('</'+tag);
            oind = str.lastIndexOf('<'+tag, cind);

            if(oind==-1 || oind==0){
               return cind-(-cur_ind);
               break;
            }
            //cut(str)
            str = str.substr(0,oind) + str.substr(cind-(-tag.length)-(-3));
            cur_ind += (cind-(-tag.length)-(-3)) - oind;
         }
      }

   function parse_xml_votes(xmlDoc, voteObj){
        try{
            //////Experimental use only
            ////document.writeln('<textarea rows="20" cols="125">');
            ////document.writeln(xmlDoc);
            ////document.writeln('</textarea><br />');

         // The unique identifier of the desired site's statistics
         var ind = xmlDoc.indexOf(voteObj.voteId);
            ////document.writeln("identifier:"+ind+" &nbsp; | &nbsp; ");

            if(ind<0){
               loadXMLDoc('feed.php?url='+voteObj.nList);
               return parse_xml_votes(xmlhttp.responseText, voteObj);
            }

         // The last opening element before the identifier in the statistics
         // this will be the opening element of the statistics(object)
         var trind = xmlDoc.lastIndexOf('<'+voteObj.tagged+voteObj.att, ind);
            ////document.writeln("boundingElement-begining:"+trind+" &nbsp; | &nbsp; ");

         // Get the end tag for the opening element
         var treind  = get_tagEnd(xmlDoc.substr(trind), voteObj.tagged) -(-trind);
            ////document.writeln("boundingElement-ending:"+treind+"<br />");

         // With the opening and closing element we now have the selection we want
         var html = xmlDoc.substr(trind, (treind-trind));

         }catch(e){alert("Error while sorting the bounding positions of the statistics-object!");}
                           
         // An array of cells/elements to be cycled
         var tds = html.split("<"+voteObj.tds);

            ////Experimental use only
            //document.writeln('<textarea rows="20" cols="125">');
            //document.writeln(tds.join("\n\n---\n\n"));
            //document.writeln('</textarea><br /><br />');

         var in_td_ind  = (voteObj.IN_td  < 0)? (tds.length-(-voteObj.IN_td))  : voteObj.IN_td-1  ;
         var out_td_ind = (voteObj.OUT_td < 0)? (tds.length-(-voteObj.OUT_td)) : voteObj.OUT_td-1 ;

            //alert("in:"+in_td_ind+"\n "+tds[in_td_ind]+"\n\nout:"+out_td_ind+"\n "+tds[out_td_ind]);
         try{
         var votesIn  = trimHtml(tds[in_td_ind]).replace(/^\s+|\s+$/g,"");
         var votesOut = trimHtml(tds[out_td_ind]).replace(/^\s+|\s+$/g,"");
         }catch(e){alert("Error while triming the HTML off the votes!");}

         return [votesIn, votesOut];
   }

   function getVotes(site){
      loadXMLDoc('feed.php?url='+Sites[site].vList);
      return parse_xml_votes(xmlhttp.responseText, Sites[site]);
   }

   var Sites = new Array();
   // -1 Is the LAST one
   // 1 Is the FIRST NOT the SECOND (NOT 0 -> first)
   Sites[0] = {hostname: 'xtremetop100' , voteId: '1132193926', tagged: 'div'  , att: ' id="middlebd"'    , tds: 'div', IN_td: -4, OUT_td: -1, vList: 'http://www.xtremetop100.com/lineage2'              , vLink: 'http://www.xtremetop100.com/in.php?site=1132193926'       , vImg: 'http://www.xtremeTop100.com/votenew.jpg'};
   Sites[1] = {hostname: 'topgamesites' , voteId: '5776'      , tagged: 'tr'   , att: ' class="list-row"' , tds: 'br' , IN_td: -2, OUT_td: -1, vList: 'http://www.topgamesites.net/lineage2'              , vLink: 'http://www.topgamesites.net/in.php?id=5776'               , vImg: 'http://www.topgamesites.net/images/12.jpg'};
   Sites[2] = {hostname: 'gamesites200' , voteId: '12928'     , tagged: 'tr'   , att: ''                  , tds: 'td' , IN_td: -2, OUT_td: -1, vList: 'http://www.gamesites200.com/lineage2/index2.shtml' , vLink: 'http://www.gamesites200.com/lineage2/in.php?id=12928'     , vImg: 'http://www.gamesites200.com/lineage2/vote.gif'};

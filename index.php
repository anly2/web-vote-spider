<?php
//<html>
//<head>
//<script type="text/javascript">
//ikariam.getClass(ajax.Responder,
//   [
//      ["updateBackgroundData",
//         {"name":"I am shuffeling","id":"2073","phase":3,"ownerId":"2073","ownerName":"malkia_94",
//          "islandId":"128","islandName":"Whaefios","islandXCoord":"56","islandYCoord":"48",
//          "buildingSpeedupActive":1,"underConstruction":-1,"endUpgradeTime":-1,"startUpgradeTime":-1,
//          "position":[
//             {"name":"\u041a\u043c\u0435\u0442\u0441\u0442\u0432\u043e","level":"14","isBusy":false,"building":"townHall"},
//             {"name":"\u041f\u0440\u0438\u0441\u0442\u0430\u043d\u0438\u0449\u0435","level":"22","isBusy":false,"building":"port"},{"name":"\u041a\u043e\u0440\u0430\u0431\u043e\u0446\u0430","level":"7","isBusy":false,"building":"shipyard"},
//             {"name":"\u0421\u043a\u043b\u0430\u0434","level":"13","isBusy":false,"building":"warehouse"},
//             {"name":"\u0410\u043a\u0430\u0434\u0435\u043c\u0438\u044f","level":"12","isBusy":false,"building":"academy"},
//             {"name":"\u0414\u0432\u043e\u0440\u0435\u0446","level":"4","isBusy":false,"building":"palace"},{"name":"\u041c\u0443\u0437\u0435\u0439","level":"10","isBusy":false,"building":"museum"},{"name":"\u0414\u044a\u0440\u0432\u043e\u0434\u0435\u043b\u0435\u0446","level":"32","isBusy":false,"building":"carpentering"},{"name":"\u041e\u0444\u0438\u0441 \u043d\u0430 \u0410\u0440\u0445\u0438\u0442\u0435\u043a\u0442\u0430","level":"32","isBusy":false,"building":"architect"},{"name":"\u041a\u0440\u044a\u0447\u043c\u0430","level":"18","isBusy":false,"building":"tavern"},{"name":"\u0422\u044a\u0440\u0433\u043e\u0432\u0441\u043a\u0430 \u043a\u0430\u043d\u0442\u043e\u0440\u0430","level":"4","isBusy":false,"building":"branchOffice"},{"name":"\u041a\u0430\u0437\u0430\u0440\u043c\u0430","level":"11","isBusy":false,"building":"barracks"},{"name":"\u0421\u043a\u0440\u0438\u0432\u0430\u043b\u0438\u0449\u0435","level":"15","isBusy":false,"building":"safehouse"},{"name":"\u0421\u043a\u043b\u0430\u0434","level":"4","isBusy":false,"building":"warehouse"},{"name":"\u0413\u0440\u0430\u0434\u0441\u043a\u0430 \u0441\u0442\u0435\u043d\u0430","level":"17","isBusy":false,"building":"wall"},{"building":"buildingGround land"},{"building":"buildingGround land"}]
//          ,"spiesInside":null,"cityLeftMenu":{"visibility":{"military":1,"espionage":0,"slot1":1,"slot2":1,"slot3":0,"slot4":0},"ownCity":1}}],["updateTemplateData",""],["updateBacklink",null]]);
//relatedCityData: JSON.parse('
//   {\"city_2073\":
//      {\"id\":2073,\"name\":\"I am shuffeling\",\"coords\":\"[56:48] \",\"tradegood\":\"4\",\"relationship\":\"ownCity\"}
//      ,\"city_13897\":{\"id\":13897,\"name\":\"\\u0422\\u0443\\u043a\\u0430 \\u0438\\u043c\\u0430\",\"coords\":\"[56:49] \",\"tradegood\":\"3\",\"relationship\":\"ownCity\"},\"city_22178\":{\"id\":22178,\"name\":\"\\u0422\\u0443\\u043a\\u0430 \\u043d\\u0435\\u043c\\u0430\",\"coords\":\"[57:49] \",\"tradegood\":\"1\",\"relationship\":\"ownCity\"},\"city_25997\":{\"id\":25997,\"name\":\"\\u041f\\u043e\\u043b\\u0438\\u0441\",\"coords\":\"[57:48] \",\"tradegood\":\"2\",\"relationship\":\"ownCity\"},\"city_48240\":{\"id\":48240,\"name\":\"\\u041f\\u043e\\u043b\\u0438\\u0441\",\"coords\":\"[57:48] \",\"tradegood\":\"2\",\"relationship\":\"ownCity\"},\"additionalInfo\":\"tg\",\"selectedCity\":\"city_2073\"}'),
//</script>
//</head>
//<body>
//A
//</body>
//</html>
?>
<?php
exit;
$raw = file_get_contents('http://bg.ikariam.com');
$pattern = '/id="loginForm".*? action="(.*?)">(.*?)<\/form>/sm';
$matches = array();

preg_match_all($pattern, $raw, $matches, PREG_PATTERN_ORDER);
$target = $matches[1][0];

//var_dump($matches);

function post($url, $params){
   //$params = array ('surname' => 'Filip', 'lastname' => 'Czaja');

   // Build Http query using params
   $query = http_build_query ($params);

   // Create Http context details
   $contextData = array (
                   'method' => 'POST',
                   'header' => "Connection: close\r\n".
                               "Content-Type: application/x-www-form-urlencoded\r\n".
                               "Content-Length: ".strlen($query)."\r\n",
                   'content'=> $query );

   // Create context resource for our request
   $context = stream_context_create (array ( 'http' => $contextData ));

   // Read page rendered as result of your POST request
   $result =  file_get_contents (
                     $url,  // page url
                     false,
                     $context);

   // Server response is now stored in $result variable so you can process it
   return $result;
}

$params = array(
   'name'=>'malkia_94',
   'password'=>'qwerty123',
   'uni_url'=>'s5.bg.ikariam.com',
   'kid'=>'',
   'startPageShown'=>'1',
   'detectedDevice'=>'1'
);

$reply = post($target, $params);

var_dump($reply);
?>
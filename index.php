<?php
$version = "v0.9";
if (isset($_GET["game"]) && file_exists($_GET["game"]."/game.xml")) {

    $gameXML = simplexml_load_string("<game>\n".file_get_contents($_GET["game"]."/game.xml")."\n</game>");
    $gameJS = [];
    $imgCount = 0;
    foreach($gameXML->img as $img) {
	$gameJS[$imgCount] = [];
	foreach($img->attributes() as $name => $value) {
	    $prefix = "";
	    if (strpos($name, "video") !== false) $prefix = $_GET["game"]."/videos/";
	    if (strpos($name, "photo") !== false) $prefix = $_GET["game"]."/images/";
            $gameJS[$imgCount][$name] = $prefix.(string)$value;
	}
	$imgCount++;
    }
    print("var gameStructure = ".json_encode($gameJS, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

} else if (isset($_GET["selection"]) && file_exists($_GET["selection"]) && is_dir($_GET["selection"])) {

    $html = str_replace("%%DIR%%", $_GET["selection"], file_get_contents("runGame.html"));
    print($html);

} else {

    $style = "position:relative;border:0px solid #010101;width:340px;text-align:center;margin:3px;padding:5px;border-radius:5px;background:#fafafa;";
    print("
<html>
<head>

</head>
<body>
    <div style='width:100%;display:flex;flex-wrap:wrap;text-align:center;'>
    <div style='".$style."'><img src='logo.svg' height=250></div>\n");
    $problems = [];
    $gameCount = 0;
    foreach(scandir(".") as $dir) {
	    if (substr($dir, 0, 1) == "." || substr($dir, 0, 1) == "_" || !is_dir($dir)) continue;
        if (!file_exists($dir."/images/Start.jpg")) {
            $problems[$dir] = "No Start.jpg image";
            continue;
        }
        if (!file_exists($dir."/game.xml")) {
            $problems[$dir] = "No game.xml file";
            continue;
        }
	    printf("
    <div style='".$style."'>
        <a href=\"?selection=".$dir."\" style='color:darkgray;'>
            <img style='max-height:200px;width:auto;border-radius:4px;' src=\"".$dir."/images/Start.jpg\">
            <br>
	    <font style='font-family:Arial;font-size:12pt;xfont-weight:bold;'>".str_replace("(", "<br><small>(", $dir)."</small></font>
        </a>
    </div>\n");
        $gameCount++;
    }
    print("    </div>\n");
    print("<h4>Total Games: ".$gameCount."</h4>");
    print("<h4>Problems</h4>\n");
    foreach($problems as $dir => $problem) {
        print("- ".$dir." - ".$problem."<br>\n");
    }
    print("<h5>Version: ".$version.", by firebringer</h5>");
    printf("</body></html>\n");
}
?>

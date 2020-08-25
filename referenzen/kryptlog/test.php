<html>
<head><title>test</title></head>
</head>

<?php
    $xmldoc = new DOMDocument();
    $xmldoc->load("datensicherungXML.xml", LIBXML_NOBLANKS);

    $activities = $xmldoc->firstChild->firstChild;
    if($activities!=null){
        while($activities!=null){
            echo $activities->textContent."<br/>";
            $activities = $activities->nextSibling;
        }
    }
?>

<form name="input" action="insert.php" method="post">
    insert activity:
    <input type="text" name="activity"/>
    <input type="submit" value="send"/>
</form>
</body>
</html>
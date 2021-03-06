<!DOCTYPE html>

<html>
<head>
    <title>XML</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script type="text/javascript" src="../scripts/script.js"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="../maphilight/jquery.maphilight.js"></script>
    <script src="../js/sarissa.js"></script>
    <script src="../js/sarissa_ieemu_xpath.js"></script>

  <meta charset="UTF-8">
</head>


<body>

<?php
$xmlDoc2 = simplexml_load_file('popis_zupanija.xml');
    $broj = count($xmlDoc2->zupanija);
    
    echo "<table style='top: 10px; left:1080px; position:fixed;'><tr><th>r.br</th><th>naziv</th></tr>";
    for($i=0;$i<$broj;$i++){
        $zupNaziv=$xmlDoc2->zupanija[$i]->naziv;

            echo "<tr><td>".($i+1)."</td><td>".$zupNaziv."</td></tr>";
    }
     echo "</table>";
?>

    <script type="text/javascript">
    var xml = new XMLHttpRequest();
        xml.open("GET", "popis_zupanija.xml", false);
        xml.send('');
        xmlDoc = xml.responseXML;


    $(function() {
            $('.map').maphilight({
                fillColor: '008800'
            });    
        });

     function openXML(id,id2)
     //prvi id broj je broj elementa u polju ucitanog u varijablu test izvucenog iz xml dokumenta
     //drugi id broj je broj html elementa iz kojeg se pozvala metoda
    {
        var string = "<table><tr><td>Naziv : ";
        var x = xmlDoc.getElementsByTagName("zupanija");
        var test = x[id].getElementsByTagName("id")[0].childNodes[0].nodeValue;

        var naziv = x[id].getElementsByTagName("naziv")[0].childNodes[0].nodeValue;
        var povrsina = x[id].getElementsByTagName("povrsina")[0].childNodes[0].nodeValue;
        var br_stan = x[id].getElementsByTagName("broj_stanovnika")[0].childNodes[0].nodeValue;
        var sjediste = x[id].getElementsByTagName("sjediste")[0].childNodes[0].nodeValue;
        var br_gradova = x[id].getElementsByTagName("broj_gradova")[0].childNodes[0].nodeValue;
        var br_opcina = x[id].getElementsByTagName("broj_opcina")[0].childNodes[0].nodeValue;
        if(id2==test)
        {
            string += naziv + "</td></tr>";

            string += "<tr><td>Površina : "  
            string +=  povrsina + " km<sup>2</sup>"+"</td></tr>";

            string += "<tr><td>Broj stanovnika : "  
            string +=  br_stan +"</td></tr>";

            string += "<tr><td>Sjedište : "  
            string +=  sjediste +"</td></tr>";

            string += "<tr><td>Broj gradova : "  
            string +=  br_gradova +"</td></tr>";

            string += "<tr><td>Broj općina : "  
            string +=  br_opcina +"</td></tr>";
            
        }

        string +="</string>";
        document.getElementById("prikaz_2").innerHTML += string;
    }

    function emptyDIV()
    {
        
        document.getElementById("prikaz_2").innerHTML ='';
    }

    
    function pretrazivanje()
    {
            
        var x = xmlDoc.getElementsByTagName("zupanija");
        var value = document.getElementById("upit").value;
        var string = '';
        for (var i = 0; i < x.length; i++) 
        {
            if(value == "") break;
            var zup = x[i].getElementsByTagName("naziv")[0].childNodes[0].nodeValue;
            if(zup.substring(0,value.length).toUpperCase() !== value.toUpperCase()) continue;
            string += x[i].getElementsByTagName("naziv")[0].childNodes[0].nodeValue;
            string += "</br>";
        };
        document.getElementById("prikaz_1").innerHTML = string;
    }

</script>




<div id="HR">
    <img id="karta" src="../Pictures/KartaHrvatske.png" alt="Hrvatska" width="720" height="697" border="0" usemap="#Map" class="map"/>

    <map name="Map" >
        <area shape="poly" id="1"  coords="241,157,264,144,270,149,278,144,276,138,279,126,289,123,303,132,289,142,289,152,294,156,
                                    293,159,287,158,284,163,298,176,321,151,329,154,333,142,325,124,334,111,339,120,345,118,
                                    379,134,379,143,372,142,370,149,361,148,358,161,370,169,358,179,344,171,335,176,328,171,
                                    314,182,318,190,301,197,300,189,291,185,286,189,270,176,263,177,259,176,258,172" 
                                    onmouseover="openXML('0','1')" onmouseout="emptyDIV()"/>

        <area shape="poly" id="2"  coords="278,121,285,122,288,119,305,130,323,123,334,107,333,92,308,92,295,80,269,98" 
                                    onmouseover="openXML('1','2')" onmouseout="emptyDIV()"/> 

        <area shape="poly" id="3" coords="342,173,334,180,326,174,317,183,320,190,313,198,298,199,294,195,291,196,293,200,290,212,
                                    285,213,289,223,286,228,290,232,306,232,340,268,362,233,393,238,404,226,423,240,424,239,419,233,430,217,376,169,358,
                                    184" 
                                            onmouseover="openXML('2','3')" onmouseout="emptyDIV()"/>

        <area shape="poly" id="4"  coords="238,158,262,182,267,178,286,193,292,188,299,193,298,196,294,193,289,196,288,210,282,214,
                                            286,222,283,228,288,233,278,275,248,276,239,263,236,263,223,251,218,251,216,253,200,245,
                                            201,221,212,227,220,221,226,203,229,199,237,201,243,195,237,189,237,175,246,174,232,161" 
                                            onmouseover="openXML('3','4')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="5"  coords="298,78,298,84,324,92,329,87,335,91,340,118,350,97,369,88,379,88,387,75,346,73,339,63,322,60,315,62"                                    onmouseover="openXML('4','5')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="6"  coords="346,115,370,129,380,130,382,113,397,105,403,114,403,120,408,119,412,122,412,128,
                                            419,127,419,132,423,133,432,120,441,120,429,97,399,78,398,70,393,78,390,76,381,90,360,99,352,99" 
                                            onmouseover="openXML('5','6')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="7"  coords="396,107,384,114,383,142,372,151,365,149,361,159,404,196,407,186,456,190,463,165,457,160,452,164" 
                                            onmouseover="openXML('6','7')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="8"  coords="188,262,194,255,203,256,203,250,199,245,200,219,213,224,225,206,157,169,109,197,
                                            119,207,120,243,115,370,164,347,169,308,185,316,188,308" 
                                            onmouseover="openXML('7','8')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="9"  coords="190,262,222,252,248,279,278,279,320,345,311,349,300,339,279,353,287,368,282,374,
                                            261,370,256,361,233,353,230,360,194,335,189,337,170,312,188,312" 
                                            onmouseover="openXML('8','9')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="10"  coords="435,122,426,135,453,161,458,157,465,164,458,180,464,183,467,180,504,194,520,171,506,153,460,128" 
        onmouseover="openXML('9','10')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="11"  coords="408,189,408,198,430,214,436,209,456,209,475,225,487,226,491,238,505,223,524,225,525,207,502,195,468,183,456,190" onmouseover="openXML('10','11')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="12"  coords="438,211,456,212,473,227,485,228,488,241,505,230,506,224,577,236,574,256,501,259,431,245,421,234" onmouseover="openXML('11','12')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="13"  coords="150,362,190,338,195,336,231,363,234,354,261,373,284,375,289,370,283,354,300,341,312,353,320,348,329,380,315,396,303,388,283,403,290,408,278,434,272,430,266,436,261,431,243,437,231,426,217,440" onmouseover="openXML('12','13')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="14"  coords="508,152,524,171,506,197,529,209,527,226,572,235,571,224,609,193,621,201,635,192,609,133" onmouseover="openXML('13','14')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="15"  coords="328,383,321,385,321,394,315,398,302,389,288,404,292,407,279,435,272,433,268,437,261,431,259,433,244,437,230,428,221,437,299,497,308,487,312,487,315,482,311,476,311,473,317,471,322,459,331,463,331,460,341,459,342,448,351,441,342,432,342,427,361,417" onmouseover="openXML('14','15')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="16"  coords="609,195,573,225,579,236,573,252,608,288,623,287,669,240,667,234" onmouseover="openXML('15','16')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="17"  coords="362,419,357,419,344,427,343,431,354,441,344,449,343,460,332,463,323,461,318,472,312,473,316,482,313,488,309,488,299,497,302,573,403,552,450,548,460,536" onmouseover="openXML('16','17')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="18"  coords="43,195,82,294,93,294,118,245,107,197" onmouseover="openXML('17','18')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="19"  coords="460,537,450,549,403,553,356,565,353,604,577,652,565,627" onmouseover="openXML('18','19')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="20"  coords="336,47,347,71,393,75,396,67,347,39" onmouseover="openXML('19','20')" onmouseout="emptyDIV()"/>        

        <area shape="poly" id="21" coords="299,174,285,163,287,159,293,160,297,156,292,152,291,143,323,125,331,142,328,151,321,148" 
                                    onmouseover="openXML('20','21')" onmouseout="emptyDIV()"/>               

                              
    </map>
<div id="prikaz_2"></div>
</div>

<h3 id="naziv_pretrazivanja">Pretraživanje županija</br> po nazivu :</h3>
<input type="text" id="upit" oninput="pretrazivanje()">
<div id="prikaz_1" class="js"></div>

</body>
</html>

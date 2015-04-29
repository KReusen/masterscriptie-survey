<?php
session_start();

if (!isset($_SESSION['stap'])) {
    $_SESSION['stap'] = 0;
    $_SESSION['al_geloot'] = 0;
}

$studentboxerror = '';
if (isset($_POST['naar1button'])) {
    if(!isset($_POST['studentbox'])) {
        $studentboxerror = '<p class="error">Sympathiek dat je mee wilt doen! Helaas kan ik alleen de antwoorden van huidige studenten meenemen in mijn scriptie. Je kunt je de tijd dus besparen.</p><br />';
    } else {
    $_SESSION['stap'] = 1;
    }

    
}

if (isset($_POST['naar3button'])) {
    $_SESSION['stap'] = 3;
}

if(isset($_POST['normprocent'])) {
    $normprocent = filter_var($_POST['normprocent'],FILTER_VALIDATE_INT);
} else {
    $normprocent = '';
}

include('db_connection.php');



?>
<html>
    <head>
        <title>Masterscriptie Kees Reusen</title>
        <meta name="description" content="Maak kans op een ballonnenvouw-workshop, bier of brownie. En maak als bonus Kees Reusen zielsgelukkig!" />
        <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500italic,500,700,900italic,900,700italic);
        
            body {
                font-family: 'Roboto', sans-serif;
                
                
            }
            
        ol {padding-top:2em; list-style: none; margin-bottom: 40px; margin-left:-40px;;}
        li em, li label, li input {display:inline-block; padding:0 10px 10px 10px; vertical-align: middle;}
        li {position: relative; }
        li em{ width:20em; padding-top: 15px; padding-bottom: 15px;}
        li label{position: absolute;width:3em; bottom: 100% ; margin-left: -1em; font-weight: bold; text-align: center; font-size: smaller;}
        li input, li label { width:3em ; text-align: center; }
        li+ li label {left:-9999em ;}
        li {width: 620px; background: #f7ebdc;}
        li.alternate {background: white;}
               
        
        #wrapper {
            width: 650px;
            margin-left: auto;
            margin-right: auto;
        }
              
        h1 {
            color: saddlebrown;
        }
        
       
        #prijzen li {
            width: 550px;
        }
        
        p.uitleg {
            width: 600px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
        p.uitleg strong {
            color: saddlebrown;
        }
        
        p.error {
            color: red;
            background: #ffcccc;
        }
        
        #tekstje {
            width: 500px;
            border: 1px solid gray;
            padding: 20px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
        }
        
        #tekstje p{
            margin-left: 0;
            margin-bottom: 0;
        }
        
        #tekstje h2 {
            margin-top: 0;
            color: peru;
        }
        
        #beginbox {
            width: 400px;
            border: 1px solid burlywood;
            background: #ffffcc;
            padding: 20px;
        }
        
        #beginbox p {
            margin: 0;
        }
        
        input[type=submit] {
            margin-left: 20px;
            font-size: larger;
            background: #f7ebdc;
            border: 2px solid peru;
            color:  saddlebrown;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }
        
        
        input[type=submit]:hover {
            cursor: pointer;
            background: sandybrown;
        }
        
        .bar-main-container {
  margin: 10px auto;
  width: 300px;
  height: 25px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  font-family: sans-serif;
  font-weight: normal;
  font-size: 0.8em;
  color: #FFF;
}

.wrap { padding: 3px; }

.bar-percentage {
  float: left;
  background: rgba(0,0,0,0.13);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  padding: 3px 0px;
  width: 15%;
  height: 12px;
  text-align: center;
}

.bar-container {
  float: right;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  height: 9px;
  background: rgba(0,0,0,0.13);
  width: 78%;
  margin: 4px 0px;
  overflow: hidden;
}

.bar {
  float: left;
  background: #FFF;
  height: 100%;
  -webkit-border-radius: 10px 0px 0px 10px;
  -moz-border-radius: 10px 0px 0px 10px;
  border-radius: 10px 0px 0px 10px;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: alpha(opacity=100);
  -moz-opacity: 1;
  -khtml-opacity: 1;
  opacity: 1;
}

/* COLORS */
.azure   { background: #38B1CC; }
.emerald { background: #2CB299; }
.violet  { background: #8E5D9F; }
.yellow  { background: #EFC32F; }
/*.red     { background: #E44C41; }*/
.red     { background: #be6739; }

            .likert-groep {
                width: 600px;
                border-spacing: 0;
                border-collapse: collapse;
            }
            
            .likert-groep td {
                vertical-align: middle;
                padding-bottom: 15px;
            }
            
            .likert-groep tr {
                background: #f7ebdc;
            }
            
            .likert-groep tr.alternate {
                background: none;
            }
            
            .likert-groep td.likert-vraag {
                padding-top: 15px;
                padding-left: 15px;
                padding-right: 15px;
                padding-bottom: 3px;
            }
            
            .likert-links {
                width: 175px;
                font-style: italic;
                padding-right: 15px;
                padding-left: 15px;
                text-align: right;
                color: #333333;
            }
            
            .likert-rechts {
                width: 175px;
                font-style: italic;
                padding-left: 15px;
                padding-right: 15px;
                text-align: left;
                color: #333333;
            }
        </style>
    </head>
    
    
    <body>
        <div id="wrapper">
        <h1>Survey masterscriptie Kees Reusen</h1>
         <?php
        if ($_SESSION['stap'] == 0) {
            echo '<p class="uitleg"><strong>Onderzoek</strong><br />
            Dit onderzoek bestaat uit een korte vragenlijst en een korte tekst. De resultaten gebruik ik om mijn masterscriptie voor de master Communicatie- en Be&iuml;nvloeding aan de Radboud Universiteit Nijmegen te schrijven. <em>Het invullen kost je hooguit 10 minuten.</em></p>';
            
            echo '<p class="uitleg"><strong>Cadeautjes</strong><br />
                    Omdat ik erg dankbaar ben voor iedere deelname, verloot ik elk van de onderstaande prijzen. Op het einde van de vragenlijst kun je, wanneer je mee wilt dingen, je e-mailadres en een voorkeur doorgeven. <br />
                    <ul id="prijzen">
                    <li>Een workshop ballonnenvouwen, voor jezelf en 5 anderen</li>
                    <li>Een speciaalbierpakket</li>
                    <li>Een doos zelfgemaakte brownies</li>
                    </ul>
</p>';
            echo '<p class="uitleg"><strong>Anonimiteit</strong><br />
                Je antwoorden worden anoniem verwerkt en zijn niet meer herleidbaar tot jou. Als je op het einde kiest je e-mailadres door te geven, dan wordt die los van je antwoorden opgeslagen. Hierdoor is niet te achterhalen welke antwoorden bij jouw emailadres hebben gehoord.</p>';
            
            echo '<p class="uitleg">Alvast bedankt en veel plezier!<br />
            <em>Kees</em></p>';
            
            echo '<form id="naar1" action="" method="post" name="naar1">
                   <div id="beginbox">
                   ' . $studentboxerror . '
                   <p><input type="checkbox" name="studentbox" id="studentbox" /><label for="studentbox">Ja, ik ben HBO/WO student.</label>  <input type="submit" value="begin de survey" name="naar1button" id="naar1button" /></p>
                   </div>
                </form>';
        } elseif ($_SESSION['stap'] == 1){
        ?>       
        <p class="uitleg">Hieronder staan 8 situaties. Met de bolletjes ernaast kun je op een schaal van &eacute;&eacute;n tot vijf aangeven hoevaak deze situaties voorkomen of zijn voorgekomen in je leven. </p>
        
        <form id="regulatory-focus" action="" method="post">
            <div>

         <ol>
         <li>
	 <em>Ben jij, vergeleken met de meeste mensen, gewoonlijk in staat om uit het leven te halen wat je wilt?</em>
         <label>nooit</label><input type="radio" id="q1_1" value="1" name="q1" <?php if(isset($_POST['q1'])) { if($_POST['q1'] == '1') { echo 'checked="checked"'; }} ?>>
         <label></label><input type="radio" id="q1_2" value="2" name="q1" <?php if(isset($_POST['q1'])) { if($_POST['q1'] == '2') { echo 'checked="checked"'; }} ?>>
	 <label></label><input type="radio" id="q1_3" value="3" name="q1" <?php if(isset($_POST['q1'])) { if($_POST['q1'] == '3') { echo 'checked="checked"'; }} ?>>
	 <label></label><input type="radio" id="q1_4" value="4" name="q1" <?php if(isset($_POST['q1'])) { if($_POST['q1'] == '4') { echo 'checked="checked"'; }} ?>>
	 <label>heel vaak</label><input type="radio" id="q1_5" value="5" name="q1 <?php if(isset($_POST['q1'])) { if($_POST['q1'] == '5') { echo 'checked="checked"'; }} ?>">
        </li>
        <li class="alternate">
	 <em>Heb je, tijdens het opgroeien, ooit grenzen overschreden door dingen te doen die je ouders niet zouden tolereren?</em>
	 <input type="radio" id="q2_1" value="1" name="q2" <?php if(isset($_POST['q2'])) { if($_POST['q2'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q2_2" value="2" name="q2" <?php if(isset($_POST['q2'])) { if($_POST['q2'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q2_3" value="3" name="q2" <?php if(isset($_POST['q2'])) { if($_POST['q2'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q2_4" value="4" name="q2" <?php if(isset($_POST['q2'])) { if($_POST['q2'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q2_5" value="5" name="q2" <?php if(isset($_POST['q2'])) { if($_POST['q2'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li>
	 <em>Hoe vaak heb je dingen bereikt die jou motiveerden om alleen maar harder te werken? </em>
	 <input type="radio" id="q3_1" value="1" name="q3" <?php if(isset($_POST['q3'])) { if($_POST['q3'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q3_2" value="2" name="q3" <?php if(isset($_POST['q3'])) { if($_POST['q3'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q3_3" value="3" name="q3" <?php if(isset($_POST['q3'])) { if($_POST['q3'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q3_4" value="4" name="q3" <?php if(isset($_POST['q3'])) { if($_POST['q3'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q3_5" value="5" name="q3" <?php if(isset($_POST['q3'])) { if($_POST['q3'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li class="alternate">
	 <em>Werkte je jouw ouders vaak op hun zenuwen toen je opgroeide?</em>
	 <input type="radio" id="q4_1" value="1" name="q4" <?php if(isset($_POST['q4'])) { if($_POST['q4'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q4_2" value="2" name="q4" <?php if(isset($_POST['q4'])) { if($_POST['q4'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q4_3" value="3" name="q4" <?php if(isset($_POST['q4'])) { if($_POST['q4'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q4_4" value="4" name="q4" <?php if(isset($_POST['q4'])) { if($_POST['q4'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q4_5" value="5" name="q4" <?php if(isset($_POST['q4'])) { if($_POST['q4'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li>
	 <em>Hoe vaak gehoorzaamde je aan regels en voorschriften die door je ouders waren opgesteld?</em>
	 <input type="radio" id="q5_1" value="1" name="q5" <?php if(isset($_POST['q5'])) { if($_POST['q5'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q5_2" value="2" name="q5" <?php if(isset($_POST['q5'])) { if($_POST['q5'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q5_3" value="3" name="q5" <?php if(isset($_POST['q5'])) { if($_POST['q5'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q5_4" value="4" name="q5" <?php if(isset($_POST['q5'])) { if($_POST['q5'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q5_5" value="5" name="q5" <?php if(isset($_POST['q5'])) { if($_POST['q5'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li class="alternate">
	 <em>Heb je je, tijdens het opgroeien, ooit op manieren gedragen die je ouders afkeurden?</em>
	 <input type="radio" id="q6_1" value="1" name="q6" <?php if(isset($_POST['q6'])) { if($_POST['q6'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q6_2" value="2" name="q6" <?php if(isset($_POST['q6'])) { if($_POST['q6'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q6_3" value="3" name="q6" <?php if(isset($_POST['q6'])) { if($_POST['q6'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q6_4" value="4" name="q6" <?php if(isset($_POST['q6'])) { if($_POST['q6'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q6_5" value="5" name="q6" <?php if(isset($_POST['q6'])) { if($_POST['q6'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li>
	 <em>Presteer je gewoonlijk goed op de verschillende dingen die je probeert? </em>
	 <input type="radio" id="q7_1" value="1" name="q7" <?php if(isset($_POST['q7'])) { if($_POST['q7'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q7_2" value="2" name="q7" <?php if(isset($_POST['q7'])) { if($_POST['q7'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q7_3" value="3" name="q7" <?php if(isset($_POST['q7'])) { if($_POST['q7'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q7_4" value="4" name="q7" <?php if(isset($_POST['q7'])) { if($_POST['q7'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q7_5" value="5" name="q7" <?php if(isset($_POST['q7'])) { if($_POST['q7'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li class="alternate">
	 <em>Ik raak wel eens in de problemen door niet voorzichtig genoeg te zijn.</em>
	 <input type="radio" id="q8_1" value="1" name="q8" <?php if(isset($_POST['q8'])) { if($_POST['q8'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q8_2" value="2" name="q8" <?php if(isset($_POST['q8'])) { if($_POST['q8'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q8_3" value="3" name="q8" <?php if(isset($_POST['q8'])) { if($_POST['q8'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q8_4" value="4" name="q8" <?php if(isset($_POST['q8'])) { if($_POST['q8'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q8_5" value="5" name="q8" <?php if(isset($_POST['q8'])) { if($_POST['q8'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
         </ol>
        
        <hr />
        <p class="uitleg" style="margin-top:30px;">Geef met behulp van de bolletjes aan in hoeverre je het met de drie stellingen hieronder oneens of eens bent.</p>
                
        <ol style="margin-top: 45px;">
         <li>
	 <em>Wanneer het gaat om het bereiken van dingen die ik belangrijk vind, vind ik dat ik niet zo goed presteer als ik idealiter zou willen.</em>
         <label>volledig oneens</label><input type="radio" id="q9_1" value="1" name="q9" <?php if(isset($_POST['q9'])) { if($_POST['q9'] == '1') { echo 'checked="checked"'; }} ?>>
         <label></label><input type="radio" id="q9_2" value="2" name="q9" <?php if(isset($_POST['q9'])) { if($_POST['q9'] == '2') { echo 'checked="checked"'; }} ?>>
	 <label></label><input type="radio" id="q9_3" value="3" name="q9" <?php if(isset($_POST['q9'])) { if($_POST['q9'] == '3') { echo 'checked="checked"'; }} ?>>
	 <label></label><input type="radio" id="q9_4" value="4" name="q9" <?php if(isset($_POST['q9'])) { if($_POST['q9'] == '4') { echo 'checked="checked"'; }} ?>>
	 <label>volledig eens</label><input type="radio" id="q9_5" value="5" name="q9 <?php if(isset($_POST['q9'])) { if($_POST['q9'] == '5') { echo 'checked="checked"'; }} ?>">
        </li>   
        <li class="alternate">
	 <em>Ik heb het gevoel dat ik vooruitgang heb geboekt in het succesvol zijn in mijn leven.</em>
	 <input type="radio" id="q10_1" value="1" name="q10" <?php if(isset($_POST['q10'])) { if($_POST['q10'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q10_2" value="2" name="q10" <?php if(isset($_POST['q10'])) { if($_POST['q10'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q10_3" value="3" name="q10" <?php if(isset($_POST['q10'])) { if($_POST['q10'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q10_4" value="4" name="q10" <?php if(isset($_POST['q10'])) { if($_POST['q10'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q10_5" value="5" name="q10" <?php if(isset($_POST['q10'])) { if($_POST['q10'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>
        <li>
	 <em>Er zijn weinig hobby's of activiteiten in mijn leven die mijn interesse weten vast te houden of mij motiveren er moeite in te steken.</em>
	 <input type="radio" id="q11_1" value="1" name="q11" <?php if(isset($_POST['q11'])) { if($_POST['q11'] == '1') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q11_2" value="2" name="q11" <?php if(isset($_POST['q11'])) { if($_POST['q11'] == '2') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q11_3" value="3" name="q11" <?php if(isset($_POST['q11'])) { if($_POST['q11'] == '3') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q11_4" value="4" name="q11" <?php if(isset($_POST['q11'])) { if($_POST['q11'] == '4') { echo 'checked="checked"'; }} ?>>
	 <input type="radio" id="q11_5" value="5" name="q11" <?php if(isset($_POST['q11'])) { if($_POST['q11'] == '5') { echo 'checked="checked"'; }} ?>>
        </li>

        </ol>
            </div>

            <input type="submit" value="Ga verder" id="submit" name="submit" style="float:left;" />
            <div id="bar-5" class="bar-main-container red">
                <div class="wrap">
                    <div class="bar-percentage" data-percentage="35"></div>
                    <div class="bar-container">
                        <div class="bar"></div>
                    </div>
                </div>
            </div>

        </form>
    <?php 
    if (isset($_POST['submit'])) {
        if (isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5']) && isset($_POST['q6']) && isset($_POST['q7']) && isset($_POST['q8']) && isset($_POST['q9']) && isset($_POST['q10']) && isset($_POST['q11'])) {
            $data = array(
            'q1'    => $_POST['q1'],
            'q2'     => $_POST['q2'],
            'q3'     => $_POST['q3'],
            'q4'     => $_POST['q4'],
            'q5'     => $_POST['q5'],
            'q6'     => $_POST['q6'],
            'q7'     => $_POST['q7'],
            'q8'     => $_POST['q8'],
            'q9'     => $_POST['q9'],
            'q10'     => $_POST['q10'],
            'q11'     => $_POST['q11']
            );
            if (filter_var_array($data, FILTER_VALIDATE_BOOLEAN)) {
                //geldige input
                $_SESSION['q1'] = $_POST['q1'];
                $_SESSION['q2'] = $_POST['q2'];
                $_SESSION['q3'] = $_POST['q3'];
                $_SESSION['q4'] = $_POST['q4'];
                $_SESSION['q5'] = $_POST['q5'];
                $_SESSION['q6'] = $_POST['q6'];
                $_SESSION['q7'] = $_POST['q7'];
                $_SESSION['q8'] = $_POST['q8'];
                $_SESSION['q9'] = $_POST['q9'];
                $_SESSION['q10'] = $_POST['q10'];
                $_SESSION['q11'] = $_POST['q11'];
                
                $_SESSION['promotiescore'] = (6-$_SESSION['q1'])+$_SESSION['q3']+$_SESSION['q7']+(6-$_SESSION['q9'])+$_SESSION['q10']+(6-$_SESSION['q11']); 
                $_SESSION['preventiescore'] = (6-$_SESSION['q2'])+(6-$_SESSION['q4'])+$_SESSION['q5']+(6-$_SESSION['q6'])+(6-$_SESSION['q8']);
                $_SESSION['promotiepercentage'] = ($_SESSION['promotiescore'] / 30) * 100;
                $_SESSION['preventiepercentage'] = ($_SESSION['preventiescore'] / 25) * 100;
                
                if ($_SESSION['promotiepercentage'] > $_SESSION['preventiepercentage']) {
                    $_SESSION['dominante_focus'] = 'promotie';
                } elseif ($_SESSION['promotiepercentage'] < $_SESSION['preventiepercentage']) {
                    $_SESSION['dominante_focus'] = 'preventie';
                } else{
                    $_SESSION['dominante_focus'] = 'geen';
                }
                    
                // ga naar de volgende pagina
                $_SESSION['stap'] = 2;
                echo '<meta http-equiv="refresh" content="0; url=index.php">';

            } else {
                echo  'ongeldig';
            }
        } else {
            echo '
            <script>
                    alert(\'Je hebt nog niet alle vragen beantwoord.\');
            </script>';
        }
    }
    
    } elseif ($_SESSION['stap'] == 2) {
        //eventueel score laten zien
        /*echo 'promotiescore = ' . $_SESSION['promotiescore'] . '<br />';
        echo 'preventiescore = ' . $_SESSION['preventiescore'] . '<br />';
        echo 'promotiepercentage = ' . $_SESSION['promotiepercentage'] . '<br />';
        echo 'preventiepercentage = ' . $_SESSION['preventiepercentage'] . '<br />';
        echo 'dominante focus = ' . $_SESSION['dominante_focus'] . '<br />';*/
        
        //zijn er al entries?
        $tellen = mysqli_num_rows((mysqli_query($con, "SELECT * FROM entries")));
         if ($tellen < 1) {
            // nee nog geen entries, dus maakt niet uit welke getoond wordt. Pak de promotie-versie maar.
            $tonen = 'promotie';
          } else {
            $aantal_promotie = mysqli_num_rows((mysqli_query($con, "SELECT * FROM entries WHERE dominante_focus = '". $_SESSION['dominante_focus'] ."' AND getoond = 'promotie'")));
            $aantal_preventie = mysqli_num_rows((mysqli_query($con, "SELECT * FROM entries WHERE dominante_focus = '". $_SESSION['dominante_focus'] ."' AND getoond = 'preventie'")));
            if ($aantal_promotie >= $aantal_preventie) {
                $tonen = 'preventie';
            } else {
                $tonen = 'promotie';
            }
          }
        $_SESSION['getoond'] = $tonen;
        if ($tonen == 'promotie') {
            $tekstje = '<div id="tekstje">
            <h2>78&#37; van de studenten start op tijd met studeren voor een tentamen voor een rustig en voldaan gevoel</h2>
            <p style="margin-bottom: 35px;">Tentamens zijn onlosmakelijk verbonden met studeren. Bijna elke periode wordt wel afgesloten met &eacute;&eacute;n of meerdere tentamens. 
            De meeste studenten willen graag op tijd beginnen met hun tentamenvoorbereiding omdat hun dat een rustig en voldaan gevoel geeft. 
            Uit onderzoek blijkt dat 78&#37; van de studenten erin slaagt om op tijd te beginnen met studeren en zich daardoor in tentamenperiodes relaxter voelt dan studenten die last-minute beginnen.
            De meeste studenten geven dan ook aan dat als ze op tijd beginnen met studeren, ze zich goed in hun vel voelen zitten. 
            Wanneer je op tijd begint zit je niet alleen beter in je vel, maar voel je je ook eerder vrolijk en energiek. 
            De meerderheid van de studenten slaagt erin om op tijd te beginnen met studeren en verzekert zich daarmee van relatief ontspannen tentamenweken. 
            Met het op tijd beginnen zorgen ze er daarnaast ook voor dat ze de leerstof na hun tentamen nog lang onthouden.  
</p></div>';
            } else {
            $tekstje = '<div id="tekstje">
            <h2>78&#37; van de studenten start op tijd met studeren en voorkomen daarmee stress en onrust </h2>
            <p>Tentamens zijn onlosmakelijk verbonden met studeren. Bijna elke periode wordt wel afgesloten met &eacute;&eacute;n of meerdere tentamens. De meeste studenten willen graag op tijd beginnen met hun tentamenvoorbereiding omdat hun dat stress en een onrustig gevoel scheelt. 
            Uit onderzoek blijkt dat 78&#37; van de studenten erin slaagt om op tijd te beginnen met studeren en zich daardoor in tentamenperiodes minder gestrest voelt dan studenten die last-minute beginnen.
            De meeste studenten geven dan ook aan dat als ze niet op tijd beginnen met studeren, ze zich slecht in hun vel voelen zitten.
            Wanneer je niet op tijd begint zit je niet alleen slechter in je vel, maar voel je je ook eerder terneergeslagen en futloos.
            De meerderheid van de studenten slaagt erin om op tijd te beginnen met studeren en beschermt zich daarmee tegen slopende tentamenweken. 
            Met het op tijd beginnen voorkomen ze daarnaast ook dat ze de leerstof na hun tentamen weer snel vergeten. 
            </p></div>';
        }
    ?>
        
        <p class=uitleg">Hieronder volgt een tekst. Neem rustig de tijd om hem door te lezen. Als je klaar bent kun je op 'Ga verder' klikken. Daarna volgen er nog enkele vragen.</p>
        
        <?php echo $tekstje; ?>
        <form id="naar3form" name="naar3form" action="" method="post" style="margin-left: 50px;">
            <input type="submit" name="naar3button" id="naar3button" value="Ga verder" style="float:left;" />
            <div id="bar-5" class="bar-main-container red">
                <div class="wrap">
                    <div class="bar-percentage" data-percentage="60"></div>
                    <div class="bar-container">
                        <div class="bar"></div>
                    </div>
                </div>
            </div>
            
        </form>
        
        
    <?php 
    } elseif ($_SESSION['stap'] == 3) {
        // constructen meten met likertschalen
    ?>
        <form id="naar4form" name="naar4form" action="" method="post">
            
        
            
        <table class="likert-groep">
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q12'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Bij mijn vorige tentamenperiode was ik ruim op tijd begonnen met studeren.</td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q12_1" value="1" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_2" value="2" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_3" value="3" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_4" value="4" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_5" value="5" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_6" value="6" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q12_7" value="7" name="q12" <?php if(isset($_POST['q12'])) { if($_POST['q12'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q13'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik ben van plan om voor mijn volgende tentamenperiode ruim op tijd te beginnen met studeren. </td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Zeker niet</td>
                <td><input type="radio" id="q13_1" value="1" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_2" value="2" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_3" value="3" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_4" value="4" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_5" value="5" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_6" value="6" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q13_7" value="7" name="q13" <?php if(isset($_POST['q13'])) { if($_POST['q13'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeker wel</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q14'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik zal voor mijn aankomende tentamenperiode ruim op tijd beginnen met studeren.</td>
            </tr>
            <tr>
                <td class="likert-links">Onwaarschijnlijk</td>
                <td><input type="radio" id="q14_1" value="1" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_2" value="2" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_3" value="3" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_4" value="4" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_5" value="5" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_6" value="6" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q14_7" value="7" name="q14" <?php if(isset($_POST['q14'])) { if($_POST['q14'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waarschijnlijk</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q15'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik ben bereid om ruim op tijd te beginnen met studeren voor mijn volgende tentamenperiode.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Onwaar</td>
                <td><input type="radio" id="q15_1" value="1" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_2" value="2" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_3" value="3" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_4" value="4" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_5" value="5" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_6" value="6" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q15_7" value="7" name="q15" <?php if(isset($_POST['q15'])) { if($_POST['q15'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waar</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q16'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik ga voor mijn volgende tentamenperiode ruim op tijd beginnen met studeren. </td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q16_1" value="1" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_2" value="2" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_3" value="3" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_4" value="4" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_5" value="5" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_6" value="6" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q16_7" value="7" name="q16" <?php if(isset($_POST['q16'])) { if($_POST['q16'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q17'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik ben er zeker van dat ik voor mijn komende tentamenperiode ruim op tijd van te voren kan beginnen met studeren.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Onwaar</td>
                <td><input type="radio" id="q17_1" value="1" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_2" value="2" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_3" value="3" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_4" value="4" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_5" value="5" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_6" value="6" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q17_7" value="7" name="q17" <?php if(isset($_POST['q17'])) { if($_POST['q17'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waar</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q18'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Of ik de komende tentamenperiode ruim op tijd ga beginnen met studeren, heb ik volledig in eigen hand.  </td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q18_1" value="1" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_2" value="2" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_3" value="3" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_4" value="4" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_5" value="5" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_6" value="6" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q18_7" value="7" name="q18" <?php if(isset($_POST['q18'])) { if($_POST['q18'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q19'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Als ik dat echt wil, dan kan ik voor de komende tentamenperiode ruim op tijd beginnen met studeren.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Onwaarschijnlijk</td>
                <td><input type="radio" id="q19_1" value="1" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_2" value="2" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_3" value="3" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_4" value="4" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_5" value="5" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_6" value="6" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q19_7" value="7" name="q19" <?php if(isset($_POST['q19'])) { if($_POST['q19'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waarschijnlijk</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q20'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Er staat mij niets in de weg om ruim op tijd te beginnen met studeren voor mijn volgende tentamenperiode. </td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q20_1" value="1" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_2" value="2" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_3" value="3" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_4" value="4" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_5" value="5" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_6" value="6" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q20_7" value="7" name="q20" <?php if(isset($_POST['q20'])) { if($_POST['q20'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q21'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De tekst benadrukte positieve gevolgen van op tijd beginnen met studeren.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q21_1" value="1" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_2" value="2" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_3" value="3" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_4" value="4" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_5" value="5" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_6" value="6" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q21_7" value="7" name="q21" <?php if(isset($_POST['q21'])) { if($_POST['q21'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q22'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De tekst benadrukte dat je negatieve gevolgen kunt voorkomen door op tijd te beginnen met studeren.</td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee oneens</td>
                <td><input type="radio" id="q22_1" value="1" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_2" value="2" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_3" value="3" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_4" value="4" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_5" value="5" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_6" value="6" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q22_7" value="7" name="q22" <?php if(isset($_POST['q22'])) { if($_POST['q22'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee eens</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && (!isset($_POST['q23']) || !isset($_POST['q24']))) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik vond de tekst:</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links" style="padding-bottom:5px;">Moeilijk te verwerken</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_1" value="1" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_2" value="2" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_3" value="3" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_4" value="4" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_5" value="5" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_6" value="6" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q23_7" value="7" name="q23" <?php if(isset($_POST['q23'])) { if($_POST['q23'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Makkelijk te verwerken</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Moeilijk te begrijpen</td>
                <td><input type="radio" id="q24_1" value="1" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_2" value="2" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_3" value="3" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_4" value="4" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_5" value="5" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_6" value="6" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q24_7" value="7" name="q24" <?php if(isset($_POST['q24'])) { if($_POST['q24'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Makkelijk te begrijpen</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && (!isset($_POST['q25']) || !isset($_POST['q26']))) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De tekst heb ik:</td>
            </tr>
            <tr>
                <td class="likert-links" style="padding-bottom:5px;">Snel gescand</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_1" value="1" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_2" value="2" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_3" value="3" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_4" value="4" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_5" value="5" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_6" value="6" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q25_7" value="7" name="q25" <?php if(isset($_POST['q25'])) { if($_POST['q25'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Zorgvuldig doorgelezen</td>
            </tr>
            <tr>
                <td class="likert-links">Weinig aandacht gegeven</td>
                <td><input type="radio" id="q26_1" value="1" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_2" value="2" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_3" value="3" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_4" value="4" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_5" value="5" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_6" value="6" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q26_7" value="7" name="q26" <?php if(isset($_POST['q26'])) { if($_POST['q26'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Veel aandacht gegeven</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && (!isset($_POST['q27']) || !isset($_POST['q28']))) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Bij het lezen van de tekst voelde ik me:</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links" style="padding-bottom:5px;">Zeer onbetrokken</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_1" value="1" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_2" value="2" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_3" value="3" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_4" value="4" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_5" value="5" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_6" value="6" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q27_7" value="7" name="q27" <?php if(isset($_POST['q27'])) { if($_POST['q27'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Zeer betrokken</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Zeer onge&iuml;nteresseerd</td>
                <td><input type="radio" id="q28_1" value="1" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_2" value="2" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_3" value="3" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_4" value="4" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_5" value="5" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_6" value="6" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q28_7" value="7" name="q28" <?php if(isset($_POST['q28'])) { if($_POST['q28'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer ge&iuml;nteresseerd</td>
            </tr>
       
            
            <!--
             </table>
            <hr style="margin-top:30px;"/>
            
            <div style="width: 100px; float:left; padding-left: 50px; margin-right: 0; color: chocolate; font-weight: bold; margin-top: 50px; margin-bottom: 55px;">Je voortgang</div>
            <div id="tussenbar" class="bar-main-container red" style="margin-top: 55px; margin-bottom: 55px;">
                <div class="wrap">
                    <div class="bar-percentage" data-percentage="65"></div>
                    <div class="bar-container">
                        <div class="bar"></div>
                    </div>
                </div>
            </div>
            
            <hr style="margin-bottom:30px"/> 
            <table class="likert-groep">
            -->
            
            
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && (!isset($_POST['q29']) || !isset($_POST['q30']) || !isset($_POST['q31']) || !isset($_POST['q32']) || !isset($_POST['q33']))) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Als ik voor de komende tentamenperiode ruim op tijd begin met studeren, dan is dat:</td>
            </tr>
            <tr>
                <td class="likert-links" style="padding-bottom:5px;">Goed</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_1" value="1" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_2" value="2" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_3" value="3" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_4" value="4" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_5" value="5" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_6" value="6" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q29_7" value="7" name="q29" <?php if(isset($_POST['q29'])) { if($_POST['q29'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Slecht</td>
            </tr>
            <tr>
                <td class="likert-links" style="padding-bottom:5px;">Onplezierig</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_1" value="1" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_2" value="2" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_3" value="3" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_4" value="4" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_5" value="5" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_6" value="6" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q30_7" value="7" name="q30" <?php if(isset($_POST['q30'])) { if($_POST['q30'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Plezierig</td>
            </tr>
            <tr>
                <td class="likert-links" style="padding-bottom:5px;">Schadelijk</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_1" value="1" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_2" value="2" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_3" value="3" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_4" value="4" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_5" value="5" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_6" value="6" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q31_7" value="7" name="q31" <?php if(isset($_POST['q31'])) { if($_POST['q31'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Voordelig</td>
            </tr>
            <tr>
                <td class="likert-links" style="padding-bottom:5px;">Interessant</td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_1" value="1" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_2" value="2" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_3" value="3" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_4" value="4" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_5" value="5" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_6" value="6" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td style="padding-bottom:5px;"><input type="radio" id="q32_7" value="7" name="q32" <?php if(isset($_POST['q32'])) { if($_POST['q32'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts" style="padding-bottom:5px;">Vervelend</td>
            </tr>
            <tr>
                <td class="likert-links">Verstandig</td>
                <td><input type="radio" id="q33_1" value="1" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_2" value="2" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_3" value="3" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_4" value="4" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_5" value="5" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_6" value="6" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q33_7" value="7" name="q33" <?php if(isset($_POST['q33'])) { if($_POST['q33'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Onverstandig</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q34'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    In de tekst werd een norm beschreven.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Onwaar</td>
                <td><input type="radio" id="q34_1" value="1" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_2" value="2" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_3" value="3" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_4" value="4" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_5" value="5" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_6" value="6" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q34_7" value="7" name="q34" <?php if(isset($_POST['q34'])) { if($_POST['q34'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waar</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag" style="padding-bottom: 15px;"><?php if(isset($_POST['naar4button']) && ($_POST['normprocent'] ="" || !filter_var($_POST['normprocent'],FILTER_VALIDATE_INT))) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Ik denk dat <input type="number" maxlength="3" name="normprocent" id="normprocent"  value="<?php echo $normprocent; ?>" style="width: 45px; margin-left: 10px; margin-right: 10px;" />&percnt; van de studenten aan mijn universiteit ruim op tijd begint met studeren voor een tentamenperiode. <span style="font-size: smaller; font-style: italic; color: #333333;">Vul svp een getal in het vak in.</span> </td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q35'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De meeste mensen die belangrijk voor me zijn vinden dat ik voor de volgende tentamenperiode ruim op tijd moet beginnen met studeren.</td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Onwaar</td>
                <td><input type="radio" id="q35_1" value="1" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_2" value="2" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_3" value="3" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_4" value="4" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_5" value="5" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_6" value="6" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q35_7" value="7" name="q35" <?php if(isset($_POST['q35'])) { if($_POST['q35'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waar</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q36'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De meeste mensen van wie ik het oordeel belangrijk vind, zouden het goed vinden als ik ruim op tijd begin met het studeren voor mijn volgende tentanemperiode.</td>
            </tr>
            <tr>
                <td class="likert-links">Onwaarschijnlijk</td>
                <td><input type="radio" id="q36_1" value="1" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_2" value="2" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_3" value="3" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_4" value="4" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_5" value="5" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_6" value="6" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q36_7" value="7" name="q36" <?php if(isset($_POST['q36'])) { if($_POST['q36'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Waarschijnlijk</td>
            </tr>
            <tr class="alternate">
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q37'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    De meeste mensen die ik respecteer en bewonder zouden voor een tentamenperiode ruim op tijd beginnen te studeren.  </td>
            </tr>
            <tr class="alternate">
                <td class="likert-links">Zeker niet</td>
                <td><input type="radio" id="q37_1" value="1" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_2" value="2" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_3" value="3" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_4" value="4" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_5" value="5" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_6" value="6" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q37_7" value="7" name="q37" <?php if(isset($_POST['q37'])) { if($_POST['q37'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeker wel</td>
            </tr>
            <tr>
                <td colspan="9" class="likert-vraag"><?php if(isset($_POST['naar4button']) && !isset($_POST['q38'])) { echo '<img src="letop.png" style="float:left; margin-right: 5px;" title="Je hebt deze vraag nog niet beantwoord" />' ;} ?>
                    Mensen zoals ik beginnen ruim op tijd met de voorbereiding voor hun tentamenperiode.</td>
            </tr>
            <tr>
                <td class="likert-links">Zeer mee eens</td>
                <td><input type="radio" id="q38_1" value="1" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '1') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_2" value="2" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '2') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_3" value="3" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '3') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_4" value="4" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '4') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_5" value="5" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '5') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_6" value="6" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '6') { echo 'checked="checked"'; }} ?>></td>
                <td><input type="radio" id="q38_7" value="7" name="q38" <?php if(isset($_POST['q38'])) { if($_POST['q38'] == '7') { echo 'checked="checked"'; }} ?>></td>
                <td class="likert-rechts">Zeer mee oneens</td>
            </tr>
            
            </table>
            <br />
            
       
        
            <input type="submit" name="naar4button" id="naar4button" value="Ga verder" style="float:left;" />
            <div id="bar-5" class="bar-main-container red">
                <div class="wrap">
                    <div class="bar-percentage" data-percentage="92"></div>
                    <div class="bar-container">
                        <div class="bar"></div>
                    </div>
                </div>
            </div>
        </form>
        
    <?php     
    if (isset($_POST['naar4button'])) {
        
              
        if (isset($_POST['q12']) && isset($_POST['q13']) && isset($_POST['q14']) && isset($_POST['q15']) && isset($_POST['q16']) && isset($_POST['q17']) && isset($_POST['q18']) && isset($_POST['q19']) && isset($_POST['q20']) && isset($_POST['q21']) && isset($_POST['q22']) && isset($_POST['q23']) && isset($_POST['q24']) && isset($_POST['q25'])  && isset($_POST['q26']) && isset($_POST['q27']) && isset($_POST['q28']) && isset($_POST['q29'])  && isset($_POST['q30'])  && isset($_POST['q31'])  && isset($_POST['q32'])  && isset($_POST['q33'])  && isset($_POST['q34']) && isset($_POST['q35'])  && isset($_POST['q36'])  && isset($_POST['q37'])  && isset($_POST['q38']) && strlen($normprocent) > 0 ) {
            $data = array(
                $_POST['q12'],
                $_POST['q14'],
                $_POST['q15'],
                $_POST['q16'],
                $_POST['q17'],
                $_POST['q18'],
                $_POST['q19'],
                $_POST['q20'],
                $_POST['q21'],
                $_POST['q22'],
                $_POST['q23'],
                $_POST['q24'],
                $_POST['q25'],
                $_POST['q26'],
                $_POST['q27'],
                $_POST['q28'],
                $_POST['q29'],
                $_POST['q30'],
                $_POST['q31'],
                $_POST['q32'],
                $_POST['q33'],
                $_POST['q34'],
                $_POST['q35'],
                $_POST['q36'],
                $_POST['q37'],
                $_POST['q38'],
                $normprocent
            );
            
                      
            if (filter_var_array($data, FILTER_VALIDATE_INT)) {
                //geldige input
                $_SESSION['q12'] = $_POST['q12'];
                $_SESSION['q13'] = $_POST['q13'];
                $_SESSION['q14'] = $_POST['q14'];
                $_SESSION['q15'] = $_POST['q15'];
                $_SESSION['q16'] = $_POST['q16'];
                $_SESSION['q17'] = $_POST['q17'];
                $_SESSION['q18'] = $_POST['q18'];
                $_SESSION['q19'] = $_POST['q19'];
                $_SESSION['q20'] = $_POST['q20'];
                $_SESSION['q21'] = $_POST['q21'];
                $_SESSION['q22'] = $_POST['q22'];
                $_SESSION['q23'] = $_POST['q23'];
                $_SESSION['q24'] = $_POST['q24'];
                $_SESSION['q25'] = $_POST['q25'];
                $_SESSION['q26'] = $_POST['q26'];
                $_SESSION['q27'] = $_POST['q27'];
                $_SESSION['q28'] = $_POST['q28'];
                $_SESSION['q29'] = $_POST['q29'];
                $_SESSION['q30'] = $_POST['q30'];
                $_SESSION['q31'] = $_POST['q31'];
                $_SESSION['q32'] = $_POST['q32'];
                $_SESSION['q33'] = $_POST['q33'];
                $_SESSION['q34'] = $_POST['q34'];
                $_SESSION['q35'] = $_POST['q35'];
                $_SESSION['q36'] = $_POST['q36'];
                $_SESSION['q37'] = $_POST['q37'];
                $_SESSION['q38'] = $_POST['q38'];
                $_SESSION['normprocent'] = $normprocent;
                                    
                // ga naar de volgende pagina
                $_SESSION['stap'] = 4;
                echo '<meta http-equiv="refresh" content="0; url=index.php">';

            } else {
                echo  '<script>
                        alert(\'Vul een geldig getal in het invoerveld in.\');
                    </script>';
            }
        } else {
            echo '
            <script>
                    alert(\'Je hebt nog niet alle vragen beantwoord.\');
            </script>';
        }
    }
    
    
    
    } elseif ($_SESSION['stap'] == 4) {
    ?>  
        <p class=uitleg" style="margin-bottom: 45px;">Na het beantwoorden van de onderstaande vragen ben je helemaal klaar! Vergeet daarna niet op de button te klikken om je antwoorden in te sturen.<br /> </p>
        
        <form id="naareindeform" name="naareindeform" action="" method="post">
            <p class="uitleg">
            <table>
                <tr>
                    <td><label for="leeftijd" style="margin-right:40px;">Leeftijd: </label></td>
                    <td><input type="number" name="leeftijd" id="leeftijd" style="width: 60px;" value="<?php if(isset($_POST['leeftijd'])) { echo filter_var($_POST['leeftijd'], FILTER_VALIDATE_INT); } ?>" /></td>
                </tr>
                <tr>
                    <td>Geslacht: </td>
                    <td><br /><input type="radio" name="geslacht" id="vrouw" value="1"   <?php if(isset($_POST['geslacht'])) { if($_POST['geslacht'] == '1') { echo 'checked="checked"'; }} ?> /> <label for="vrouw">vrouw </label> <br />
                        <input type="radio" name="geslacht" id="man" value="2"  <?php if(isset($_POST['geslacht'])) { if($_POST['geslacht'] == '2') { echo 'checked="checked"'; }} ?> /> <label for="man">man </label> <br /></td>
                </tr>
                <tr>
                    <td>Huidig studiejaar: </td>
                    <td><br /><input type="radio" name="studiejaar" id="hbo-p" value="0"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '0') { echo 'checked="checked"'; }} ?> /> <label for="hbo-p">HBO propedeuse </label> <br />
                        <input type="radio" name="studiejaar" id="hbo-b" value="1"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '1') { echo 'checked="checked"'; }} ?> /> <label for="hbo-b">HBO bachelor </label> <br />
                        <input type="radio" name="studiejaar" id="hbo-m" value="2"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '2') { echo 'checked="checked"'; }} ?> /> <label for="hbo-m">HBO master </label> <br />
                        <input type="radio" name="studiejaar" id="hbo-s" value="3"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '3') { echo 'checked="checked"'; }} ?> /> <label for="hbo-s">Schakeljaar HBO &RightArrow; WO  </label> <br />
                        
                        <input type="radio" name="studiejaar" id="wo-p" value="4"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '4') { echo 'checked="checked"'; }} ?> /> <label for="wo-p">WO propedeuse </label> <br />
                        <input type="radio" name="studiejaar" id="wo-b" value="5"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '5') { echo 'checked="checked"'; }} ?> /> <label for="wo-b">WO bachelor </label> <br />
                        <input type="radio" name="studiejaar" id="wo-m" value="6"  <?php if(isset($_POST['studiejaar'])) { if($_POST['studiejaar'] == '6') { echo 'checked="checked"'; }} ?> /> <label for="wo-m">WO master </label> <br /></td>
                </tr>
                <tr>
                    <td><br /><label for="studie">Huidige studie: </label></td>
                    <td><br /><input type="text" id="studie" name="studie" value="<?php if(isset($_POST['studie'])) { echo $_POST['studie']; } ?> "/></td>
                </tr>
                       
            </table></p>
            
        <input type="submit" name="naareindebutton" id="naareindebutton" value="Stuur mijn antwoorden in" style="float:left;" />
            <div id="bar-5" class="bar-main-container red" style="float:right;">
                <div class="wrap">
                    <div class="bar-percentage" data-percentage="99"></div>
                    <div class="bar-container">
                        <div class="bar"></div>
                    </div>
                </div>
            </div>    
        </form>
    
    <?php     
    if (isset($_POST['naareindebutton'])) {     
        
        if (isset($_POST['geslacht']) && isset($_POST['studiejaar']) && $_POST['studie'] != "" && strlen($_POST['studie']) > 2  ) {
            $data = array(
            'geslacht'    => $_POST['geslacht'],
            'studiejaar'     => $_POST['studiejaar']);

            if (filter_var_array($data, FILTER_VALIDATE_INT) && filter_var($_POST['leeftijd'], FILTER_VALIDATE_INT) && $_POST['leeftijd'] > 0) {
                //geldige input
                $_SESSION['leeftijd'] = $_POST['leeftijd'];
                $_SESSION['geslacht'] = $_POST['geslacht'];
                $_SESSION['studiejaar'] = $_POST['studiejaar'];
                $_SESSION['studie'] = filter_var($_POST['studie'], FILTER_SANITIZE_SPECIAL_CHARS);
                
                                    
                // sla op in de db
                $insert = mysqli_query($con, "INSERT INTO entries (ip,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,promotiescore,preventiescore,promotiepercentage,preventiepercentage,dominante_focus,getoond,normprocent,leeftijd,geslacht,studiejaar,studie) VALUES ('".$_SERVER['REMOTE_ADDR']."','".$_SESSION['q1']."','".$_SESSION['q2']."','".$_SESSION['q3']."','".$_SESSION['q4']."','".$_SESSION['q5']."','".$_SESSION['q6']."','".$_SESSION['q7']."','".$_SESSION['q8']."','".$_SESSION['q9']."','".$_SESSION['q10']."','".$_SESSION['q11']."','".$_SESSION['q12']."','".$_SESSION['q13']."','".$_SESSION['q14']."','".$_SESSION['q15']."','".$_SESSION['q16']."','".$_SESSION['q17']."','".$_SESSION['q18']."','".$_SESSION['q19']."','".$_SESSION['q20']."','".$_SESSION['q21']."','".$_SESSION['q22']."','".$_SESSION['q23']."','".$_SESSION['q24']."','".$_SESSION['q25']."','".$_SESSION['q26']."','".$_SESSION['q27']."','".$_SESSION['q28']."','".$_SESSION['q29']."','".$_SESSION['q30']."','".$_SESSION['q31']."','".$_SESSION['q32']."','".$_SESSION['q33']."','".$_SESSION['q34']."','".$_SESSION['q35']."','".$_SESSION['q36']."','".$_SESSION['q37']."','".$_SESSION['q38']."','".$_SESSION['promotiescore']."','".$_SESSION['preventiescore']."','".$_SESSION['promotiepercentage']."','".$_SESSION['preventiepercentage']."','".$_SESSION['dominante_focus']."','".$_SESSION['getoond']."','".$_SESSION['normprocent']."','".$_SESSION['leeftijd']."','".$_SESSION['geslacht']."','".$_SESSION['studiejaar']."','".$_SESSION['studie']."') ");

                // ga naar de volgende pagina
                $_SESSION['stap'] = 5;
                echo '<meta http-equiv="refresh" content="0; url=index.php">';

            } else {
                echo  'Vul voor elke vraag een geldig antwoord in.';
            }
        } else {
            echo '
            <script>
                    alert(\'Je hebt nog niet alle vragen beantwoord.\');
            </script>';
        }
    }    
    
    
    } elseif ($_SESSION['stap'] == 5) {
    ?>
        <p class="uitleg">Heel hartelijk bedankt voor je tijd!</p>
        
        <div id="beginbox" style="margin-top: 0;">
            
            <?php if ($_SESSION['al_geloot'] == '1') {
                echo '<p>Nogmaals bedankt voor het deelnemen! De winnaars worden gemaild zodra ik mijn beoogde aantal respondenten heb gehaald.</p> ';
            } else {
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $ballonnen = '';
                $bier =  '';
                $brownies = '';
                if(isset($_POST['prijs'])) { 
                    if($_POST['prijs'] == '1') { 
                        $ballonnen = 'checked="checked"'; 
                    } elseif ($_POST['prijs'] == '2') {
                        $bier = 'checked="checked"'; 
                    } else {
                        $brownies = 'checked="checked"'; 
                    }
                } 
                echo '<p>Ik ben ontzettend blij met je! Als je wilt kun je hieronder je emailadres achterlaten en meeloten naar een cadeau naar keuze. <br /></p>
                    <form id="lotingform" name="lotingform" action="" method="post">
            <p><br /><input type="radio" name="prijs" id="ballonnen" '. $ballonnen .' value="1" /> <label for="ballonnen">Ballonnenvouw workshop voor 6 personen</label> <br />
            <input type="radio" name="prijs" id="bier" '. $bier .' value="2"/> <label for="bier">Speciaalbierpakket</label> <br />
            <input type="radio" name="prijs" id="brownies" '. $brownies .' value="3" /> <label for="brownies">Doos zelfgemaakte brownies</label></p>
            <p><br /><input type="text" name="email" id="email" value="'. $email .'" placeholder="Je emailadres" /> <input type="submit" name="loterijbutton" id="loterijbutton" value="Loot mij mee" /></p>
</p>
            </form>';
            }
            
            if (isset($_POST['loterijbutton'])) {     
        
                
        if (isset($_POST['prijs']) && isset($_POST['email']) ) {

            if (filter_var($_POST['prijs'], FILTER_VALIDATE_INT) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                //geldige input
                $_SESSION['prijs'] = $_POST['prijs'];
                $_SESSION['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);               
                
                //loting in database registreren
                $insert = mysqli_query($con, "INSERT INTO loting (email, keuze) VALUES ('". $_SESSION['email'] ."','". $_SESSION['prijs'] ."') ");
                // update al_geloot
                $_SESSION['al_geloot'] = 1;
                echo '<meta http-equiv="refresh" content="0; url=index.php">';

            } else {
                echo  '<p class="error">Maak kenbaar voor welk van de drie cadeautjes je mee wilt loten en geef een geldig emailadres op.</p>';
            }
        } else {
            echo '
            <script>
                    alert(\'Maak kenbaar voor welk van de drie cadeautjes je mee wilt loten en geef een geldig emailadres op.\');
            </script>';
        }
    }
            
           ?>
        </div>
        
        
        <p class="uitleg">Ben je benieuwd naar de resultaten uit dit onderzoek? Als je een mailtje naar <a href="mailto:k.reusen@gmail.com" title="mail mij">k.reusen@gmail.com</a> stuurt zal ik je te zijner tijd verslag doen van de resultaten. </p>
        <p class="uitleg"><br />Klik <a href="opnieuw.php">hier</a> om iemand anders de test nog eens te laten doen</p>
        
    <?php
    } //einde if else van stappen
    ?>
        </div>    
    </body>
    
    <script type="text/javascript">
    $('.bar-percentage[data-percentage]').each(function () {
  var progress = $(this);
  var percentage = Math.ceil($(this).attr('data-percentage'));
  $({countNum: 0}).animate({countNum: percentage}, {
    duration: 800,
    easing:'linear',
    step: function() {
      // What todo on every count
    var pct = '';
    if(percentage == 0){
      pct = Math.floor(this.countNum) + '%';
    }else{
      pct = Math.floor(this.countNum+1) + '%';
    }
    progress.text(pct) && progress.siblings().children().css('width',pct);
    }
  });
});    
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58394673-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
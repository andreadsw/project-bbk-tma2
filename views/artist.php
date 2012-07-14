<?php
/**
 * Project  W1 Music
 * 
 * Artist WebPage
 * 
 */

// Include the application configuration settings
require_once '_inc/config.inc.php';

// Include the database class definition
require_once '_class/mydb.class.php';

// Gather output
$output = '';


// Instantiate the class
$db = new myDb($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);


//My query execution
$my_result= $db->listactiveArtist();
$my_total= $db->totalactiveArtists();


// Check if the select function returned false
if ($my_result !== false and $my_total !== false) {

    // Pass the result to the class method
    $artist_array = $db->resourceToArray($my_result);
    $total_array = $db->resourceToArray($my_total);
    
    // See if there were any results
    if (empty($artist_array)) {

        $output .= '<p>No artist found in database.</p>';

    } else {
        
        //Start here the html output with table
		
		$output .='	<table class="bordered">
				   	<thead>
				   	<tr>
					<th>Name</th>
					<th>Number of Songs</th>
					</tr>
				   	</thead>';
	 
	///Go through the array $artist_array to get the value from database
		for($i=0;$i<count($artist_array);$i++){
	 			
	   		$output.='<tbody><tr>';
	    	$output.='<td>'.htmlentities($artist_array[$i]['name']).'</td>';
	    	$output.='<td>'.htmlentities($artist_array[$i]['SongCount']).'</td>';
	 		$output.= '</tr> </tbody>';
		}
			
		// Close the table tag	
	 	$output .='</table>';
		
		$htmlsafetotal = htmlentities($total_array[0]['TotalArtists']);
		$output .='<p> TOTAL ARTISTS: '.$htmlsafetotal.'</p>';
	
    }

	} else {
    
    $output .= '<p>Oops... Query has failed!</p>';

}

// Close the connection
$db->close();

// Display Template Format
$tpl = file_get_contents('_templates/template.html');


$title = 'W1 Music';
$heading = 'W1 Music - Artist';
$content = $output;

// Follow the same sixtaxe, arguments that it is used with $output;
$parsedtemplate = str_replace('[+title+]', $title, $tpl);
$parsedtemplate = str_replace('[+heading+]', $heading, $parsedtemplate);
$parsedtemplate = str_replace('[+content+]', $content, $parsedtemplate);

// At the end I need to render the page join the bits such as title, heading and content.
echo $parsedtemplate;

?>
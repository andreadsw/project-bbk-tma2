<?php
/**
 * Project  W1 Music
 * 
 * Song WebPage
 * 
 */

// Include the application configuration settings
require_once '_inc/config.inc.php';

require_once '_functions/function.inc.php';

// Include the database class definition
require_once '_class/mydb.class.php';

// Gather output
$output = '';

// Instantiate the class
$db = new myDb($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);


//My query execution
$my_result= $db->listSongs();
$my_total= $db->totalSongs();

// Check if the select function returned false
if ($my_result !== false and $my_total !== false) {

    // Pass the result to the class method
    $song_array = $db->resourceToArray($my_result);
    $total_array = $db->resourceToArray($my_total);
    
    // See if there were any results
    if (empty($song_array)) {

        $output .= '<p>No Song found in database.</p>';

    } else {
       
       	// Start the html output with table
		$output .='	<table class="bordered">
				   	<thead>
				   	<tr>
					<th>Name</th>
					<th>Title</th>
					<th>Duration</th>		
					</tr>
				   	</thead>';
		
		//Go through the array $song_array to get the value from database
		for($i=0;$i<count($song_array);$i++){
			
			// Before echoing to the page, we need to escape special characters	
			$output.='<tbody><tr>';
	    	$output.='<td>'.htmlentities($song_array[$i]['name']).'</td>';
	    	$output.='<td>'.htmlentities($song_array[$i]['title']).'</td>';
	    	$output.='<td>'.htmlentities(sec2hms($song_array[$i]['duration'])).'</td>';
	 		$output.= '</tr> </tbody>';
			
		}
		
		// Close the table tag	
	 	$output .='</table>';
		
		$htmlsafetotal = htmlentities($total_array[0]['SongTotal']);
		$output .='<p> TOTAL SONGS: '.$htmlsafetotal.'</p>';
    }

} else {
    
    $output .= '<p>Oops... Query has failed!</p>';

}

// Close the connection
$db->close();

// Displays Template format
$tpl = file_get_contents('_templates/template.html');

$title = 'W1 Music';
$heading = 'W1 Music - Songs';
$content = $output; // the new variable $content should receive the $output variable here because the $output is sql content.

// Here for avoiding the variable replacement I should create a new var called $parsedtemplate to see the bits of my page.
// I need to follow the same sixtaxe, arguments that it is used with $output;
$parsedtemplate = str_replace('[+title+]', $title, $tpl);
$parsedtemplate = str_replace('[+heading+]', $heading, $parsedtemplate);
$parsedtemplate = str_replace('[+content+]', $content, $parsedtemplate);

// At the end I need to render my page just join the bits such as title, heading and content.
echo $parsedtemplate;

?>
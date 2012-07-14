<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        
        <!-- Navigation -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=1">artist</a></li>
            <li><a href="index.php?page=2">song</a></li>
        </ul>
        
        <?php
        
        // Check if a value has been passed in the query string
        // if not, set $page to 0
        if (isset($_GET['page'])) {
            
            // Use intval to convert whatever was passed into an integer
            $page = intval($_GET['page']);
        
        } else {
            
            $page = 0;
        
        }
        
        
        // Display appropriate content, based on the value of $page
        switch ($page) {
            
            // Display page artist 
            case 1 : include("views/artist.php"); 
                break;
            
            // Display page song 
            case 2 : include("views/song.php"); 
                break;
            
            // Display Part of Home page - Welcome 
            default : include("views/welcome.php"); 
               break;
        }
        	
		?>
    
    </body>
</html>

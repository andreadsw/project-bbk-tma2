<?php
/**
 * W1 Music website
 * 
 * This file contains a database utility class definition
 *
 */

/** 
 * Database utility class
 * @access public
 * @package W1
 */
class myDb {

    /**
     * Store the connection handle as a class variable
     * This can be private, as it won't be used "outside" the class
     * @access private
     * @var mixed
     */
    private $connection;

    /**
     * Constructor function will attempt to connect to the database
     * If it fails, script will die. If it succeeds, handle is stored in $this->connection
     * @param string $host MySQL hostname
     * @param string $username MySQL username
     * @param string $password MySQL password
     * @param string $db Database to use
     * @return void
     */
    function __construct($host, $username, $password, $db) {
        
        $this->connection = mysqli_connect($host, $username, $password, $db);

        if (mysqli_connect_errno()) {
            die('Could not create database connection');
        }
        
    }

    /**
     * Function to close the database connection (if it is open)
     * @return void
     */
    function close() {
    
        if ($this->connection) {
        
            mysqli_close($this->connection);
        
        }
    
    }

    
    /**
    * Function displays all list of active artist from the database. 
    * For each artist displays name and number of song accredited to them.
    * If an artist has no song is not included in the list. 
    * The list should be sorted by artist name in asceding order
    *
    * SELECT a.name, COUNT(s.id) AS SongCount
	* FROM artist a
	* Where s.id >0
	* GROUP BY a.id
	* 
	*
    **/
    
   public function listactiveArtist() {
		
		$sql = "SELECT a.name, COUNT(s.id) AS SongCount ".
 				"FROM artist a ".
				"LEFT JOIN song s ON (a.id = s.artist_id) ".
				"Where s.id >0 " .
				"GROUP BY a.id"; 
	 
		$result = mysqli_query($this->connection, $sql);
        
        return $result;
  }
    
 /**
    * Function displays all list of songs from the database. 
    * Displays title of song, the artist name and duration of song in the format: mm:ss.
    * The list should be sorted by artist and song title in asceding order
    *
    * SELECT a.name, s.title, s.duration
	* FROM artist a 
	* JOIN song s ON (a.id = s.artist_id)
	* ORDER BY a.name, s.title ASC; 
	*
	*
    **/
    
   public function listSongs() {
		
		$sql = "SELECT a.name, s.title, s.duration ".
 				"FROM artist a ".
				"JOIN song s ON (a.id = s.artist_id) ".
				"ORDER BY a.name, s.title ASC "; 
	 
		$result = mysqli_query($this->connection, $sql);
        
        return $result;
  }
    
    /**
    * Function displays a Total of songs from the database. 
    *
    * SELECT a.name, s.title, s.duration
	* FROM artist a 
	* JOIN song s ON (a.id = s.artist_id)
	* ORDER BY a.name, s.title ASC; 
	*
	*
    **/
    
   public function totalSongs() {
		
		$sql = "SELECT Count(*) as SongTotal ".
 				"FROM song "; 
	 
		$result = mysqli_query($this->connection, $sql);
        
        return $result;
  } 
    
    
    /**
    * Function displays a Total of Active Artists from the database. 
    *
    * SELECT COUNT( DISTINCT a.id ) AS TotalArtists
	* FROM artist a
	* LEFT JOIN song s ON ( a.id = s.artist_id )
	*
	*
    **/
    
   public function totalactiveArtists() {
		
		$sql = "SELECT COUNT( DISTINCT a.id ) AS TotalArtists ".
 				"FROM artist a ".
 				"LEFT JOIN song s ON ( a.id = s.artist_id ) ".
 				"WHERE s.duration >0"; 
	 
		$result = mysqli_query($this->connection, $sql);
        
        return $result;
  } 
    
    
    
    /**
     * Function to convert a database result set to an array
     * @param mixed $resource MySQL query result object
     * @return array 2 dimensional array of results
     */
    function resourceToArray($resource) {
        
        // Set up an array to store items in
        $output_array = array();        
        
        // Loop through $resource, converting each record from the result set to an array which we assign to $row
        while ($row = mysqli_fetch_assoc($resource)) {
            
            // We can just add the $row array to our output array
            $output_array[] = $row;
        
        }
        
        return $output_array;
    
    }

}

?>

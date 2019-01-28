<?php
  /** Make sure that the WordPress bootstrap has run before continuing. */
  require( dirname(__FILE__) . '/../wp-load.php' );

		$DBcon = new MySQLi(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
             
             if ($DBcon->connect_errno) {
                 die("ERROR : -> ".$DBcon->connect_error);
             }
			 
			// Alterando os caminhos absolutos da URL do site			 
			$DBcon->query("UPDATE wp_options
								SET option_value = REPLACE(option_value,
								'" . $_GET['old_url'] . "', '" . $_GET['new_url'] . "')
								WHERE option_name = 'home'
								OR option_name = 'siteurl';");
			
			// Alterar GUID
			$DBcon->query("UPDATE wp_options
								SET guid = REPLACE (guid,
								'" . $_GET['old_url'] . "', '" . $_GET['new_url'] . "');");
			
			// Alterar URLs dentro dos conteúdos
			$DBcon->query("UPDATE wp_posts
								SET post_content = REPLACE (post_content,
								'" . $_GET['old_url'] . "', '" . $_GET['new_url'] . "');");			
			
			//Alterar GUID dos attachments
			$DBcon->query("UPDATE wp_posts
								SET guid = REPLACE (guid,
								'" . $_GET['old_url'] . "', '" . $_GET['new_url'] . "')
								WHERE post_type = 'attachment';");
			  
        $DBcon->close();
		
	echo "<h1>Looks like you're all set here!</h1>";
?>
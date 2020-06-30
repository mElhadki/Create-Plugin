<?php
/*
Plugin Name: Maria
Description: Juste une extension de wordpress Simple avec 2 sous menus : un pour les informations générale du plugin et un pour les settings.
Version: 1.0
Author: Mariem Elhadki
License: GPLv2 or later
Text Domain: Maria
*/
?>

<?php

add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
    
	 //parameters details
     //add_menu_page(page_title,menu_title,capability,menu_slug,function = '')
    //add_submenu_page(parent_slug,page_title,menu_title,capability,menu_slug,function):
	 //add_management_page($page_title, $menu_title, $capability,$menu_slug,$function);
	 //add a new setting page udner setting menu
     //add_management_page('Description', 'Description', 'manage_options',__FILE__,'Description_admin_page');
     //add new menu and its sub menu 
    
    add_menu_page('Description', 'Maria', 'manage_options','Description_page', 'Description_admin_page');
    add_submenu_page('Description_page', 'Page', 'Settings','manage_options', 'Settings', 'mt_settings_page');
   
    
}


function Description_admin_page () {
  require_once(ABSPATH . 'wp-config.php');
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($connection,DB_NAME);

  $sql= "SELECT * FROM Maria"; 
  $result = mysqli_query($connection, $sql);
    
  echo '<div class="wrap">
  <h1>Hello!</h1>
  <p>it is a plugin with two submenus. A page for the general description of my plugin.Configuration page an input text field, textarea for the description,
     an option list and a save button
  </p>
  <h1 style="margin-left:10px; margin-bottom:20px; color:Red;">List of information</h1>
  <table style="width:80%;"align="center" border="1";>
  <tr>
  <td style="height:50px; text-align:center;">Username</td>
  <td style="height:50px; text-align:center;">Description</td>
  <td style="height:50px; text-align:center;">Option</td>';
  foreach($result as $row){   
        
    ?>
    <tr>
        
        <td style="text-align:center;"><?php echo $row["username"] ;?></td>
        <td style="text-align:center;"><?php echo $row["descriptions"] ;?></td>
        <td style="text-align:center;"><?php echo $row["Options"] ;?></td>
    </tr>
 
    <?php
}
echo"
  </table>
</div>";
}

// mt_settings_page() displays the page content for the Test Settings submenu
function mt_settings_page() {
    echo "<h2>" . __( 'Settings Configurations', 'menu-test' ) . "</h2>";
	include_once('setting_page.php');
}

?>

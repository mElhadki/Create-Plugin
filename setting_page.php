
<?php



function wphw_opt(){
    
    require_once(ABSPATH . 'wp-config.php');
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($connection,DB_NAME);
    
    $sql = "CREATE TABLE Maria(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(255) NOT NULL, descriptions varchar(255) NOT NULL, Options varchar(255) NOT NULL)";
    $result = mysqli_query($connection, $sql);
    return $result;

}

function insert(){

    require_once(ABSPATH . 'wp-config.php');
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($connection,DB_NAME);
    
    $username= $_POST['username'];  
    $descriptions = $_POST['descriptions'];
    $Options= $_POST['Options'];

    if(empty($_POST['username']) || empty($_POST['descriptions']) || empty($_POST['Options'] ))
        
    {
        echo '<div id="message" class="error">
                <p>Content not added</p>
              </div>';
        exit();
         
    }
    else
    {
         $query="insert INTO Maria (username,descriptions,Options)". "VALUES ('$username', '$descriptions', '$Options')";
         $result=mysqli_query($connection,$query);
    }
}

if(isset($_POST['wphw_submit'])){
    wphw_opt();
    insert();
}

?>

<div class="wrap">
  <div id="icon-options-general" class="icon32"> <br>
  </div>
  <h2>Plugin Settings</h2>
  <?php if(isset($_POST['wphw_submit'])):?>
  <div id="message" class="updated below-h2">
    <p>Content added successfully</p>
  </div>
  <?php endif;?>
  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Enter all the informations and click on save button.</strong></h3>
      <form method="post" action="">
      <table class="form-table">
          <tr>
            <th scope="row"></th>
            <td><input type="text" name="username" value="" style="width:350px;" placeholder="Username" /></td>
          </tr>

          <tr>
            <th scope="row"></th>
            <td><textarea name="descriptions" value="" style="width:350px;" placeholder="Description"></textarea></td>
          </tr>

          <tr>
            <th scope="row"></th>
            <td><select name="Options" style="width:350px;">
                <option value="">--Select--</option>
                <option name="OptionA" value="OptionA">Option A</option>
                <option name="OptionB" value="OptionB">Option B</option>
           </td>
          </tr>
          
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;padding-bottom:10px;">
<input type="submit" name="wphw_submit" value="Save" class="button-primary" style="width:10%;" />
</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

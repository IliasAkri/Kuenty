<?php
$url="http://".$_SERVER['HTTP_HOST']."/tfg";
$messageConexion = MySQLi_connect(
    "localhost", //Server host name
    "root", //Database username
    "", //Database password
    "Instagram" //Database name 
);
if (MySQLi_connect_errno()) {
    echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}

if (isset($_POST['search'])) {
       $Name = $_POST['search'];
       $Query = "SELECT * FROM users WHERE userName LIKE '%$Name%' LIMIT 5";
       $ExecQuery = MySQLi_query($messageConexion, $Query);
       echo '<ul>';
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
           ?>
       <li onclick='fill("<?php echo $Result['userName']; ?>")'>
       <form action="<?php echo $url;?>/front-end/pages/usersPage.php" method="post">
            <input type="hidden" value="<?php echo $Result['idUser']; ?>" name="user_id" id="user_id">
            <input type="submit" value="@<?php echo $Result['userName']; ?>">
        </form>
        </li>
       <?php
    }}
    ?>
    </ul>
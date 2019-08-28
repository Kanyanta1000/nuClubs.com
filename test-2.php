
<?PHP

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$obj = new main_class;

$img = $_FILES["pic"]["name"];

$table = "club";
$columns = "(logo)";
$values = "('$img')";
$obj->insert($table, $columns, $values);

$obj->upload();
?>
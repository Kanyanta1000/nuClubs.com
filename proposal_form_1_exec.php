<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$proposal_form = new main_class;

//retrieving form variables from proposal_form1.html
$club_name = $_POST["club_name"];
$club_description = $_POST["club_description"];
$club_head = $_POST["club_head"];
$funding = $_POST["funding"];
$other_items = $_POST["other_items"];

//storing completed proposal in database and redirecting
$table = "proposal";
$columns = "(club_name, club_description, club_head, funding, other_items)";
$values = "('$club_name','$club_description','$club_head', '$funding', '$other_items')";

$proposal_form->insert($table,$columns,$values);

//Getting the primary to pass to proposal_form_2.php
$columns = "proposal_id";
$condition = "club_name = \"$club_name\"";
$query_result = $proposal_form->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
$proposal_id = $result['proposal_id'];
redirect_func($proposal_id);

?>

<?php function redirect_func($proposal_id){ ?>
<script type="text/javascript" language="javascript">
var proposal_id = ('<?php echo $proposal_id; ?>');
window.location = "proposal_form_2.php?proposal_id="+proposal_id;
</script>
<?php } ?>
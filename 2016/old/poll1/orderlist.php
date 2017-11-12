<title> T-Shirt Orders</title>
<style type='text/css'>
.table {
	border:1px solid #555;
}
.table td {
	padding:5px;
	border-right:1px solid #555;
	border-bottom:1px solid #555;
}
.table tr {
	border-bottom:1px solid #555;
}
</style>
<?php 
	function getAllOrders() {
		$sql = "SELECT * FROM `order` ORDER BY hostel";
		$result = DatabaseHandler::GetAll($sql); 
		return $result;
	}
	
	function getTotalOrders() {
		$sql = "SELECT sum(quantity) FROM `order` WHERE 1";
                $result = DatabaseHandler::GetAll($sql);
                return $result[0]['sum(quantity)'];

	}	

	function getTypeOrders ($type) {
		$sql = "SELECT sum(quantity) FROM `order` WHERE tshirt_type = :type";
		$params = array(':type' => $type);
		$result = DatabaseHandler::GetAll($sql, $params);
		
		return $result[0]['sum(quantity)'];
	}
	
	function getSizeOrders($type, $size) {
		 $sql = "SELECT sum(quantity) FROM `order` WHERE tshirt_type = :type AND size=:size";
                $params = array(':type' => $type, ':size' => $size);
                $result = DatabaseHandler::GetAll($sql, $params);

                return $result[0]['sum(quantity)'];

	}

?>
<?php 
	require_once("include/config.php");
	require_once("business/database_handler.php");
	
	$orders = getAllOrders();
	$a = getTypeOrders('a'); $as =  getSizeOrders('a', 's'); $am = getSizeOrders('a', 'm'); $al = getSizeOrders('a', 'l'); $axl = getSizeOrders('a', 'xl'); $axxl = getSizeOrders('a', 'xxl');
	$b = getTypeOrders('b');  $bs =  getSizeOrders('b', 's'); $bm = getSizeOrders('b', 'm'); $bl = getSizeOrders('b', 'l'); $bxl = getSizeOrders('b', 'xl');$bxxl = getSizeOrders('b', 'xxl');
	$c = getTypeOrders('c');$cs =  getSizeOrders('c', 's'); $cm = getSizeOrders('c', 'm'); $cl = getSizeOrders('c', 'l'); $cxl = getSizeOrders('c', 'xl');$cxxl = getSizeOrders('c', 'xxl');
	$tot = getTotalOrders();
	 echo "Total Orders = {$tot}"; 
	echo " <br/>Type A = {$a} | Small = {$as} |  Large = {$al} |  Medium = {$am}  | Xtra Large = {$axl} | Xtra Xtra Large = {$axxl}" ;
	echo " <br/>Type B = {$b} | Small = {$bs} |  Large = {$bl} |  Medium = {$bm}  | Xtra Large = {$bxl} | Xtra Xtra Large = {$bxxl}" ;
	echo " <br/>Type C = {$c} | Small = {$cs} |  Large = {$cl} |  Medium = {$cm}  | Xtra Large = {$cxl} | Xtra Xtra Large = {$cxxl}" ;
	 echo "<table class='table'>";
	 echo "<tr><td>User Id</td><td>Quantity</td><td>Size </td> <td>TShirt Type </td><td>Gender</td><td>Hostel</td><td>Contact</td><td>Added On</td><hr/></tr>";
	for($i = 0; $i < count($orders); $i++) {
		echo "<tr>";
		echo "<td> {$orders[$ic]['userid']}"; 
		echo "</td>";
		echo "<td>{$orders[$i]['quantity']}"; 
		echo "</td>";
		echo "<td>{$orders[$i]['size']}";
		echo "</td>";
		echo "<td>{$orders[$i]['tshirt_type']}";
		echo "</td>";
		echo "<td>{$orders[$i]['gender']}";
		echo "</td>";
		echo "<td>{$orders[$i]['hostel']}";
		echo "</td>";
		echo "<td>{$orders[$i]['contact']}";
		echo "</td>";
		echo "<td>{$orders[$i]['added_on']}";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

?>

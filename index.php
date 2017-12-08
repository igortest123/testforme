<?php
require './mysql.php';
print("www-host: " . $a_host . "<BR><HR>");
$link = mysqli_connect( $mysql_host , $mysql_user , $mysql_pass , $mysql_db );
if (!mysqli_set_charset($link, "utf8")) {
	    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
	            exit();}

if ($link == false){
	    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {

	$sql = 'SELECT * FROM phonelist';

	$result = mysqli_query($link, $sql);

	if ($result == false) {

		        print("Произошла ошибка при выполнении запроса");
			    }
	else {

?>
<TABLE BORDER=1 >
<TR>
<TH>N</TH>
<TH>Имя</TH>
<TH>Фамилия</TH>
<TH>Телефон</TH>
</TR>
<?php

		             while ($row = mysqli_fetch_array($result)) {
				         print("<TR><TD>" . $row['contact_id'] . "</TD><TD>" . $row['first_name'] ."</TD><TD>" . $row['last_name'] ."</TD><TD>" . $row['phone'] . "</TD></TR>");
			     }
	    }
}
?>
</TABLE>




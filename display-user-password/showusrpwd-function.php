<?php 
function getUsrPwd($username, $mysqli) { 
    if ($stmt = $mysqli->prepare("SELECT value 
			FROM radcheck
			WHERE attribute =  'Cleartext-Password'
			AND username = ?
			LIMIT 1")) {
        $stmt->bind_param('s', $username); 
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($pwd);
        $res = $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
			return $pwd;
		} else {
			return 'no';
		}
	}
}



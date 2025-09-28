<?php
// create connection
include 'connect.php';

// Read all records
$sql = "SELECT * FROM USERS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<a href='form_login.php'>Sign In</a><br><br>";
    
    // Table format
    echo "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Full Name</th>
            <th>Registrasi Date</th>
            <th>Action</th>
        </tr>";

    $no = 1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . $no++ . "</td>
            <td>" . $row["username"] . "</td>
            <td>" . $row["password"] . "</td>
            <td>" . $row["fullname"] . "</td>
            <td>" . $row["reg_date"] . "</td>
            <td>
                <a href='form_edit_account.php?id=" . $row["id"] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure to delete this record?')\">Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results - Table is empty";
}

// Close connection
$conn->close();
?>

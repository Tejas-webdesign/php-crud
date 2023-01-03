<?php 

include "connect.php";

$sql = "SELECT * FROM register";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

</head>

<body>
    <link rel="stylesheet" href="style.css">
    <div class="container">

        <h2>users</h2>

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>First Name</th>

                    <th>Last Name</th>

                    <th>Email</th>

                    <th>City</th>

                    <th>Image</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['firstname']; ?></td>

                    <td><?php echo $row['lastname']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['city']; ?></td>

                    <td><?php echo $row['image']; ?></td>

                    <td><a class="btn-edit" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a
                            class="btn-delete" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                </tr>

                <?php       }

            }

        ?>

            </tbody>

        </table>

    </div>

</body>

</html>
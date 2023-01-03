<?php 

include "connect.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $city = $_POST['city'];

        $image = $_POST['image']; 

        $sql = "UPDATE `register` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`city`='$city',`image`='$image' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `register` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];

            $first_name = $row['firstname'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $password  = $row['city'];

            $gender = $row['image'];

        } 

    ?>
<html>

<body>
    <style>
        input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid black;
        }

        select {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 1px;
            background-color: #f1f1f1;
        }

        input[type="submit"] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid black;
            background-color: darkgreen;
        }
    </style>
    <form action="" method="post">
        <h1>User Update Form</h1>

        <table>
            <tr>
                <td>
                    First name

                    <input type="text" name="firstname" value="<?php echo $first_name; ?>">

                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Last name

                    <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Email

                    <input type="text" name="email" value="<?php echo $email; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    City

                    <select name="city">
                        <option value="">Select</option>
                        <option value="kanpur">kanpur</option>
                        <option value="lucknow">lucknow</option>
                        <option value="pune">pune</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    Image

                    <input type="file" name="image" value="<?php echo $image; ?> ">
                </td>
            </tr>

            <tr>
                <td>
                <input type="submit" value="Update" name="update">
                </td>
            </tr>

        </table>

    </form>

</body>

</html>

<?php

    } else{ 

        header('Location: view.php');

    } 

}

?>
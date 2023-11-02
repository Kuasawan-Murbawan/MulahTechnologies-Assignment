<?php
include 'db_connection.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Table Output & Processing</title>
    <link rel='stylesheet' href='styles.css'>
</head>

<body>



<div id="tables-container">

        <div id="table1-container">
        <h1>Table 1</h1>
        <table>

            <tr>
                <th>Index</th>
                <th>Value</th>
            <tr>

            <?php

                $sql = "SELECT * FROM table1";  // select all elements in the table1
                $result = mysqli_query($conn, $sql); // compile the connection
                $resultCheck = mysqli_num_rows($result); 

                if($resultCheck>0){
                    while($row = mysqli_fetch_assoc($result)){  // fetch the result and display in a table
                        echo "<tr>";
                        echo "<td>" . $row['Index_'] . "</td>";
                        echo "<td>" . $row['Value_'] . "</td>";
                        echo "</tr>";
                    }
                }else{
                    echo "Result not found.";
                }

            ?>

        </table>
        </div>


            <div id="table2-container">
            <h1>Table 2</h1>
                <?php

                    // create a function to get value of each index

                    function getValue($conn, $index){ // user need to pass the connection and the index
                        $sql = "SELECT Value_ FROM table1 WHERE Index_ = '$index'";
                        $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        if ($row) {
                            return $row['Value_'];
                        } else {
                            return "Index not found";
                        }
                    } else {
                        return "Query error: " . mysqli_error($conn);
                    }
                    }
                ?>

                <table>

                <tr>
                    <th>Category</th>
                    <th>Value</th>
                </tr>

                <tr id="alpha-row">
                    <td>Alpha</td>
                    <td>
                        <?php
                            echo getValue($conn,'A5')+getValue($conn,'A20');
                        ?>
                    </td>
                </tr>

                <tr id="beta-row">
                    <td>Beta</td>
                    <td>
                        <?php
                            echo getValue($conn,'A15')/getValue($conn,'A7');
                        ?>
                    </td>
                </tr>

                <tr id="charlie-row">
                    <td>Charlie</td>
                    <td>
                        <?php
                            echo getValue($conn,'A13')*getValue($conn,'A12');
                        ?>
                    </td>
                </tr>

                </table>
            </div>
</div>

</body>

</html>


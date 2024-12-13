<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST["data"];
    $query = "SELECT * FROM members WHERE name LIKE '%$keyword%'";
    $res = mysqli_query($con, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row["id"];
        $name = $row["name"];
        
        $author = strlen($name) > 14 ? substr($name, 0, 15) . ".." : $name . "....";
        $email = isset($row["email"]) ? (strlen($row["email"]) > 14 ? substr($row["email"], 0, 15) . ".." : $row["email"] . "....") : "N/A";
        $phone = isset($row["phone"]) ? $row["phone"] : "N/A";
        $src = isset($row["profile"]) && !empty($row["profile"]) ? 'backend/uploads/' . $row["profile"] : 'backend/uploads/default.png'; // Fallback to default image

        // Visibility based on admin and user
        $display = "none";
        if (isset($_COOKIE["user_data"]) && json_decode($_COOKIE["user_data"])[3] === "admin") {
            $display = "inline";
        }

        // Send response to the frontend as HTML
        echo '
        <div class="box pb-2 mx-1 my-2" id="' . $id . '"> 
            <br />
            <div class="bookImg">
                <img src="' . htmlspecialchars($src) . '" class="img-fluid" />
            </div>
            <div class="body">
                <h5 class="mx-3 my-2"><b>' . htmlspecialchars($name) . '</b></h5>
                <span class="mx-3">Email: <font id="value">' . htmlspecialchars($email) . '</font></span>
                <span class="mx-3">Phone: <font id="value">' . htmlspecialchars($phone) . '</font></span>
            </div>
            <div class="d-flex justify-content-around footer">
                <div 
                    id="card_id' . $id . '" 
                    class="edit_cont px-2 d-' . $display . '"
                    onclick="edit(' . $id . ', event)">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                </div>
                <div class="edit_cont px-2 d-' . $display . '" onclick="Delete(' . $id . ')">
                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                </div>
                <div
                    class="edit_cont px-2 d-' . (isset($_COOKIE["user_data"]) && json_decode($_COOKIE["user_data"])[3] === 'admin' ? 'none' : 'inline') . '">
                    <i class="fa fa-rocket" aria-hidden="true"></i> Issue
                </div>
                <div class="edit_cont px-2 d-' . (isset($_COOKIE["user_data"]) && json_decode($_COOKIE["user_data"])[3] === 'admin' ? 'none' : 'inline') . '">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Details
                </div>
            </div>
        </div>
        ';
    }
}
?>

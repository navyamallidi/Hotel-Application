<?php include 'dbconnect.php' ?>

<style>
    .boxs {
        width: 100%;
        border: 1px solid gray;
        margin-bottom: 10px;
        padding: 10px;
        background-color: gainsboro;
    }
    .flexx {
        display: flex;
        align-items: center;
    }
    .img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    .text {
        margin-left: 5px;
        margin-top: -8px;
    }
    .rating {
        background-color: greenyellow;
        padding-top: 5px;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 5px;
        margin-left: auto; 
        border: 1px solid gainsboro;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .thick-hr {
        border: 0;
        height: 2px; 
        background: gray; 
    }
    .rev{
        font-size: 15px;
        font-weight: 200;
        margin-top: -5px;
        margin-left: 20px;
    }
</style>


<?php
$query = "SELECT * FROM reviews";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="boxs">';
        echo '<div class="flexx">';
        echo '<img src="./assets/profile.jpg" class="img"/>';
        echo '<div class="text">';
        echo $row["name"];
        echo '</div>';
        echo '<div class="rating">';
        echo $row["star"].'/10';
        echo '</div>';
        echo '</div>';
        // echo '<div class="date">';
        // echo $row["date"];
        // echo '</div>';
        echo '<hr class="thick-hr">';
        echo '<div class="rev">';
        echo $row["review"];
        echo '</div>';
        echo '</div>';
    } 
} else {
    echo "No Reviews found.";
}
?>

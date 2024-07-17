<?php include 'dbconnect.php' ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .box{
            border: 1px solid #ccc;
            padding: 20px 10px 10px 10px;
            margin-left: 8%;
            margin-top: 20px;
            border-radius: 8px;
            width: 60%;
            box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        .room-box {
            display: flex;
            flex-direction: row;
        }
        .image {
            margin: 0px 25px 15px 10px;
            padding: 10px;
        }
        .roomname{
            font-size: 27px;
            font-weight: 500;
        }
        .type{
            font-size: medium;
            font-weight: 100;
            padding-top:3px ;
            color: #565150;
        }
        .data{
            margin-top: 20px;
            font-size: medium;
            font-weight: 100;
            width: 400px;
        }
        .price{
            background-color: #F4EDEC;
            height: 100px;
            border-radius: 5%;
            width: 200px;
            margin-left: 50px;
        }
        .pricerange{
            padding-left: 10px;
        }
        /* Popup container - can be anything you want */
        .popup {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Popup content */
        .popup-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 600px; /* Max width */
            text-align: center; /* Center text */
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .popup img {
            max-width: 100%;
            height: auto;
        }
        .viewbutton {
            font-size:18px; 
            font-weight:100;
            background-color: #888;
            margin-left: 10px;
            border-radius: 10%;
            cursor: pointer;
        }
        .details{
            margin-top: 10px;
            display: flex;
            margin-bottom: 10px;
        }
        .room{
            margin-left: 150px;
            border: 2px dotted #ccc;
            padding-left:10px;
            padding-right: 10px;
        }
        .pricemain{
            margin-left: 50px;
            font-size: 20px;
        }
    </style>
    <script>
        function viewMore(name, bedType, capacity, price, imageUrl) {
            document.getElementById("popup-name").innerText = name;
            document.getElementById("popup-bedType").innerText = "Bed Type: " + bedType;
            document.getElementById("popup-capacity").innerText = "Max Room Capacity: " + capacity;
            document.getElementById("popup-price").innerText = "Price: Rs " + price;
            document.getElementById("popup-image").src = imageUrl;
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>
</head>
<body>
<div>
    <?php
    $query = "SELECT * FROM room";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="box">';
            echo '<div class="room-box">';
            echo '<div class="image">' ;
            echo '<img src="./assets/image.png" style="height:180px; width:250px" />';
            echo '</div>';
            echo '<div>' ;
            echo '<div class="roomname">';
            echo $row["name"];
            echo '</div>';
            echo '<div class="type">';
            echo 'Bed Type: ' .$row["bedType"];
            echo '</div>';
            echo '<div class="type">';
            echo 'Max Room Capacity: ' .$row["capacity"];
            echo '</div>';
            echo '<div class="data">';
            echo 'Housekeeping - daily,Washer,
            Extra Pillows and Blankets,
            Temperature check,
            Infectious Disease Precaution,
            Sanitizers,
            Mask,Closet,Fan,Shower,Wi-Fi';
            echo '</div>';
            echo '</div>';
            echo '<div class="price">';
            echo '<div class="pricerange">';
            echo 'Rs: ' .$row["price"];
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div>' ;
            echo '<img src="./assets/image.png" style="height:50px; width:50px;border-radius: 20%; margin-right:10px" />';
            echo '<span class="viewbutton" onclick="viewMore(\'' . $row["name"] . '\', \'' . $row["bedType"] . '\', \'' . $row["capacity"] . '\', \'' . $row["price"] . '\', \'./assets/image.png\')">View More</span>';
            echo '</div>';
            echo '<hr>';
            echo '<div class=details>';
            echo '<div style="font-size:20px;  margin-left:20px">';
            echo 'Room Only';
            echo '</div>';
            echo '<div class="room">';
            echo '<div style="font-size:20px" margin-bottom:10px>';
            echo 'Room | Guests';
            echo '</div>';
            echo '<div style="color:orange; font-weight:400; font-size:12px">';
            echo '1 room ' .$row["capacity"].' Adults 0 kids';
            echo '</div>';
            echo '</div>';
            echo '<div class="pricemain">';
            echo 'Rs ' .$row["price"];
            echo '<div style="font-weight:100">';
            echo 'Excluding Taxes';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No rooms found.";
    }
    ?>
</div>

<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2 id="popup-name">Details</h2>
        <img id="popup-image" src="" alt="Image description">
        <p id="popup-bedType"></p>
        <p id="popup-capacity"></p>
        <p id="popup-price"></p>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More Example</title>
    <style>

        .popup {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }


        .popup-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            text-align: center; 
        }


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
    </style>
    <script>
        function viewMore() {
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>
</head>
<body>
    <?php
    echo '<span style="font-size:20px; font-weight:100; padding-left:10px; cursor:pointer;" onclick="viewMore()">View More</span>';
    ?>

    <!-- The Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Details</h2>
            <img src="your-image-url.jpg" alt="Image description">
            <p>Here are the details about the image or content you want to show.</p>
        </div>
    </div>
</body>
</html>

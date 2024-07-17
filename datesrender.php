<?php include 'dbconnect.php'; ?>
<?php
$query = "SELECT * FROM lowestprice";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $dates = [];
    $prices = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[] = $row['date'];
        $prices[] = $row['lowprice'];
    }
} else {
    echo "No Rooms found.";
}
?>

<style>
    .cal {
        width: 70%;
        border: 2px solid gainsboro;
        margin-left: 15%;
        align-items: center;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .date-picker {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .arrow {
        cursor: pointer;
        font-size: 24px;
        border: 1px solid gray;
        padding: 0 10px;
        background-color: orange;
        color: white;
    }

    .dates {
        display: flex;
        justify-content: space-around;
        flex-grow: 1;
        border: 1px solid gainsboro;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .date {
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
        flex: 1;
        border: 1px solid gainsboro;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
        white-space: nowrap; /* Prevents line breaks */
    }

    .selected {
        background-color: orange;
        color: white;
        border: 1px solid gainsboro;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .date span {
        display: block;
    }
</style>

<div class="cal">
    <div class="date-picker">
        <div class="arrow" id="prev">&lt;</div>
        <div class="dates" id="dates"></div>
        <div class="arrow" id="next">&gt;</div>
    </div>
</div>

<script>
    const dates = <?php echo json_encode($dates); ?>;
    const prices = <?php echo json_encode($prices); ?>;
    const datesContainer = document.getElementById('dates');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');

    let currentIndex = 0;

    function renderDates() {
        datesContainer.innerHTML = '';
        for (let i = currentIndex; i < currentIndex + 8 && i < dates.length; i++) {
            const dateDiv = document.createElement('div');
            dateDiv.className = 'date';
            if (i === currentIndex) dateDiv.classList.add('selected');
            dateDiv.innerHTML = `<span>${dates[i]}</span><span>From</span><span>${prices[i]}</span>`;
            datesContainer.appendChild(dateDiv);
        }
    }

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex -= 1;
            renderDates();
        }
    });

    nextButton.addEventListener('click', () => {
        if (currentIndex < dates.length - 8) {
            currentIndex += 1;
            renderDates();
        }
    });

    renderDates();
</script>

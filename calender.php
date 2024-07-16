<div class="container" 
     style="display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
            border: 2px solid gray ;
            width: 70%;
            height: 100px;">
    <div class="date-picker" 
         style="display: flex;
                align-items: center;
                gap: 10px;">
        <div style="display: flex; 
                    flex-direction:column">
            <label for="checkin" style="font-weight: bold;">Check In</label>
            <input type="text" id="checkin" readonly 
                   style="padding: 10px;
                          border: 1px solid #ccc;
                          border-radius: 5px;
                          cursor: pointer;">
        </div>


        <div style="display: flex; flex-direction:column">
            <label for="checkout" style="font-weight: bold;">Check Out</label>
            <input type="text" id="checkout" readonly 
                   style="padding: 10px;
                          border: 1px solid #ccc;
                          border-radius: 5px;
                          cursor: pointer;">
        </div>


        <button id="checkAvailability" 
              style="padding: 10px 20px; 
                     background-color: orange;
                     border: none;
                     border-radius: 5px;
                     color: white;
                     cursor: pointer;">CHECK AVAILABILITY</button>
    </div>

    
    <div class="calendar" 
         style="display: none;
                margin-top: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;" id="calendar">
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkinInput = document.getElementById('checkin');
        const checkoutInput = document.getElementById('checkout');
        const calendar = document.getElementById('calendar');
        const checkAvailabilityButton = document.getElementById('checkAvailability');
        let currentInput;

        checkinInput.addEventListener('click', () => {
            currentInput = checkinInput;
            showCalendar();
        });

        checkoutInput.addEventListener('click', () => {
            currentInput = checkoutInput;
            showCalendar();
        });

        checkAvailabilityButton.addEventListener('click', () => {
            alert(`Checking availability for ${checkinInput.value} to ${checkoutInput.value}`);
        });

        function showCalendar() {
            calendar.style.display = 'block';
            calendar.innerHTML = generateCalendarHTML(new Date());
        }

        function generateCalendarHTML(date) {
            const month = date.getMonth();
            const year = date.getFullYear();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            let html = '<table>';
            html += '<tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>';
            html += '<tr>';

            for (let i = 0; i < firstDay; i++) {
                html += '<td></td>';
            }

            for (let day = 1; day <= daysInMonth; day++) {
                if ((day + firstDay - 1) % 7 === 0) {
                    html += '</tr><tr>';
                }
                html += `<td data-date="${year}-${month + 1}-${day}">${day}</td>`;
            }

            html += '</tr></table>';
            return html;
        }

        calendar.addEventListener('click', (e) => {
            if (e.target.tagName === 'TD' && e.target.dataset.date) {
                currentInput.value = formatDateString(new Date(e.target.dataset.date));
                calendar.style.display = 'none';
            }
        });

        function formatDateString(date) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return date.toLocaleDateString('en-GB', options);
        }
    });
</script>
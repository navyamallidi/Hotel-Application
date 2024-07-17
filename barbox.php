    <style>
        .nav-tabs .nav-link {
            border: none;
            color: #333;
            font-weight: bold;
        }

        .nav-tabs .nav-link.active {
            border: none;
            color: #FFA500;
            border-top: 3px solid #FFA500;
            border-left: 1px solid gray;
            border-right: 1px solid gray;
            border-bottom: none;
        }
        .nav-item{
            padding-left: 100px;
        }

        .tab-content {
            border: 1px solid #ddd;
            padding: 20px;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .tab-content h2, .tab-content h4 {
            margin-top: 0;
        }

        .tab-content ul {
            list-style: none;
            padding-left: 1rem;
        }

        .tab-content ul li {
            position: relative;
            margin-bottom: 10px;
        }

        .tab-content ul li::before {
            content: '•';
            position: absolute;
            left: -1rem;
            color: #333;
        }
    </style>
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="policies-tab" data-toggle="tab" href="#policies" role="tab" aria-controls="policies" aria-selected="false">Policies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">Add-On Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <?php include 'about.php' ?>
            </div>
            <div class="tab-pane fade" id="policies" role="tabpanel" aria-labelledby="policies-tab">
                <h2>Policies</h2>
                <h4>Cancellation Policy</h4>
                <ul>
                    <li>For cancellation done prior to 9 AM on the check-in date, 100% Refundable.</li>
                    <li>For cancellation done post 9 AM on the check-in date, Non-Refundable.</li>
                </ul>
                <h4>Child Policy</h4>
                <ul>
                    <li>Children (below 5 years of age) are not chargeable.</li>
                </ul>
                <h4>Terms and conditions</h4>
                <ul>
                    <li>21 Years above couples are only welcome.</li>
                    <li>Please check the travel advisory issued by the concerned state government/local authorities before booking, as some places may have COVID-19 related travel/lodging restrictions.</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.0687175260427!2d77.54718117424336!3d8.094475102918326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b04ed383ef06551%3A0x5a6d044472e836a9!2sHotel%20Jeyam!5e0!3m2!1sen!2sin!4v1721214879695!5m2!1sen!2sin" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <div class="text-center font-weight-100">No services available at this time</div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <?php include 'reviews.php'?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
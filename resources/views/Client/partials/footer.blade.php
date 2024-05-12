<footer class="footer-section">
    <div class="container">
        <?php
        $gyms = DB::select('select * from gym');
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-option">
                    <span>Email</span>
                    @foreach ($gyms as $gym)
                        <p>{{ $gym->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-option">
                    <span>Phone</span>
                    @foreach ($gyms as $gym)
                        <p>{{ $gym->phone }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-option">
                    <span>Address</span>
                    <@foreach ($gyms as $gym)
                        <p>{{ $gym->address }}</p>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="copyright-text">
            <ul>
                <li><a href="#">Term&Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p>&copy;
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </p>
        </div>
    </div>
</footer>

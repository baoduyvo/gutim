<header class="header-section">
    <div class="container">
        <div class="logo">
            <a href="{{ url('') }}">
                <img src="{{ asset('client/img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    <li class="active"><a href="{{ url('') }}">Home</a></li>
                    <li><a href="{{ url('service') }}">Service</a></li>
                    <li>
                        <?php
                        $gyms = DB::select('select * from gym');
                        ?>

                        <div style="z-index: 99;">
                            <button class="drop" style="background: transparent; color: white; border: none"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="">Gym&nbsp;</a>
                                <i class="right fas fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" style="background: transparent; border: none;">
                                <?php foreach ($gyms as $gym) { ?>
                                <a class="dropdown-item"
                                    href="{{ route('client.gym.show', $gym->id) }}"><?= $gym->name ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ url('aboutus') }}">About</a></li>
                    <li><a href="{{ url('contact') }}">Contacts</a></li>

                </ul>
            </nav>
            <a href="{{ Session::has('id') ? route('client.login.logout') : url('login') }}"
                class="primary-btn signup-btn">
                {{ Session::has('id') ? 'Logout' : 'Login' }}
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('client/img/breadcrumb/classes-breadcrumb.jpg') }}"
    style="background-image: url(&quot;{{ asset('client/img/breadcrumb/classes-breadcrumb.jpg') }}&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>@yield('title')</h2>
                    <div class="breadcrumb-option">
                        <a href="{{ url('') }}"><i class="fa fa-home"></i> Home</a>
                        <span>@yield('title')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

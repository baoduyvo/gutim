@extends('client.master')

@section('title', 'Exercise')

@section('content')
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-text">
                        <div class="bd-title">
                            <p>Your clients would like to see optimal results for minimal work. For this reason, it can
                                be difficult to convince them that a website redesign enhances SEO strategies. However,
                                if you try to redesign a site without taking SEO into account, you are going to face
                                bigger problems down the road.</p>
                            <p>Start off by explaining to clients what will happen if you ignore SEO in your redesign.
                                Explain to them how a website redesign enhances SEO strategies across the board. A
                                redesign is essential and should be part of your client’s budget. There are a couple of
                                risks to point out.</p>
                        </div>
                        <div class="bd-pic">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ asset('client/img/blog/bd-1.jpg') }}" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('client/img/blog/bd-2.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="bd-more-text">
                            <div class="bm-item">
                                <h4>1. You May Have to Redo All Your Content</h4>
                                <p>It is impossible to create effective content without taking SEO into consideration.
                                    If you create content without thinking about SEO, you may need to go back and redo
                                    all the new content you made for your website when you start your SEO strategy.
                                    There are a few reasons for this.</p>
                                <p>First, you’ll be unsure as to what keyword terms you want to rank for. If you write
                                    content that doesn’t include appropriate keywords, it will be difficult to go back
                                    and include the terms naturally. Second, you may be unclear as to who makes up your
                                    target audience. The content you write for the wrong audience is useless and will
                                    need replacing.</p>
                            </div>
                            <div class="bm-item">
                                <h4>2. You May Have Technical Mistakes</h4>
                                <p>Technical mistakes may mean you require a site migration in the near future. This is
                                    a huge waste of time. Taking the technical side of SEO into account now will allow
                                    you to decide on</p>
                            </div>
                        </div>
                        <div class="bd-quote">
                            <samp>"</samp>
                            <p>“We need to stop interrupting what people are interested in and be what people are
                                interested in.”</p>
                            <div class="quote-author">
                                <h5>Steven Jobs</h5>
                                <span>CEO-DeerCreative</span>
                            </div>
                        </div>
                        <div class="bd-last-para">
                            <p>All the above assumes that a client is willing to create a website in the first place.
                                Some clients may believe that they can forgo a website entirely. However, without a
                                website, it is impossible for a business to grow. You need to explain why having an
                                SEO-optimized website is necessary for being found online. Of course, businesses can
                                find customers using other means, such as through social media, but these methods are
                                slower. Plus, users will still expect the business to have a website — to obtain more
                                information about products, services, and the brand as a whole.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

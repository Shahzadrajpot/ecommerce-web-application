<x-header />
<!-- Header Section End -->


<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="section-title">

                    <h2>Login account</h2>
                </div>
                <div class="contact__form">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }}</p>

                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            <p>{{ session()->get('error') }}</p>

                        </div>
                    @endif

                    <form action="{{ URL::to('loginUser') }}" method="post" enctype="multipart/from-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="password" name="password" required>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="login" placeholder="Enter Password"  class="site-btn">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Footer Section Begin -->
<x-footer />

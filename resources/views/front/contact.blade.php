@extends('front.layout.master')

@section('title', 'Contact')

@section('body') 

{{-- Điều hướng --}}
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end điều hướng --}}

{{-- Content --}}
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.835018837071!2d105.73446418398316!3d21.034336266831982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455169aede361%3A0x6c3731f914aa17bc!2sSEVENZSTORE!5e0!3m2!1sen!2s!4v1721304928004!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>  
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contact Us</h4>
                        <p>Hello word !</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon"><i class="ti-location-pin"></i></div>
                            <div class="ci-text">
                                <span>Address: </span>
                                <p>Trinh Van Bo . Ha Noi</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon"><i class="ti-mobile"></i></div>
                            <div class="ci-text">
                                <span>Phone: </span>
                                <p>+84.353.754.546</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon"><i class="ti-email"></i></div>
                            <div class="ci-text">
                                <span>Email: </span>
                                <p>tuyencon2k4@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>    
                            <p>Our staff will call back later and answer your question</p>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your Message"></textarea>
                                        <button type="submit" class="site-btn">Sen Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>    
                </div> 
            </div>    
        </div>    
    </section>  
{{-- end Content --}}

@endsection
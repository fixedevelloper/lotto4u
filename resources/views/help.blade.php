@extends('layout')
@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="content-page wide-sm m-auto">
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            <div class="nk-block-head-sub"><span>FAQs</span></div>
                            <h2 class="nk-block-title fw-normal">Foires Aux Questions</h2>
                            <div class="nk-block-des">
                                <p class="lead">Vous avez une question ? Vous ne trouvez pas la réponse que vous cherchez ? Ne vous inquiétez pas, écrivez-nous sur notre <a href="{{route('contact')}}">contact page</a>.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div id="faqs" class="accordion">
                            <div class="accordion-item">
                                <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#faq-q1">
                                    <h6 class="title">Qui sommes nous {{env('app_name')}}?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse show" id="faq-q1" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        Ut varius iaculis diam, nec cursus odio sagittis a. Suspendisse facilisis, dolor vitae semper hendrerit, nibh lacus semper odio, quis fermentum lacus nibh eget neque. Curabitur suscipit, lectus non tincidunt dapibus, ex lectus finibus felis, at efficitur odio turpis sed metus. Vestibulum tempus dui a porttitor ultricies. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam at tempor leo. Etiam lorem orci, molestie eget volutpat a, placerat eu felis. Curabitur dapibus augue sit amet libero sagittis, eget lacinia tortor sollicitudin.

                                        Proin vel orci dolor. Praesent nec velit mattis, luctus magna sed, consectetur est. Sed consectetur felis vel felis condimentum hendrerit. In nunc lectus, imperdiet faucibus vehicula eu, varius molestie lorem. Praesent viverra lacus ullamcorper augue vestibulum, ut pharetra ex facilisis. Ut dictum ultricies pulvinar. Quisque non aliquam mi, ac pretium felis. In tincidunt tortor ac lacus malesuada, a tempus tellus suscipit. Fusce sit amet nibh sit amet mauris varius facilisis in non felis. Ut eget risus in risus elementum maximus.
                                        Vivamus orci quam, lobortis vulputate rhoncus volutpat, euismod vel ex. Donec id elementum arcu, vitae mattis ante. </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#faq-q2">
                                    <h6 class="title">Comment Jouer?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q2" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>If your <strong>end product</strong> including the item is going to be free to the end user then a <strong>Regular License</strong> is what you need. An <strong>Extended License</strong> is required if the <strong>end user</strong> must pay to use the <strong>end product</strong>.</p>
                                        <p>You may charge your client for your services to create an end product, even under the <strong>Regular License</strong>. <strong>But you can’t use one of our Standard Licenses on multiple clients or jobs.</strong></p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#faq-q3">
                                    <h6 class="title">What is Item Support?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q3" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>We always provide <strong>free support for first 6 months</strong> from the purchase date. If you’re about to purchase the item, you’ll have the option to purchase <strong>extended item support</strong>, increasing the item support period up to a <strong>maximum of 12 months</strong> from the date of purchase.</p>
                                        <p>Yes, you can! If you have less than <strong>6 months remaining</strong> on a support item you’re eligible to renew your support.</p>
                                        <h6>What else is included?</h6>
                                        <ul class="list list-sm list-checked">
                                            <li>Answering all questions including technical about the item</li>
                                            <li>Help with defects in the item or included third-party assets</li>
                                            <li>Item updates to ensure ongoing compatibility and to resolve security vulnerabilities</li>
                                            <li>Updates to ensure the item works as described and is protected against major security concerns</li>
                                            <li>Included version updates for all items</li>
                                        </ul>
                                        <h6>What's not included in item support?</h6>
                                        <ul class="list list-sm list-cross">
                                            <li>Installation of the item</li>
                                            <li>Hosting, server environment, or software</li>
                                            <li>Help from authors of included third-party assets</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#faq-q4">
                                    <h6 class="title">How to download your Item</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q4" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>Item should be downloaded <strong>immediately</strong> after <strong>purchasing</strong>. You will get email with <strong>download link</strong> from Envato once you paid.</p>
                                        <h6>Also you can download your item:</h6>
                                        <ul class="list list-sm">
                                            <li>Hover over your username and click '<strong>Downloads'</strong> from the drop-down menu.</li>
                                            <li>The downloads section displays a list of all the items purchased using your account.</li>
                                            <li>Click the <strong>'Download'</strong> button next to the item and select <strong>‘Main File(s)’</strong> which contains all files, or <strong>‘Licence Certificate and Purchase Code’</strong> for the item licence information only.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                            <div class="accordion-item">
                                <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#faq-q5">
                                    <h6 class="title">How to contact before purchase?</h6>
                                    <span class="accordion-icon"></span>
                                </a>
                                <div class="accordion-body collapse" id="faq-q5" data-bs-parent="#faqs">
                                    <div class="accordion-inner">
                                        <p>If you want to ask questions about our product, or need help using our item you’ve purchased or just want to tell us how much you love our work, that's great!</p>
                                        <p>Contact us via email <a href="mailto:info@softnio.com">info(at)softnio.com</a> or Post your comment (are visible to everyone) on our item page after login into your account.</p>
                                    </div>
                                </div>
                            </div><!-- .accordion-item -->
                        </div><!-- .accordion -->
                    </div><!-- .nk-block -->
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-inner">
                                <div class="align-center flex-wrap flex-md-nowrap g-4">
                                    <div class="nk-block-image w-120px flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                            <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                                            <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                            <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                            <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                            <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                            <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                            <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                        </svg>
                                    </div>
                                    <div class="nk-block-content">
                                        <div class="nk-block-content-head px-lg-4">
                                            <h5>We’re here to help you!</h5>
                                            <p class="text-soft">Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-content flex-shrink-0">
                                        <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                    </div>
                                </div>
                            </div><!-- .card-inner -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div><!-- .content-page -->
            </div>
        </div>
    </div>
@endsection

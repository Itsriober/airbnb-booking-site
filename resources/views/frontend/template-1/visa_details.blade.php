@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @php
        $product_id = $visa_details->id;
        $product_type = 'visa';
        $author_id = $visa_details->author_id;
    @endphp
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')

    <!-- Start visa Details section -->
    <div class="visa-details-pages pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    @if($visa_details->features_image)
                    <div class="visa-thumb">
                        <img src="{{asset('uploads/visa/features/'.$visa_details->features_image)}}" alt="{{$visa_details->name}}">
                    </div>
                    @endif
                    <div class="visa-title">
                        <h3>{{ $visa_details->getTranslation('title') }}</h3>
                    </div>
                    <ul class="visa-meta">
                        @if ($visa_details->countries->name)
                            <li><span>{{ translate('Country') }} :</span>
                                {{ $visa_details->getTranslation('countries', $lang)['name'] }}</li>
                        @endif
                        <li><span>{{ translate('Visa Type') }} :</span> {{$visa_details->categories?->getTranslation('name')}}
                        </li>
                        @if ($visa_details->maximum_stay)
                            <li><span>{{ translate('Maximum Stays') }} :</span>
                                {{ $visa_details->getTranslation('maximum_stay') }}</li>
                        @endif
                        @if ($visa_details->processing)
                            <li><span>{{ translate('Processing Time') }} :</span>
                                {{ $visa_details->getTranslation('processing') }}</li>
                        @endif
                        @if ($visa_details->validity)
                            <li><span>{{ translate('Validity') }} :</span> {{ $visa_details->getTranslation('validity') }}
                            </li>
                        @endif
                        @if ($visa_details->visa_mode)
                            <li><span>{{ translate('Visa Mode') }} :</span>
                                {{ $visa_details->getTranslation('visa_mode') }}
                            </li>
                        @endif
                    </ul>
                    @if($includes)
                    <div class="visa-required-document mb-50">
                        <div class="document-list">
                            <h3>{{ translate('View Required Documents') }}</h3>
                            <h6>{{ translate('Required Documents for Electronic Visa (Adult) with Insurance') }}
                            </h6>
                            <ul>
                                @forelse ($includes as $include)
                                @if($include['title'])
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                            viewBox="0 0 18 16">
                                            <path
                                                d="M8.21008 15.9998C8.15563 15.9998 8.10177 15.9885 8.05188 15.9664C8.002 15.9444 7.95717 15.9122 7.92022 15.8719L0.104874 7.34121C0.0527746 7.28433 0.0182361 7.21337 0.00548549 7.137C-0.00726514 7.06063 0.00232503 6.98216 0.0330824 6.9112C0.0638398 6.84025 0.11443 6.77988 0.178662 6.73748C0.242893 6.69509 0.31798 6.67251 0.394731 6.6725H4.15661C4.21309 6.67251 4.26891 6.68474 4.32031 6.70837C4.37171 6.73201 4.41749 6.76648 4.45456 6.80949L7.06647 9.84167C7.34875 9.2328 7.89519 8.21899 8.85409 6.98363C10.2717 5.15733 12.9085 2.47141 17.4197 0.0467428C17.5069 -0.000110955 17.6084 -0.0122714 17.704 0.0126629C17.7996 0.0375972 17.8825 0.0978135 17.9363 0.181422C17.9901 0.26503 18.0109 0.365952 17.9946 0.46426C17.9782 0.562568 17.9259 0.651115 17.848 0.712418C17.8308 0.726001 16.0914 2.10818 14.0896 4.63987C12.2473 6.96965 9.79823 10.7792 8.59313 15.6973C8.57196 15.7837 8.52272 15.8604 8.45327 15.9153C8.38382 15.9702 8.29816 16 8.20996 16L8.21008 15.9998Z" />
                                        </svg> {{ $include['title'] }}
                                    </li>
                                    @endif
                                @empty
                                    <h2 class="text-center">{{ translate('Yoo! Nothings Here Bruhv') }}</h2>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    @endif
                    @if($faqs)
                    <h4 class="widget-title mb-30">{{ translate('FAQ - General Visa Information') }}:</h4>
                    <div class="faq-content">
                        <div class="accordion" id="accordionTravel">
                            @forelse ($faqs as $key => $faq)
                            @if($faq['title'])
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="travelheading{{ $key }}">
                                        <button class="accordion-button {{ $key === 1 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#travelcollapse{{ $key }}"
                                            aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                            aria-controls="travelcollapse{{ $key }}">
                                            {{ $faq['title'] }}
                                        </button>
                                    </h2>
                                    <div id="travelcollapse{{ $key }}"
                                        class="accordion-collapse collapse {{ $key === 1 ? 'show' : '' }}"
                                        aria-labelledby="travelheading{{ $key }}"
                                        data-bs-parent="#accordionTravel">
                                        <div class="accordion-body">
                                            {{ $faq['content'] }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @empty
                                <h2 class="text-center">{{ translate('Yoo! Nothings Here Bruhv') }}</h2>
                            @endforelse
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="visa-sidebar mb-30">
                        <div class="sidebar-top text-center">
                            <h4>{{ translate('Cost Summary') }}</h4>
                            <h6>{{ currency_symbol() . $visa_details->getTranslation('cost') }}/
                                <span>{{ translate('per person') }}</span>
                            </h6>
                            <p>{{ translate('Arrange your trip in advance - book this room now!') }}</p>
                        </div>
                        <div class="inquery-form">
                            <div class="form-title">
                                <h4>{{ translate('Inquiry Form') }}</h4>
                                <p>{{ translate('Complete form for complaints or service inquiries; expect prompt response via phone/email.') }}
                                </p>
                            </div>
                            @include('frontend.template-1.includes.booking_form')
                        </div>
                    </div>
                    <div class="banner2-card">
                        <img src="{{ asset('frontend/img/innerpage/support-img.jpg') }}" alt="">
                        <div class="banner2-content-wrap">
                            <div class="banner2-content">
                                <div class="hotline-area">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 28 28">
                                            <path
                                                d="M27.2653 21.5995L21.598 17.8201C20.8788 17.3443 19.9147 17.5009 19.383 18.1798L17.7322 20.3024C17.6296 20.4377 17.4816 20.5314 17.3154 20.5664C17.1492 20.6014 16.9759 20.5752 16.8275 20.4928L16.5134 20.3196C15.4725 19.7522 14.1772 19.0458 11.5675 16.4352C8.95784 13.8246 8.25001 12.5284 7.6826 11.4893L7.51042 11.1753C7.42683 11.0269 7.39968 10.8532 7.43398 10.6864C7.46827 10.5195 7.56169 10.3707 7.69704 10.2673L9.81816 8.61693C10.4968 8.08517 10.6536 7.1214 10.1784 6.40198L6.39895 0.734676C5.91192 0.00208106 4.9348 -0.21784 4.18082 0.235398L1.81096 1.65898C1.06634 2.09672 0.520053 2.80571 0.286612 3.63733C-0.56677 6.74673 0.0752209 12.1131 7.98033 20.0191C14.2687 26.307 18.9501 27.9979 22.1677 27.9979C22.9083 28.0011 23.6459 27.9048 24.3608 27.7115C25.1925 27.4783 25.9016 26.932 26.3391 26.1871L27.7641 23.8187C28.218 23.0645 27.9982 22.0868 27.2653 21.5995ZM26.9601 23.3399L25.5384 25.7098C25.2242 26.2474 24.7142 26.6427 24.1152 26.8128C21.2447 27.6009 16.2298 26.9482 8.64053 19.3589C1.0513 11.7697 0.398595 6.75515 1.18669 3.88421C1.35709 3.28446 1.75283 2.77385 2.2911 2.45921L4.66096 1.03749C4.98811 0.840645 5.41221 0.93606 5.62354 1.25397L7.67659 4.3363L9.39976 6.92078C9.60612 7.23283 9.53831 7.65108 9.24392 7.88199L7.1223 9.53232C6.47665 10.026 6.29227 10.9193 6.68979 11.6283L6.85826 11.9344C7.45459 13.0281 8.19599 14.3887 10.9027 17.095C13.6095 19.8012 14.9696 20.5427 16.0628 21.139L16.3694 21.3079C17.0783 21.7053 17.9716 21.521 18.4653 20.8753L20.1157 18.7537C20.3466 18.4595 20.7647 18.3918 21.0769 18.5979L26.7437 22.3773C27.0618 22.5885 27.1572 23.0128 26.9601 23.3399ZM15.8658 4.66809C20.2446 4.67296 23.7931 8.22149 23.798 12.6003C23.798 12.858 24.0069 13.0669 24.2646 13.0669C24.5223 13.0669 24.7312 12.858 24.7312 12.6003C24.7257 7.7063 20.7598 3.74029 15.8658 3.73494C15.6081 3.73494 15.3992 3.94381 15.3992 4.20151C15.3992 4.45922 15.6081 4.66809 15.8658 4.66809Z">
                                            </path>
                                            <path
                                                d="M15.865 7.46746C18.6983 7.4708 20.9943 9.76678 20.9976 12.6001C20.9976 12.7238 21.0468 12.8425 21.1343 12.93C21.2218 13.0175 21.3404 13.0666 21.4642 13.0666C21.5879 13.0666 21.7066 13.0175 21.7941 12.93C21.8816 12.8425 21.9308 12.7238 21.9308 12.6001C21.9269 9.2516 19.2134 6.53813 15.865 6.5343C15.6073 6.5343 15.3984 6.74318 15.3984 7.00088C15.3984 7.25859 15.6073 7.46746 15.865 7.46746Z">
                                            </path>
                                            <path
                                                d="M15.865 10.267C17.1528 10.2686 18.1964 11.3122 18.198 12.6C18.198 12.7238 18.2472 12.8424 18.3347 12.9299C18.4222 13.0174 18.5409 13.0666 18.6646 13.0666C18.7883 13.0666 18.907 13.0174 18.9945 12.9299C19.082 12.8424 19.1312 12.7238 19.1312 12.6C19.1291 10.797 17.668 9.33589 15.865 9.33386C15.6073 9.33386 15.3984 9.54274 15.3984 9.80044C15.3984 10.0581 15.6073 10.267 15.865 10.267Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <span>{{ translate('To More Inquiry') }}</span>
                                        <h6><a href="tel:+990737621432">+990-737 621 432</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

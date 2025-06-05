<div class="room-suits-card two">
    <div class="row g-0">
        <div class="col-md-12">
            <div class="swiper hotel-img-slider">
                @if ($item->breakfast == 1)
                    <span class="batch">{{ translate('Breakfast included') }}</span>
                @endif
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="room-img">
                            @if ($item->feature_img)
                                <img src="{{ asset('uploads/hotel/features/' . $item->feature_img) }}"
                                    alt="{{ $item->title }}">
                            @else
                                <img src="{{ asset('uploads/placeholder.jpg') }}" alt="{{ $data->title }}">
                            @endif

                        </div>
                    </div>
                
                    @foreach ($item->hotel_galleries->take(2) as $image)
                        <div class="swiper-slide">
                            <div class="room-img">
                                <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="swiper-pagination5"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="room-content">
                <div class="content-top">
                    @php
                        $total_reviews = $item->reviews?->count();
                        $total_rating = $item->reviews?->sum('rating');
                        $rating = $total_reviews > 0 && $total_rating > 0 ? $total_rating / $total_reviews : 0;
                    @endphp

                        <div class="reviews">
                            <ul class="star-list">
                                @foreach (range(1, 5) as $i)
                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            <li><i class="bi bi-star-fill"></i></li>
                                        @else
                                            <li><i class="bi bi-star-half"></i></li>
                                        @endif
                                    @else
                                        <li><i class="bi bi-star"></i></li>
                                    @endif
                                    @php $rating--; @endphp
                                @endforeach
                            </ul>
                            <span>{{ $total_reviews }} {{ translate('reviews') }}</span>
                        </div>

                    <h5><a href="{{ route('hotel.details', ['slug' => $item->slug]) }}">{{ $item->getTranslation('title') }}</a></h5>

                    <ul class="loaction-area">
                        <li><i class="bi bi-geo-alt"></i>{{ $item['cities']['name'] }},
                            {{ $item['countries']['name'] }}</li>
                        <li><a
                                href="{{ route('hotel.details', ['slug' => $item->slug]) }}#location-map">{{ translate('Show on map') }}</a>
                        </li>
                    </ul>
                    @php
                        $terms_id = json_decode($item->attribute_terms);
                        if (is_null($terms_id)) {
                            $terms_id = [];
                        }
                        $terms = App\Models\HotelAttributeTerm::whereIn('id', $terms_id)->take(5)->get();
                    @endphp
                    <ul class="facilisis">
                        @foreach ($terms as $term)
                            <li>
                                @if ($term->icon)
                                    <i class="{{ $term->icon }}"></i>
                                @elseif ($term->image)
                                    <img src="{{ asset('uploads/hotel/attribute/' . $term->image) }}"
                                        alt="{{ $term->name }}">
                                @endif
                                {{ $term->getTranslation('name') }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="content-bottom">
                    <div class="room-type">
                        <h6>{{ $item->room_type }}</h6>
                        <span>{{ $item->bed_type }}</span>
                        <div class="deals">
                            <span><strong>{{ translate('Free cancellation') }}</strong> <br> {{ translate('before') }}
                                {{ $item->cancellation }}
                                {{ translate(' hours') }}</span>
                        </div>
                    </div>
                    <div class="price-and-book">
                        <div class="price-area">
                            <p>1 night, {{ $item->guest_capability }} {{ translate('adults') }}</p>
                            <span>{{ currency_symbol() . $item->price }}</span>

                        </div>
                        <div class="book-btn">
                            <a href="{{ route('hotel.details', ['slug' => $item->slug]) }}"
                                class="primary-btn2">{{ 'Check Availability' }}
                                <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

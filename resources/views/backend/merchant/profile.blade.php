@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35 g-4">
        <div class="col-md-6">
            <div class="page-title text-md-start text-center">
                <h4>{{ $page_title ?? '' }}</h4>
            </div>
        </div>
        <div
            class="col-md-6 text-md-end text-center d-flex justify-content-md-end justify-content-center flex-row align-items-center flex-wrap gap-4">
            <a href="{{ route('merchant.list') }}" class="eg-btn btn--primary back-btn"><img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="eg-card-two">
                <h5 class="title">{{ translate('Total Order') }}</h5>
                <h2 class="number">{{ $merchantSingle->orders?->count() }}</h2>
                <svg width="74" height="78" viewBox="0 0 74 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.3">
                        <path
                            d="M12.5819 0.196815C11.006 0.57048 9.38137 1.88643 8.71527 3.31609C8.42284 3.96594 8.40659 4.64828 8.40659 21.4956V39.0091H4.5075H0.608398V46.8073V54.6055H37H73.3915V46.8073V39.0091H69.4924H65.5934L65.5609 21.7393L65.5121 4.48582L64.976 3.39732C64.3424 2.11387 63.4813 1.30156 62.0354 0.60297L60.9632 0.0993385L37.0812 0.0668449C23.5643 0.0668449 12.9393 0.115585 12.5819 0.196815ZM18.463 3.2836C18.0406 5.11943 16.546 6.90651 14.6127 7.88129C13.6054 8.38492 11.8345 8.93729 11.2172 8.95354C10.9248 8.95354 10.941 5.50933 11.2334 4.68078C11.8021 3.10489 12.9555 2.68249 16.7897 2.63375L18.6092 2.6175L18.463 3.2836ZM52.8238 3.91721C52.9863 4.68078 53.4087 5.83426 53.8473 6.71156C55.3257 9.66837 58.3963 12.0566 61.5968 12.7714L62.8315 13.0476V32.4456V51.8436H58.2013C55.6507 51.8436 53.5711 51.8111 53.5711 51.7786C53.5711 51.7461 53.9123 51.2263 54.3185 50.6089C55.9106 48.2207 57.0803 45.3614 57.5515 42.6157C57.8764 40.8124 57.8601 37.1733 57.5515 35.3374C57.0641 32.6243 55.8943 29.7325 54.2535 27.2306C53.295 25.7684 50.2569 22.7303 48.7298 21.7393C45.0581 19.3024 41.4352 18.2139 37 18.2139C32.5972 18.2139 28.9418 19.3024 25.2215 21.7556C23.7593 22.7141 20.705 25.7684 19.7302 27.2468C18.1056 29.7325 16.9359 32.6081 16.4485 35.3374C16.1398 37.1733 16.1236 40.8124 16.4485 42.632C16.9196 45.3289 18.1056 48.2694 19.6815 50.6089C20.0876 51.2263 20.4288 51.7461 20.4288 51.7786C20.4288 51.8111 18.3168 51.8436 15.7174 51.8436H11.006V31.7957V11.7479L11.9483 11.6342C12.4519 11.5692 13.4267 11.3417 14.0928 11.1305C17.7969 9.94456 20.4126 7.24768 21.1761 3.78724L21.4361 2.6175H36.9837H52.5476L52.8238 3.91721ZM60.7195 3.05615C61.5968 3.44606 62.4253 4.33961 62.669 5.16816C62.7828 5.52558 62.8315 6.71156 62.799 8.01126L62.7503 10.237L61.5643 9.83083C58.4288 8.77483 56.2518 6.35414 55.4557 3.03991L55.342 2.56877L57.6652 2.65C59.5173 2.71498 60.1346 2.79622 60.7195 3.05615ZM38.9495 21.0407C39.6156 21.0895 40.8503 21.3169 41.6951 21.5444C47.82 23.2015 52.7588 28.1403 54.4809 34.3302C55.082 36.5072 55.212 40.2113 54.7409 42.4208C54.0748 45.5726 52.7588 48.3019 50.7443 50.7064L49.7858 51.8436H37H24.2142L23.2881 50.7389C21.4686 48.6106 20.2339 46.1899 19.4215 43.2818C19.1129 42.1933 19.0641 41.576 19.0641 39.0091C19.0479 36.2147 19.0804 35.8898 19.4865 34.4114C21.2574 28.0916 26.1637 23.1852 32.4023 21.5281C33.8807 21.122 36.3989 20.8133 37.3249 20.9108C37.5523 20.9433 38.2834 20.992 38.9495 21.0407ZM8.40659 46.8073V52.0061H5.88843H3.37026V46.8073V41.6085H5.88843H8.40659V46.8073ZM70.6297 46.8073V52.0061H68.1115H65.5934V46.8073V41.6085H68.1115H70.6297V46.8073Z"
                            fill="white" />
                        <path
                            d="M29.608 32.153C28.4545 32.5429 27.3822 33.209 26.7811 33.8914C26.1638 34.6062 25.3352 36.1983 25.1727 37.0269L25.0428 37.628L23.7756 37.7092C22.3459 37.8067 22.0535 38.0179 22.0535 39.0089C22.0535 39.9999 22.3459 40.2112 23.7756 40.3086L25.0428 40.3899L25.1727 40.991C25.3677 41.982 26.245 43.5254 27.0248 44.3215C27.431 44.7114 28.2433 45.28 28.8444 45.5562C29.7704 45.9948 30.1603 46.076 31.5088 46.1248C32.646 46.1735 33.2796 46.1248 33.832 45.9461C35.3916 45.4099 36.5776 44.0128 37.5199 41.6083L38.0398 40.3086H42.0688C44.7495 40.3086 46.0979 40.3574 46.0979 40.4711C46.0979 40.5686 45.9517 40.926 45.773 41.2672C45.1719 42.4694 43.8884 43.2167 41.9876 43.4766C41.549 43.5416 41.0616 43.7203 40.8829 43.899C40.4442 44.3377 40.4605 45.3937 40.9153 45.8486C41.224 46.1573 41.4027 46.1898 42.605 46.1248C45.1069 45.9948 47.3651 44.5327 48.3886 42.3719C48.6486 41.8195 48.8598 41.2347 48.8598 41.0884C48.8598 40.4061 49.0222 40.3086 50.1757 40.3086C51.5404 40.3086 51.9465 40.0162 51.9465 39.0089C51.9465 38.0017 51.5404 37.7092 50.1757 37.7092C49.0222 37.7092 48.8598 37.6118 48.8598 36.9294C48.8598 36.3608 47.8687 34.6062 47.1539 33.8914C46.7153 33.4365 45.9029 32.9003 45.1556 32.5429C44.0834 32.023 43.7259 31.9418 42.4425 31.8931C41.6464 31.8606 40.6717 31.9093 40.298 32.0068C38.7871 32.413 37.3899 34.0213 36.4801 36.3608L35.9765 37.7092H31.9312C29.2506 37.7092 27.9021 37.6605 27.9021 37.5468C27.9021 37.1244 28.6007 36.0684 29.2018 35.5485C29.8679 34.9799 30.5827 34.7199 32.0124 34.5412C33.0197 34.4112 33.4258 34.0051 33.4258 33.1603C33.4258 32.1368 33.0359 31.8606 31.6063 31.8606C30.9077 31.8768 30.0791 31.9906 29.608 32.153ZM44.0834 35.0773C44.8632 35.4672 45.8542 36.5557 46.0167 37.1731C46.0654 37.4006 46.0817 37.6118 46.0492 37.6442C46.0167 37.693 44.4083 37.693 42.4587 37.6767L38.9496 37.628L39.4044 36.6532C39.6644 36.1171 40.1518 35.4348 40.4929 35.1261C41.0941 34.59 41.1428 34.59 42.2638 34.6549C42.9949 34.7037 43.661 34.8661 44.0834 35.0773ZM34.888 40.7148C34.5306 41.6571 34.0594 42.4044 33.5071 42.8755C33.0034 43.3304 32.8085 43.3954 31.9799 43.3954C30.8752 43.3954 30.1441 43.1842 29.3968 42.6318C28.8281 42.2094 28.1621 41.2834 27.9833 40.666L27.8859 40.3086H31.46H35.0505L34.888 40.7148Z"
                            fill="white" />
                        <path
                            d="M29.543 57.6272C29.2181 58.0334 29.2018 58.2608 29.2018 61.5263V65.003H26.9436C24.6854 65.003 24.6691 65.003 24.3442 65.4254C23.5481 66.4327 23.5156 66.3677 29.5592 72.4275C35.0342 77.9025 35.1317 78 35.7816 78C36.4152 78 36.5289 77.9025 42.0039 72.4275C47.2352 67.1963 47.5601 66.8388 47.5601 66.2865C47.5601 65.8966 47.4464 65.6041 47.1864 65.3604C46.829 65.0355 46.6503 65.003 44.587 65.003H42.3613V61.4613C42.3613 57.9684 42.3613 57.9034 41.9876 57.5622C41.614 57.2048 41.549 57.2048 35.7491 57.2048H29.8679L29.543 57.6272ZM39.5994 63.2809C39.5994 66.5464 39.6157 66.7738 39.9406 67.18C40.2493 67.5699 40.363 67.6024 41.5977 67.6024H42.9299L39.3557 71.1766L35.7816 74.7508L32.2399 71.2253L28.7144 67.6836L29.9654 67.6349C30.9889 67.6024 31.2976 67.5212 31.59 67.245C31.9637 66.9038 31.9637 66.8226 31.9637 63.3459V59.8042H35.7816H39.5994V63.2809Z"
                            fill="white" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="col-md-3">
            <div class="eg-card-two primary">
                <h5 class="title">{{ translate('Total Order Amount') }}</h5>
                <h2 class="number">{{ currency_symbol() . $merchantSingle->orders?->sum('total_with_tax') }}</h2>
                <svg width="74" height="78" viewBox="0 0 74 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.3">
                        <path
                            d="M12.5819 0.196815C11.006 0.57048 9.38137 1.88643 8.71527 3.31609C8.42284 3.96594 8.40659 4.64828 8.40659 21.4956V39.0091H4.5075H0.608398V46.8073V54.6055H37H73.3915V46.8073V39.0091H69.4924H65.5934L65.5609 21.7393L65.5121 4.48582L64.976 3.39732C64.3424 2.11387 63.4813 1.30156 62.0354 0.60297L60.9632 0.0993385L37.0812 0.0668449C23.5643 0.0668449 12.9393 0.115585 12.5819 0.196815ZM18.463 3.2836C18.0406 5.11943 16.546 6.90651 14.6127 7.88129C13.6054 8.38492 11.8345 8.93729 11.2172 8.95354C10.9248 8.95354 10.941 5.50933 11.2334 4.68078C11.8021 3.10489 12.9555 2.68249 16.7897 2.63375L18.6092 2.6175L18.463 3.2836ZM52.8238 3.91721C52.9863 4.68078 53.4087 5.83426 53.8473 6.71156C55.3257 9.66837 58.3963 12.0566 61.5968 12.7714L62.8315 13.0476V32.4456V51.8436H58.2013C55.6507 51.8436 53.5711 51.8111 53.5711 51.7786C53.5711 51.7461 53.9123 51.2263 54.3185 50.6089C55.9106 48.2207 57.0803 45.3614 57.5515 42.6157C57.8764 40.8124 57.8601 37.1733 57.5515 35.3374C57.0641 32.6243 55.8943 29.7325 54.2535 27.2306C53.295 25.7684 50.2569 22.7303 48.7298 21.7393C45.0581 19.3024 41.4352 18.2139 37 18.2139C32.5972 18.2139 28.9418 19.3024 25.2215 21.7556C23.7593 22.7141 20.705 25.7684 19.7302 27.2468C18.1056 29.7325 16.9359 32.6081 16.4485 35.3374C16.1398 37.1733 16.1236 40.8124 16.4485 42.632C16.9196 45.3289 18.1056 48.2694 19.6815 50.6089C20.0876 51.2263 20.4288 51.7461 20.4288 51.7786C20.4288 51.8111 18.3168 51.8436 15.7174 51.8436H11.006V31.7957V11.7479L11.9483 11.6342C12.4519 11.5692 13.4267 11.3417 14.0928 11.1305C17.7969 9.94456 20.4126 7.24768 21.1761 3.78724L21.4361 2.6175H36.9837H52.5476L52.8238 3.91721ZM60.7195 3.05615C61.5968 3.44606 62.4253 4.33961 62.669 5.16816C62.7828 5.52558 62.8315 6.71156 62.799 8.01126L62.7503 10.237L61.5643 9.83083C58.4288 8.77483 56.2518 6.35414 55.4557 3.03991L55.342 2.56877L57.6652 2.65C59.5173 2.71498 60.1346 2.79622 60.7195 3.05615ZM38.9495 21.0407C39.6156 21.0895 40.8503 21.3169 41.6951 21.5444C47.82 23.2015 52.7588 28.1403 54.4809 34.3302C55.082 36.5072 55.212 40.2113 54.7409 42.4208C54.0748 45.5726 52.7588 48.3019 50.7443 50.7064L49.7858 51.8436H37H24.2142L23.2881 50.7389C21.4686 48.6106 20.2339 46.1899 19.4215 43.2818C19.1129 42.1933 19.0641 41.576 19.0641 39.0091C19.0479 36.2147 19.0804 35.8898 19.4865 34.4114C21.2574 28.0916 26.1637 23.1852 32.4023 21.5281C33.8807 21.122 36.3989 20.8133 37.3249 20.9108C37.5523 20.9433 38.2834 20.992 38.9495 21.0407ZM8.40659 46.8073V52.0061H5.88843H3.37026V46.8073V41.6085H5.88843H8.40659V46.8073ZM70.6297 46.8073V52.0061H68.1115H65.5934V46.8073V41.6085H68.1115H70.6297V46.8073Z"
                            fill="white" />
                        <path
                            d="M29.608 32.153C28.4545 32.5429 27.3822 33.209 26.7811 33.8914C26.1638 34.6062 25.3352 36.1983 25.1727 37.0269L25.0428 37.628L23.7756 37.7092C22.3459 37.8067 22.0535 38.0179 22.0535 39.0089C22.0535 39.9999 22.3459 40.2112 23.7756 40.3086L25.0428 40.3899L25.1727 40.991C25.3677 41.982 26.245 43.5254 27.0248 44.3215C27.431 44.7114 28.2433 45.28 28.8444 45.5562C29.7704 45.9948 30.1603 46.076 31.5088 46.1248C32.646 46.1735 33.2796 46.1248 33.832 45.9461C35.3916 45.4099 36.5776 44.0128 37.5199 41.6083L38.0398 40.3086H42.0688C44.7495 40.3086 46.0979 40.3574 46.0979 40.4711C46.0979 40.5686 45.9517 40.926 45.773 41.2672C45.1719 42.4694 43.8884 43.2167 41.9876 43.4766C41.549 43.5416 41.0616 43.7203 40.8829 43.899C40.4442 44.3377 40.4605 45.3937 40.9153 45.8486C41.224 46.1573 41.4027 46.1898 42.605 46.1248C45.1069 45.9948 47.3651 44.5327 48.3886 42.3719C48.6486 41.8195 48.8598 41.2347 48.8598 41.0884C48.8598 40.4061 49.0222 40.3086 50.1757 40.3086C51.5404 40.3086 51.9465 40.0162 51.9465 39.0089C51.9465 38.0017 51.5404 37.7092 50.1757 37.7092C49.0222 37.7092 48.8598 37.6118 48.8598 36.9294C48.8598 36.3608 47.8687 34.6062 47.1539 33.8914C46.7153 33.4365 45.9029 32.9003 45.1556 32.5429C44.0834 32.023 43.7259 31.9418 42.4425 31.8931C41.6464 31.8606 40.6717 31.9093 40.298 32.0068C38.7871 32.413 37.3899 34.0213 36.4801 36.3608L35.9765 37.7092H31.9312C29.2506 37.7092 27.9021 37.6605 27.9021 37.5468C27.9021 37.1244 28.6007 36.0684 29.2018 35.5485C29.8679 34.9799 30.5827 34.7199 32.0124 34.5412C33.0197 34.4112 33.4258 34.0051 33.4258 33.1603C33.4258 32.1368 33.0359 31.8606 31.6063 31.8606C30.9077 31.8768 30.0791 31.9906 29.608 32.153ZM44.0834 35.0773C44.8632 35.4672 45.8542 36.5557 46.0167 37.1731C46.0654 37.4006 46.0817 37.6118 46.0492 37.6442C46.0167 37.693 44.4083 37.693 42.4587 37.6767L38.9496 37.628L39.4044 36.6532C39.6644 36.1171 40.1518 35.4348 40.4929 35.1261C41.0941 34.59 41.1428 34.59 42.2638 34.6549C42.9949 34.7037 43.661 34.8661 44.0834 35.0773ZM34.888 40.7148C34.5306 41.6571 34.0594 42.4044 33.5071 42.8755C33.0034 43.3304 32.8085 43.3954 31.9799 43.3954C30.8752 43.3954 30.1441 43.1842 29.3968 42.6318C28.8281 42.2094 28.1621 41.2834 27.9833 40.666L27.8859 40.3086H31.46H35.0505L34.888 40.7148Z"
                            fill="white" />
                        <path
                            d="M29.543 57.6272C29.2181 58.0334 29.2018 58.2608 29.2018 61.5263V65.003H26.9436C24.6854 65.003 24.6691 65.003 24.3442 65.4254C23.5481 66.4327 23.5156 66.3677 29.5592 72.4275C35.0342 77.9025 35.1317 78 35.7816 78C36.4152 78 36.5289 77.9025 42.0039 72.4275C47.2352 67.1963 47.5601 66.8388 47.5601 66.2865C47.5601 65.8966 47.4464 65.6041 47.1864 65.3604C46.829 65.0355 46.6503 65.003 44.587 65.003H42.3613V61.4613C42.3613 57.9684 42.3613 57.9034 41.9876 57.5622C41.614 57.2048 41.549 57.2048 35.7491 57.2048H29.8679L29.543 57.6272ZM39.5994 63.2809C39.5994 66.5464 39.6157 66.7738 39.9406 67.18C40.2493 67.5699 40.363 67.6024 41.5977 67.6024H42.9299L39.3557 71.1766L35.7816 74.7508L32.2399 71.2253L28.7144 67.6836L29.9654 67.6349C30.9889 67.6024 31.2976 67.5212 31.59 67.245C31.9637 66.9038 31.9637 66.8226 31.9637 63.3459V59.8042H35.7816H39.5994V63.2809Z"
                            fill="white" />
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <div class="row g-4 mt-0">
        <div class="col-xl-9">
            <div class="eg-card product-card merchant-profile-card">
                <div class="profile-area">
                    <div class="profile-img">
                        @if ($merchantSingle->image)
                            <img src="{{ asset('uploads/users/' . $merchantSingle->image) }}"
                                alt="{{ $merchantSingle->username }}" class="img-fluid">
                        @else
                            <img src="{{ asset('uploads/users/user.png') }}" alt="{{ $merchantSingle->username }}"
                                class="img-fluid">
                        @endif
                        <div class="small-hints row">
                            <h4>{{ $merchantSingle->fname . ' ' . $merchantSingle->lname }}</h4>
                            <p class="text-purple">{{ '@' . $merchantSingle->username }}</p>
                            <span class="date">{{ translate('Joined At') }}
                                {{ date('d F, Y', strtotime($merchantSingle->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="profile-content">
                        <div class="row g-3 cols-xxl-5 cols-xl-4">
                            @if ($merchantSingle->email)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('Email') }}</h6>
                                        <p>{{ $merchantSingle->email }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->phone)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('Mobile Number') }}</h6>
                                        <p>{{ $merchantSingle->phone }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->country_id)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('Country') }}</h6>
                                        <p><img src="{{ asset('assets/img/flags/' . $merchantSingle->countries->country_code . '.png') }}"
                                                alt="{{ $merchantSingle->countries->name }}"></p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->state_id)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('State') }}</h6>
                                        <p>{{ $merchantSingle->states->name ?? '' }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->city_id)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('City') }}</h6>
                                        <p>{{ $merchantSingle->cities->name ?? '' }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->zip_code)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('Postal Code') }}</h6>
                                        <p>{{ $merchantSingle->zip_code }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($merchantSingle->address)
                                <div class="col">
                                    <div class="single-infobox">
                                        <h6>{{ translate('Address') }}</h6>
                                        <p>{{ $merchantSingle->address ?? '' }}</p>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="eg-card multi-button-area d-flex flex-column gap-3">
                <a href="{{ route('merchant.edit', $merchantSingle->id) }}"
                    class="eg-btn orange-outline-btn">{{ translate('Edit Info') }}</a>
                <a href="{{ route('merchant.login', encrypt($merchantSingle->id)) }}" class="eg-btn priamry-outline-btn">
                    {{ translate('Login to Agent') }}
                </a>
                <button type="button" class="staticBackdropPayment eg-btn green-outline-btn" data-bs-toggle="modal"
                    data-bs-target="#staticBackdropPayment">{{ translate('Payement Details') }}</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12">

            <h4>{{ translate('Latest Booking') }}</h4>
            <div class="table-wrapper mt-3">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('Order Number') }}</th>
                            <th>{{ translate('Date') }}</th>
                            <th>{{ translate('Customer Name') }}</th>
                            <th>{{ translate('Product') }}</th>
                            <th>{{ translate('Type') }}</th>
                            <th>{{ translate('Amount') }}</th>
                            <th>{{ translate('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($merchant_orders->count() > 0)
                            @foreach ($merchant_orders as $key => $merchant_order)
                                <tr>
                                    <td>{{ $merchant_order->order_number }}</td>
                                    <td>{{ dateFormat($merchant_order->created_at) }}</td>
                                    <td data-label="User">
                                        <a href="{{ route('customer.view', $merchant_order->user_id) }}" target="_blank">
                                            {{ $merchant_order->users->fname ? $merchant_order->users->fname . ' ' . $merchant_order->users->lname : '' }}

                                        </a>
                                    </td>
                                    <td>@if ($merchant_order->product_type == 'tour')
                                        {{ $merchant_order->tours?->title }}
                                    @elseif ($merchant_order->product_type == 'hotel')
                                    {{ $merchant_order->hotels?->title }}
                                    @elseif ($merchant_order->product_type == 'activities')
                                    {{ $merchant_order->activities?->title }}
                                    @elseif ($merchant_order->product_type == 'transports')
                                    {{ $merchant_order->transports?->title }}
                                    @endif</td>
                                    <td>
                                        <button class="eg-btn primary-light--btn">{{ $merchant_order->product_type }}</button>
                                    </td>
                                    <td class="text-center">{{ currency_symbol() . $merchant_order->total_with_tax }}</td>
                                    <td data-label="Status">
                                        @if ($merchant_order->status == 1)
                                        <button class="eg-btn orange-light--btn">{{ translate('Pending') }}</button>
                                        @elseif($merchant_order->status == 2)
                                        <button
                                        class="eg-btn primary-light--btn">{{ translate('Processing') }}</button>
                                            
                                        @elseif($merchant_order->status == 3)
                                        <button class="eg-btn green-light--btn">{{ translate('Approved') }}</button>
                                        @elseif($merchant_order->status == 4)
                                            <button class="eg-btn red-light--btn">{{ translate('Cancelled') }}</button>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">{{ translate('Nothings Here Fahm!') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <h4>{{ translate('Tours') }}</h4>
            <div class="table-wrapper mt-3">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Image') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Price') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tours->count() > 0)
                            @foreach ($tours as $key => $tour)
                                <tr>
                                    <td data-label="S.N">
                                        {{ $key + 1 }}</td>
                                    <td data-label="Image">
                                        @if (!empty($tour->features_image))
                                            <img src="{{ asset('uploads/tour/features/' . $tour->features_image) }}"
                                                alt="{{ $tour->title }}">
                                        @else
                                            <img src="{{ asset('uploads/placeholder.jpg') }}"
                                                alt="{{ $tour->title }}">
                                        @endif
                                    </td>
                                    <td data-label="Name" class="text-start">{{ $tour->getTranslation('title') }}</td>
                                    <td data-label="Price">{{ currency_symbol() }}{{ $tour->sale_price ?? $tour->price }}
                                        
                                    </td>
                                    <td data-label="Status">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $tour->status }}"
                                                data-id="{{ $tour->id }}" data-type="tours"
                                                id="flexSwitchCheckStatus{{ $tour->id }}"
                                                {{ $tour->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td data-label="Action">
                                        <div
                                            class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                            @admin
                                                @if ($tour->status == 3)
                                                    <form method="POST"
                                                        action="{{ route('tours.approve', $tour->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <button type="submit" class="eg-btn account--btn" data-toggle="tooltip"
                                                            title="{{ translate('Approve') }}"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            @endadmin
                                            <a class="eg-btn add--btn"
                                                href="{{ route('tours.edit', ['id' => $tour->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"
                                                title="{{ translate('Edit') }}"><i class="bi bi-pencil-square"></i></a>
                                            <form method="POST" action="{{ route('tours.delete', $tour->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="eg-btn delete--btn show_confirm"
                                                    data-toggle="tooltip" title="{{ translate('Delete') }}"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" data-label="Not Found">
                                    <h5 class="data-not-found">{{ translate('Yoo! Nothings Here Bruhv') }}</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <h4>{{ translate('Hotels') }}</h4>
            <div class="table-wrapper mt-3">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Image') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Price') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($hotels->count() > 0)
                            @foreach ($hotels as $key => $hotel)
                                <tr>
                                    <td data-label="S.N">
                                        {{ $key + 1 }}</td>
                                    <td data-label="Image">
                                        @if (!empty($hotel->feature_img))
                                            <img src="{{ asset('uploads/hotel/features/' . $hotel->feature_img) }}"
                                                alt="{{ $hotel->title }}">
                                        @else
                                            <img src="{{ asset('uploads/placeholder.jpg') }}"
                                                alt="{{ $hotel->title }}">
                                        @endif
                                    </td>
                                    <td data-label="Name" class="text-start">{{ $hotel->getTranslation('title') }}</td>
                                    <td data-label="Price">{{ currency_symbol() }}{{ $hotel->price }}
                                        
                                    </td>
                                    <td data-label="Status">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $hotel->status }}"
                                                data-id="{{ $hotel->id }}" data-type="hotels"
                                                id="flexSwitchCheckStatus{{ $hotel->id }}"
                                                {{ $hotel->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td data-label="Action">
                                        <div
                                            class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                            @admin
                                                @if ($hotel->status == 3)
                                                    <form method="POST"
                                                        action="{{ route('hotels.approve', $hotel->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <button type="submit" class="eg-btn account--btn" data-toggle="tooltip"
                                                            title="{{ translate('Approve') }}"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            @endadmin
                                            <a class="eg-btn add--btn"
                                                href="{{ route('hotels.edit', ['id' => $hotel->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"
                                                title="{{ translate('Edit') }}"><i class="bi bi-pencil-square"></i></a>
                                            <form method="POST" action="{{ route('hotels.delete', $hotel->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="eg-btn delete--btn show_confirm"
                                                    data-toggle="tooltip" title="{{ translate('Delete') }}"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" data-label="Not Found">
                                    <h5 class="data-not-found">{{ translate('Yoo! Nothings Here Bruhv') }}</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <h4>{{ translate('Activities') }}</h4>
            <div class="table-wrapper mt-3">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Image') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Price') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($activities->count() > 0)
                            @foreach ($activities as $key => $activity)
                                <tr>
                                    <td data-label="S.N">
                                        {{ $key + 1 }}</td>
                                    <td data-label="Image">
                                        @if (!empty($activity->feature_img))
                                            <img src="{{ asset('uploads/activities/features/' . $activity->feature_img) }}"
                                                alt="{{ $activity->title }}">
                                        @else
                                            <img src="{{ asset('uploads/placeholder.jpg') }}"
                                                alt="{{ $activity->title }}">
                                        @endif
                                    </td>
                                    <td data-label="Name" class="text-start">{{ $activity->getTranslation('title') }}</td>
                                    <td data-label="Price">{{ currency_symbol() }}{{ $activity->sale_price ?? $activity->price }}
                                        
                                    </td>
                                    <td data-label="Status">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $activity->status }}"
                                                data-id="{{ $activity->id }}"
                                                data-type="activities"
                                                id="flexSwitchCheckStatus{{ $activity->id }}"
                                                {{ $activity->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td data-label="Action">
                                        <div
                                            class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                            @admin
                                                @if ($activity->status == 3)
                                                    <form method="POST"
                                                        action="{{ route('activities.approve', $activity->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <button type="submit" class="eg-btn account--btn" data-toggle="tooltip"
                                                            title="{{ translate('Approve') }}"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            @endadmin
                                            <a class="eg-btn add--btn"
                                                href="{{ route('activities.edit', ['id' => $activity->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"
                                                title="{{ translate('Edit') }}"><i class="bi bi-pencil-square"></i></a>
                                            <form method="POST" action="{{ route('activities.delete', $activity->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="eg-btn delete--btn show_confirm"
                                                    data-toggle="tooltip" title="{{ translate('Delete') }}"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" data-label="Not Found">
                                    <h5 class="data-not-found">{{ translate('Yoo! Nothings Here Bruhv') }}</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <h4>{{ translate('Transports') }}</h4>
            <div class="table-wrapper mt-3">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Image') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Price') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transports->count() > 0)
                            @foreach ($transports as $key => $transport)
                                <tr>
                                    <td data-label="S.N">
                                        {{ $key + 1 }}</td>
                                    <td data-label="Image">
                                        @if (!empty($transport->feature_img))
                                            <img src="{{ asset('uploads/transports/features/' . $transport->feature_img) }}"
                                                alt="{{ $transport->title }}">
                                        @else
                                            <img src="{{ asset('uploads/placeholder.jpg') }}"
                                                alt="{{ $transport->title }}">
                                        @endif
                                    </td>
                                    <td data-label="Name" class="text-start">{{ $transport->getTranslation('title') }}</td>
                                    <td data-label="Price">@if($transport->car_sale_price)<del class="text-danger">{{currency_symbol().$transport->car_price}}</del> {{currency_symbol().$transport->car_sale_price}} @else {{ currency_symbol().$transport->car_price }} @endif</td>
                                    <td data-label="Status">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $transport->status }}"
                                                data-id="{{ $transport->id }}"
                                                data-type="transports"
                                                id="flexSwitchCheckStatus{{ $transport->id }}"
                                                {{ $transport->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td data-label="Action">
                                        <div
                                            class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                            @admin
                                                @if ($transport->status == 3)
                                                    <form method="POST"
                                                        action="{{ route('transports.approve', $transport->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <button type="submit" class="eg-btn account--btn" data-toggle="tooltip"
                                                            title="{{ translate('Approve') }}"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif
                                            @endadmin
                                            <a class="eg-btn add--btn"
                                                href="{{ route('transports.edit', ['id' => $transport->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"
                                                title="{{ translate('Edit') }}"><i class="bi bi-pencil-square"></i></a>
                                            <form method="POST" action="{{ route('transports.delete', $transport->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="eg-btn delete--btn show_confirm"
                                                    data-toggle="tooltip" title="{{ translate('Delete') }}"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" data-label="Not Found">
                                    <h5 class="data-not-found">{{ translate('Yoo! Nothings Here Bruhv') }}</h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('backend.merchant.modal')
    @push('footer')
        <div class="d-flex justify-content-center custom-pagination">
            {!! $merchant_orders->links() !!}
        </div>
    @endpush
@endsection

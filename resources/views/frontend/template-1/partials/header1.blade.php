<!-- Start header section -->
<header class="header-area style-1">
    <div class="header-logo d-lg-none d-flex">
        <a href="{{ url('/') }}">
            @if (get_setting('header_logo'))
                <img class="img-fluid" src="{{ asset('assets/logo/' . get_setting('header_logo')) }}" alt="Logo"
                    width="150">
            @else
                <img class="img-fluid" src="{{ asset('frontend/img/logo.svg') }}" alt="Logo" width="150">
            @endif
        </a>
    </div>
    <div class="company-logo d-lg-flex d-none">
        <a href="{{ url('/') }}">
            @if (get_setting('header_logo'))
                <img src="{{ asset('assets/logo/' . get_setting('header_logo')) }}" alt="Logo" width="155">
            @else
                <img src="{{ asset('frontend/img/logo.svg') }}" alt="Logo" width="155">
            @endif
        </a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap">
                <a href="{{ url('/') }}">
                    @if (get_setting('header_logo'))
                        <img src="{{ asset('assets/logo/' . get_setting('header_logo')) }}" alt="Logo">
                    @else
                        <img src="{{ asset('frontend/img/logo.svg') }}" alt="Logo">
                    @endif
                </a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x"></i>
            </div>
        </div>
        @php
            $menu_items = \App\Models\MenuItem::with('page', 'blog')
                ->where('menu_id', 1)
                ->where('parent_id', null)
                ->orderBy('order', 'asc')
                ->get();

        @endphp
        @if ($menu_items->count() > 0)
            <ul class="menu-list">
                @foreach ($menu_items as $menu_item)
                    @if ($menu_item->children->count() > 0)
                        <li class="menu-item-has-children">
                            <a target="{{ $menu_item->menu_type == 'custom' ? ($menu_item->new_tap == 1 ? '' : '') : '' }}"
                                href="@if ($menu_item->menu_type == 'page') {{ $menu_item->slug == 'home' ? url('/') : url($menu_item->slug) }}@elseif($menu_item->menu_type == 'custom'){{ $menu_item->target }}@else{{ url('/blog/' . $menu_item->slug) }} @endif"
                                class="drop-down">
                                @if ($menu_item->menu_type == 'page')
                                    {{ $menu_item?->page?->getTranslation('page_name') }}
                                @elseif ($menu_item->menu_type == 'category')
                                    {{ $menu_item->category->getTranslation('name') }}
                                @elseif ($menu_item->menu_type == 'blog')
                                    {{ $menu_item?->blog?->getTranslation('title') }}
                                @else
                                    {{ Str::limit($menu_item->getTranslation('title'), 15) }}
                                @endif
                            </a><i class="bi bi-plus dropdown-icon"></i>
                            <ul class="sub-menu">
                                @foreach ($menu_item->children as $subMenu)
                                    @if ($subMenu->children->count() > 0)
                                        <li>
                                            <a class="@if ($menu_item->menu_type == 'page') {{ ($menu_item->slug == 'home' ? (request()->is('/') ? 'active' : '') : request()->is($menu_item->slug)) ? 'active' : '' }}
                                            @elseif($menu_item->menu_type == 'blog') {{ request()->segment(2) == $menu_item->slug ? 'active' : '' }} @else {{ request()->is($menu_item->slug) ? 'active' : '' }} @endif
                                          "
                                                target="{{ $menu_item->menu_type == 'custom' ? ($menu_item->new_tap == 1 ? '' : '') : '' }}"
                                                href="@if ($subMenu->menu_type == 'page') {{ $subMenu->slug == 'home' ? url('/') : url($subMenu->slug) }}@elseif($subMenu->menu_type == 'custom'){{ $subMenu->target }}@else{{ url('/blog/' . $subMenu->slug) }} @endif">
                                                @if ($subMenu->menu_type == 'page')
                                                    {{ $subMenu?->page?->getTranslation('page_name') }}
                                                @elseif ($subMenu->menu_type == 'blog')
                                                    {{ $subMenu?->blog?->getTranslation('title') }}
                                                @else
                                                    {{ Str::limit($subMenu->getTranslation('title'), 15) }}
                                                @endif
                                            </a>
                                            <i class="d-lg-flex d-none bi bi-chevron-right dropdown-icon"></i>
                                            <i class="d-lg-none d-flex bi bi-plus dropdown-icon"></i>
                                            <ul class="sub-menu">
                                                @foreach ($subMenu->children as $subSubMenu)
                                                    <li><a class=" @if ($menu_item->menu_type == 'page') {{ ($menu_item->slug == 'home' ? (request()->is('/') ? 'active' : '') : request()->is($menu_item->slug)) ? 'active' : '' }}
                                                        @elseif($menu_item->menu_type == 'blog') {{ request()->segment(2) == $menu_item->slug ? 'active' : '' }} @else {{ request()->is($menu_item->slug) ? 'active' : '' }} @endif
                                                      "
                                                            target="{{ $menu_item->menu_type == 'custom' ? ($menu_item->new_tap == 1 ? '' : '') : '' }}"
                                                            href="@if ($subSubMenu->menu_type == 'page') {{ $subSubMenu->slug == 'home' ? url('/') : url($subSubMenu->slug) }}@elseif($subSubMenu->menu_type == 'custom'){{ $subSubMenu->target }}@else{{ url('/blog/' . $subSubMenu->slug) }} @endif">
                                                            @if ($subSubMenu->menu_type == 'page')
                                                                {{ $subSubMenu?->page?->getTranslation('page_name') }}
                                                            @elseif ($subSubMenu->menu_type == 'blog')
                                                                {{ $subSubMenu?->blog?->getTranslation('title') }}
                                                            @else
                                                                {{ Str::limit($subSubMenu->getTranslation('title'), 15) }}
                                                            @endif
                                                        </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a class=" @if ($menu_item->menu_type == 'page') {{ ($menu_item->slug == 'home' ? (request()->is('/') ? 'active' : '') : request()->is($menu_item->slug)) ? 'active' : '' }} @elseif($menu_item->menu_type == 'blog') {{ request()->segment(2) == $menu_item->slug ? 'active' : '' }} @else {{ request()->is($menu_item->slug) ? 'active' : '' }} @endif"
                                                href="
                                                @if ($subMenu->menu_type == 'page') {{ $subMenu->slug == 'home' ? url('/') : url($subMenu->slug) }}
                                                @elseif($subMenu->menu_type == 'custom')
                                                {{ $subMenu->target }}
                                                @else{{ url('/blog/' . $subMenu->slug) }} @endif"
                                                target="{{ $menu_item->menu_type == 'custom' ? ($menu_item->new_tap == 1 ? '' : '') : '' }}">

                                                @if ($subMenu->menu_type == 'page')
                                                    {{ $subMenu?->page?->getTranslation('page_name') }}
                                                @elseif ($subMenu->menu_type == 'blog')
                                                    {{ $subMenu?->blog?->getTranslation('title') }}
                                                @else
                                                    {{ Str::limit($subMenu->getTranslation('title'), 15) }}
                                                @endif

                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a class="@if ($menu_item->menu_type == 'page') {{ ($menu_item->slug == 'home' ? (request()->is('/') ? 'active' : '') : request()->is($menu_item->slug)) ? 'active' : '' }} @elseif($menu_item->menu_type == 'blog') {{ request()->segment(2) == $menu_item->slug ? 'active' : '' }} @else {{ request()->is($menu_item->slug) ? 'active' : '' }} @endif"
                                target="{{ $menu_item->menu_type == 'custom' ? ($menu_item->new_tap == 1 ? '' : '') : '' }}"
                                href="@if ($menu_item->menu_type == 'page') {{ $menu_item->slug == 'home' ? url('/') : url($menu_item->slug) }}@elseif($menu_item->menu_type == 'custom'){{ $menu_item->target }}@else{{ url('/blog/' . $menu_item->slug) }} @endif">

                                @if ($menu_item->menu_type == 'page')
                                    {{ $menu_item?->page?->getTranslation('page_name') }}
                                @elseif ($menu_item->menu_type == 'blog')
                                    {{ $menu_item?->blog?->getTranslation('title') }}
                                @else
                                    {{ Str::limit($menu_item->getTranslation('title'), 15) }}
                                @endif

                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif

        @if(!Auth::check())
        <div class="topbar-right d-lg-none d-block">
            <button type="button" class="modal-btn header-cart-btn" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop1">
                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.4311 12.759C15.417 11.4291 16 9.78265 16 8C16 3.58169 12.4182 0 8 0C3.58169 0 0 3.58169 0 8C0 12.4182 3.58169 16 8 16C10.3181 16 12.4058 15.0141 13.867 13.4387C14.0673 13.2226 14.2556 12.9957 14.4311 12.759ZM13.9875 12C14.7533 10.8559 15.1999 9.48009 15.1999 8C15.1999 4.02355 11.9764 0.799983 7.99991 0.799983C4.02355 0.799983 0.799983 4.02355 0.799983 8C0.799983 9.48017 1.24658 10.8559 2.01245 12C2.97866 10.5566 4.45301 9.48194 6.17961 9.03214C5.34594 8.45444 4.79998 7.49102 4.79998 6.39995C4.79998 4.63266 6.23271 3.19993 8 3.19993C9.76729 3.19993 11.2 4.63266 11.2 6.39995C11.2 7.49093 10.654 8.45444 9.82039 9.03206C11.5469 9.48194 13.0213 10.5565 13.9875 12ZM13.4722 12.6793C12.3495 10.8331 10.3188 9.59997 8.00008 9.59997C5.68126 9.59997 3.65049 10.8331 2.52776 12.6794C3.84829 14.2222 5.80992 15.2 8 15.2C10.1901 15.2 12.1517 14.2222 13.4722 12.6793ZM8 8.79998C9.32551 8.79998 10.4 7.72554 10.4 6.39995C10.4 5.07444 9.32559 3.99992 8 3.99992C6.6744 3.99992 5.59997 5.07452 5.59997 6.40003C5.59997 7.72554 6.67449 8.79998 8 8.79998Z">
                    </path>
                </svg>
                {{ translate('REGISTER / LOGIN') }}
            </button>
        </div>
        @endif

        @if (get_setting('hotline_phone'))
            <div class="hotline-area d-lg-none d-flex">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                        <path
                            d="M27.2653 21.5995L21.598 17.8201C20.8788 17.3443 19.9147 17.5009 19.383 18.1798L17.7322 20.3024C17.6296 20.4377 17.4816 20.5314 17.3154 20.5664C17.1492 20.6014 16.9759 20.5752 16.8275 20.4928L16.5134 20.3196C15.4725 19.7522 14.1772 19.0458 11.5675 16.4352C8.95784 13.8246 8.25001 12.5284 7.6826 11.4893L7.51042 11.1753C7.42683 11.0269 7.39968 10.8532 7.43398 10.6864C7.46827 10.5195 7.56169 10.3707 7.69704 10.2673L9.81816 8.61693C10.4968 8.08517 10.6536 7.1214 10.1784 6.40198L6.39895 0.734676C5.91192 0.00208106 4.9348 -0.21784 4.18082 0.235398L1.81096 1.65898C1.06634 2.09672 0.520053 2.80571 0.286612 3.63733C-0.56677 6.74673 0.0752209 12.1131 7.98033 20.0191C14.2687 26.307 18.9501 27.9979 22.1677 27.9979C22.9083 28.0011 23.6459 27.9048 24.3608 27.7115C25.1925 27.4783 25.9016 26.932 26.3391 26.1871L27.7641 23.8187C28.218 23.0645 27.9982 22.0868 27.2653 21.5995ZM26.9601 23.3399L25.5384 25.7098C25.2242 26.2474 24.7142 26.6427 24.1152 26.8128C21.2447 27.6009 16.2298 26.9482 8.64053 19.3589C1.0513 11.7697 0.398595 6.75515 1.18669 3.88421C1.35709 3.28446 1.75283 2.77385 2.2911 2.45921L4.66096 1.03749C4.98811 0.840645 5.41221 0.93606 5.62354 1.25397L7.67659 4.3363L9.39976 6.92078C9.60612 7.23283 9.53831 7.65108 9.24392 7.88199L7.1223 9.53232C6.47665 10.026 6.29227 10.9193 6.68979 11.6283L6.85826 11.9344C7.45459 13.0281 8.19599 14.3887 10.9027 17.095C13.6095 19.8012 14.9696 20.5427 16.0628 21.139L16.3694 21.3079C17.0783 21.7053 17.9716 21.521 18.4653 20.8753L20.1157 18.7537C20.3466 18.4595 20.7647 18.3918 21.0769 18.5979L26.7437 22.3773C27.0618 22.5885 27.1572 23.0128 26.9601 23.3399ZM15.8658 4.66809C20.2446 4.67296 23.7931 8.22149 23.798 12.6003C23.798 12.858 24.0069 13.0669 24.2646 13.0669C24.5223 13.0669 24.7312 12.858 24.7312 12.6003C24.7257 7.7063 20.7598 3.74029 15.8658 3.73494C15.6081 3.73494 15.3992 3.94381 15.3992 4.20151C15.3992 4.45922 15.6081 4.66809 15.8658 4.66809Z" />
                        <path
                            d="M15.865 7.46746C18.6983 7.4708 20.9943 9.76678 20.9976 12.6001C20.9976 12.7238 21.0468 12.8425 21.1343 12.93C21.2218 13.0175 21.3404 13.0666 21.4642 13.0666C21.5879 13.0666 21.7066 13.0175 21.7941 12.93C21.8816 12.8425 21.9308 12.7238 21.9308 12.6001C21.9269 9.2516 19.2134 6.53813 15.865 6.5343C15.6073 6.5343 15.3984 6.74318 15.3984 7.00088C15.3984 7.25859 15.6073 7.46746 15.865 7.46746Z" />
                        <path
                            d="M15.865 10.267C17.1528 10.2686 18.1964 11.3122 18.198 12.6C18.198 12.7238 18.2472 12.8424 18.3347 12.9299C18.4222 13.0174 18.5409 13.0666 18.6646 13.0666C18.7883 13.0666 18.907 13.0174 18.9945 12.9299C19.082 12.8424 19.1312 12.7238 19.1312 12.6C19.1291 10.797 17.668 9.33589 15.865 9.33386C15.6073 9.33386 15.3984 9.54274 15.3984 9.80044C15.3984 10.0581 15.6073 10.267 15.865 10.267Z" />
                    </svg>
                </div>
                <div class="content">
                    <span>{{ get_setting('hotline_text') ?? translate('To More Inquiry') }}</span>
                    <h6><a href="tel:{{ get_setting('hotline_phone') }}">{{ get_setting('hotline_phone') }}</a></h6>
                </div>
            </div>
        @endif
    </div>

        <div class="nav-right d-flex justify-content-end align-items-center">
            @if (Auth::check())
                @if (Auth::user()->role == 1)
                <div class="balance-area d-lg-flex d-none">
                    <div class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path
                                    d="M0.585938 5.85942V17.0313C0.585938 18.3257 1.63527 19.4141 2.92968 19.4141H17.0703C17.7174 19.4141 18.2421 18.8894 18.2421 18.2422V15.8594" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M13.5547 7.61723V0.585996H4.14062V7.61723" stroke="white" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.2422 11.1719V8.7891C18.2422 8.14188 17.7175 7.61723 17.0703 7.61723" stroke="white"
                                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M13.5546 4.10161H15.8984C16.5456 4.10161 17.0703 4.62626 17.0703 5.27348V7.61723H2.34374C1.37293 7.61723 0.585938 6.83024 0.585938 5.85942C0.585938 4.8886 1.37293 4.10161 2.34374 4.10161H4.14061" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6.48438 0.585996V7.61723" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M19.414 15.8594H15.8984C14.604 15.8594 13.5547 14.8101 13.5547 13.5156C13.5547 12.2212 14.604 11.1719 15.8984 11.1719H19.414V15.8594Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8.82812 0.585996V7.61723" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15.8984 13.3516C15.8078 13.3516 15.7344 13.425 15.7344 13.5156C15.7344 13.6063 15.8078 13.6797 15.8984 13.6797C15.9891 13.6797 16.0625 13.6063 16.0625 13.5156C16.0625 13.425 15.9891 13.3516 15.8984 13.3516Z"
                                    fill="white" stroke-width="1.5" />
                            </g>
                        </svg>
                    </div>
                    <div class="content">
                        <span>{{translate('Total Balance')}}</span>
                        <h6>{{ format_currency(Auth::user()->wallet_balance) }} <sub>({{currency_code()}})</sub></h6>
                    </div>
                </div>

                <div class="profile-area @if(Auth::check() && request()->is('customer/*')) sidebar-toggle-button @endif">
                    <div class="profile-img">
                        @if(Auth::user()->image)
                        <img src="{{asset('uploads/users/'.Auth::user()->image)}}" alt="{{Auth::user()->username}}">
                        @else
                        <img src="{{asset('uploads/users/user.png')}}" alt="{{Auth::user()->username}}">
                        @endif
                    </div>
                    <div class="profile-content">
                        <a @if(Auth::check() && request()->is('customer/*')) href="#" @else href="{{route('customer.dashboard')}}" @endif>
                        <span>{{translate('Hello')}},</span>
                        <h6>{{Auth::user()->fname}}</h6>
                        </a>
                    </div>
                </div>
                @else
                <div class="profile-area">
                    <div class="profile-img">
                        @if(Auth::user()->image)
                        <img src="{{asset('uploads/users/'.Auth::user()->image)}}" alt="{{Auth::user()->username}}">
                        @else
                        <img src="{{asset('uploads/users/user.png')}}" alt="{{Auth::user()->username}}">
                        @endif
                    </div>
                    <div class="profile-content">
                        <a href="{{route('backend.dashboard')}}" target="new">
                        <span>{{translate('Hello')}},</span>
                        <h6>{{Auth::user()->fname}}</h6>
                        </a>
                    </div>
                </div>
                @endif
            @else
            <a href="#" class="primary-btn1 two" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="M9 9.5625C8.33249 9.5625 7.67997 9.36456 7.12495 8.99371C6.56994 8.62286 6.13735 8.09576 5.88191 7.47906C5.62646 6.86236 5.55963 6.18376 5.68985 5.52907C5.82008 4.87438 6.14151 4.27302 6.61352 3.80101C7.08552 3.32901 7.68689 3.00757 8.34157 2.87735C8.99626 2.74712 9.67486 2.81396 10.2916 3.06941C10.9083 3.32485 11.4354 3.75743 11.8062 4.31245C12.1771 4.86747 12.375 5.51999 12.375 6.1875C12.375 7.08261 12.0194 7.94105 11.3865 8.57399C10.7536 9.20692 9.89511 9.5625 9 9.5625ZM9 3.9375C8.55499 3.9375 8.11998 4.06946 7.74997 4.31669C7.37996 4.56393 7.09157 4.91533 6.92127 5.32646C6.75098 5.7376 6.70642 6.19 6.79323 6.62645C6.88005 7.06291 7.09434 7.46382 7.40901 7.77849C7.72368 8.09316 8.12459 8.30745 8.56105 8.39427C8.99751 8.48108 9.4499 8.43653 9.86104 8.26623C10.2722 8.09593 10.6236 7.80754 10.8708 7.43753C11.118 7.06752 11.25 6.63251 11.25 6.1875C11.25 5.59076 11.0129 5.01847 10.591 4.59651C10.169 4.17455 9.59674 3.9375 9 3.9375Z"/>
                        <path
                            d="M9.00011 17.4375C7.75273 17.4367 6.52105 17.1593 5.39375 16.6253C4.26645 16.0913 3.27157 15.314 2.48073 14.3494L2.18823 13.9894L2.48073 13.635C3.27224 12.6716 4.26741 11.8956 5.39468 11.3628C6.52194 10.8301 7.75328 10.5537 9.00011 10.5537C10.2469 10.5537 11.4783 10.8301 12.6055 11.3628C13.7328 11.8956 14.728 12.6716 15.5195 13.635L15.812 13.9894L15.5195 14.3494C14.7286 15.314 13.7338 16.0913 12.6065 16.6253C11.4792 17.1593 10.2475 17.4367 9.00011 17.4375ZM3.66198 13.995C4.34612 14.7274 5.17349 15.3113 6.09275 15.7106C7.01201 16.1098 8.00352 16.3158 9.00573 16.3158C10.0079 16.3158 10.9995 16.1098 11.9187 15.7106C12.838 15.3113 13.6653 14.7274 14.3495 13.995C13.6653 13.2626 12.838 12.6787 11.9187 12.2794C10.9995 11.8802 10.0079 11.6742 9.00573 11.6742C8.00352 11.6742 7.01201 11.8802 6.09275 12.2794C5.17349 12.6787 4.34612 13.2626 3.66198 13.995Z"/>
                        <path
                            d="M9.00002 17.4375C7.08344 17.4388 5.22353 16.7875 3.7264 15.5909C2.22928 14.3943 1.18417 12.7236 0.763068 10.8538C0.34197 8.98408 0.569984 7.02668 1.40958 5.30378C2.24918 3.58089 3.65033 2.19518 5.38242 1.37471C7.1145 0.554251 9.07431 0.347933 10.9393 0.789715C12.8043 1.2315 14.4632 2.29505 15.6432 3.80534C16.8232 5.31562 17.4538 7.18263 17.4313 9.09908C17.4088 11.0155 16.7345 12.8672 15.5194 14.3494C14.7286 15.314 13.7337 16.0913 12.6064 16.6253C11.4791 17.1593 10.2474 17.4367 9.00002 17.4375ZM9.00002 1.6875C7.55374 1.6875 6.13995 2.11637 4.93741 2.91988C3.73488 3.72339 2.79761 4.86544 2.24415 6.20163C1.69068 7.53781 1.54587 9.00811 1.82803 10.4266C2.11018 11.8451 2.80663 13.148 3.8293 14.1707C4.85197 15.1934 6.15493 15.8898 7.57342 16.172C8.99191 16.4541 10.4622 16.3093 11.7984 15.7559C13.1346 15.2024 14.2766 14.2651 15.0801 13.0626C15.8836 11.8601 16.3125 10.4463 16.3125 9C16.3125 7.0606 15.5421 5.20064 14.1707 3.82928C12.7994 2.45792 10.9394 1.6875 9.00002 1.6875Z"/>
                        <path
                            d="M2.91382 13.995C2.91382 13.995 8.57819 20.3231 14.3438 14.625L15.0863 13.995C15.0863 13.995 10.2713 9 5.38319 11.9981L2.91382 13.995Z"/>
                        <path
                            d="M9 9C10.5533 9 11.8125 7.7408 11.8125 6.1875C11.8125 4.6342 10.5533 3.375 9 3.375C7.4467 3.375 6.1875 4.6342 6.1875 6.1875C6.1875 7.7408 7.4467 9 9 9Z"/>
                    </g>
                </svg>
                {{ translate('Account') }}
            </a>
            @endif
            <div class="sidebar-button mobile-menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                    <path
                        d="M0 4.46439C0 4.70119 0.0940685 4.92829 0.261511 5.09574C0.428955 5.26318 0.656057 5.35725 0.892857 5.35725H24.1071C24.3439 5.35725 24.571 5.26318 24.7385 5.09574C24.9059 4.92829 25 4.70119 25 4.46439C25 4.22759 24.9059 4.00049 24.7385 3.83305C24.571 3.6656 24.3439 3.57153 24.1071 3.57153H0.892857C0.656057 3.57153 0.428955 3.6656 0.261511 3.83305C0.0940685 4.00049 0 4.22759 0 4.46439ZM4.46429 11.6072H24.1071C24.3439 11.6072 24.571 11.7013 24.7385 11.8688C24.9059 12.0362 25 12.2633 25 12.5001C25 12.7369 24.9059 12.964 24.7385 13.1315C24.571 13.2989 24.3439 13.393 24.1071 13.393H4.46429C4.22749 13.393 4.00038 13.2989 3.83294 13.1315C3.6655 12.964 3.57143 12.7369 3.57143 12.5001C3.57143 12.2633 3.6655 12.0362 3.83294 11.8688C4.00038 11.7013 4.22749 11.6072 4.46429 11.6072ZM12.5 19.643H24.1071C24.3439 19.643 24.571 19.737 24.7385 19.9045C24.9059 20.0719 25 20.299 25 20.5358C25 20.7726 24.9059 20.9997 24.7385 21.1672C24.571 21.3346 24.3439 21.4287 24.1071 21.4287H12.5C12.2632 21.4287 12.0361 21.3346 11.8687 21.1672C11.7012 20.9997 11.6071 20.7726 11.6071 20.5358C11.6071 20.299 11.7012 20.0719 11.8687 19.9045C12.0361 19.737 12.2632 19.643 12.5 19.643Z" />
                </svg>
            </div>
        </div>
</header>
<!-- End header section -->

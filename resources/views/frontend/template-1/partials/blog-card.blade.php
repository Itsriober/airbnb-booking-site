<div class="blog-card">
    <div class="blog-card-img-wrap">
        <a href="{{ url('blog/' . $blog->slug) }}" class="card-img"><img src="{{ asset('uploads/blog/' . $blog->image) }}"
                alt="{{ $blog->title }}"></a>
        <a href="{{ url('blog/category/' . $blog->blog_categories?->slug) }}" class="date">
            <span>{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
        </a>
    </div>
    <div class="blog-card-content">
        <div class="blog-card-content-top">
            <ul>
                <li>
                    {{ translate('By') }} <a
                        href="{{ url('blog/category/' . $blog->blog_categories?->slug) }}">{{ $blog->users?->username }}</a>
                </li>
                <li>
                    <a
                        href="{{ url('blog/category/' . $blog->blog_categories?->slug) }}">{{ $blog->blog_categories?->name }}</a>
                </li>
            </ul>
        </div>
        <h5><a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->getTranslation('title') }}</a></h5>
        <div class="bottom-area">
            <a href="{{ url('blog/' . $blog->slug) }}">{{ translate('View Post') }}
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                        fill="none">
                        <path d="M2.07617 8.73272L12.1899 2.89355" stroke-linecap="round"></path>
                        <path d="M10.412 7.59764L12.1908 2.89295L7.22705 2.08105" stroke-linecap="round"></path>
                    </svg>
                </span>
            </a>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="12" viewBox="0 0 9 12">
                    <path
                        d="M5.85726 11.3009C7.14547 9.08822 6.60613 6.30362 4.57475 4.68025C4.57356 4.67933 4.57238 4.67818 4.57143 4.6775L4.58021 4.69862L4.57878 4.71446C4.97457 5.72599 4.91905 6.83648 4.43285 7.78924L4.09022 8.461L3.9851 7.71876C3.91368 7.21529 3.71745 6.735 3.41515 6.32382H3.36745L3.3423 6.25495C3.34586 7.02428 3.17834 7.78213 2.8497 8.49704C2.41856 9.43259 2.48191 10.5114 3.01936 11.3833L3.39023 11.9853L2.72299 11.7126C1.62271 11.2628 0.743103 10.3964 0.309587 9.33547C-0.176131 8.15083 -0.0862008 6.77725 0.550429 5.66194C0.882388 5.08179 1.11493 4.46582 1.24187 3.8308L1.36597 3.2084L1.68251 3.76353C1.83366 4.02824 1.94494 4.31476 2.01399 4.61574L2.02111 4.62285L2.02847 4.67107L2.03535 4.669C2.98353 3.45015 3.55158 1.93354 3.6344 0.397865L3.65575 0L4.00076 0.217643C5.4088 1.10544 6.38664 2.52976 6.6887 4.13017L6.69558 4.163L6.69914 4.16805L6.71457 4.14693C6.99053 3.79429 7.13622 3.37485 7.13622 2.93336V2.24967L7.56261 2.7947C8.55398 4.06153 9.06224 5.63301 8.99391 7.21988C8.90991 9.08776 7.85708 10.7272 6.17736 11.6154L5.45008 12L5.85726 11.3009Z">
                    </path>
                </svg>
                {{ calculate_read_time(strip_tags($blog->description)) }} {{ translate('Min Read') }}
            </span>
        </div>
    </div>
</div>

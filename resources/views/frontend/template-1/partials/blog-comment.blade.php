<div class="row">
                        <div class="comment-area" id="comment-area">
                            <div class="comment-title">
                                <h4>{{ $comments->count() > 1 ? 'Comments' : 'Comment' }}
                                ({{ $comments->count() < 9 && $comments->count() != 0 ? '0' . $comments->count() : $comments->count() }})</h4>
                                <div class="dash"></div>
                            </div>
                            <ul class="comment">
                            @if ($comments->count() > 0)
                            @foreach ($comments as $comment)
                                <li>
                                    <div class="single-comment-area">
                                        <div class="author-img">
                                            @if (fileExists('uploads/users', $comment?->users?->image) != false && $comment?->users?->image != null)
                                                            <img alt="image"
                                                                src="{{ asset('uploads/users/' . $comment->users->image) }}">
                                                        @else
                                                            <img alt="image"
                                                                src="{{ asset('uploads/users/user.png') }}">
                                                        @endif
                                        </div>
                                        <div class="comment-content">
                                            <div class="author-name-deg">
                                                <h6>@if ($comment?->users && $comment?->users?->fname)
                                                                    {{ $comment?->users?->fname . ' ' . $comment?->users?->lname }}
                                                                @elseif($comment?->users && $comment->users?->username)
                                                                    {{ $comment?->users?->username }}
                                                                @else
                                                                    {{ $comment?->user_name }}
                                                                @endif</h6>
                                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p>{{ $comment->comment }}</p>
                                            <div  class="commnt-reply"
                                            data-comment_id="{{ $comment->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11">
                                                    <path d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z"></path>
                                                </svg>
                                                {{translate('Reply')}}
                                            </div>
                                        </div>
                                    </div>
                                    @if (count($comment->replies) > 0)
                                    <ul class="comment-replay">
                                    @foreach ($comment->replies as $reply)
                                        <li>
                                            <div class="single-comment-area">
                                                <div class="author-img">
                                                @if (fileExists('uploads/users', $reply?->users?->image) != false && $reply?->users?->image != null)
                                                                            <img alt="image"
                                                                                src="{{ asset('uploads/users/' . $reply->users->image) }}">
                                                                        @else
                                                                            <img alt="image"
                                                                                src="{{ asset('uploads/users/user.png') }}">
                                                                        @endif
                                                </div>
                                                <div class="comment-content">
                                                    <div class="author-name-deg">
                                                        <h6> @if ($reply->users && $reply->users->fname)
                                                                                    {{ $reply->users->fname . ' ' . $reply->users->lname }}
                                                                                @elseif($reply->users && $reply->users->username)
                                                                                    {{ $reply->users->username }}
                                                                                @else
                                                                                    {{ $reply->user_name }}
                                                                                @endif</h6>
                                                        <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p>{{ $reply->comment }}</p>
                                                    <div class="commnt-reply"
                                                    data-comment_id="{{ $reply->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11">
                                                            <path d="M8.55126 1.11188C8.52766 1.10118 8.50182 1.09676 8.47612 1.09903C8.45042 1.1013 8.42569 1.11018 8.40419 1.12486C8.3827 1.13954 8.36513 1.15954 8.35311 1.18304C8.34109 1.20653 8.335 1.23276 8.33539 1.25932V2.52797C8.33539 2.67388 8.2791 2.81381 8.17889 2.91698C8.07868 3.02016 7.94277 3.07812 7.80106 3.07812C7.08826 3.07812 5.64984 3.08362 4.27447 3.98257C3.2229 4.66916 2.14783 5.9191 1.50129 8.24735C2.59132 7.16575 3.83632 6.57929 4.92635 6.2679C5.59636 6.07737 6.28492 5.96444 6.97926 5.93121C7.26347 5.91835 7.54815 5.92129 7.83205 5.94001H7.84594L7.85129 5.94111L7.80106 6.48906L7.85449 5.94111C7.98638 5.95476 8.10864 6.01839 8.19751 6.11966C8.28638 6.22092 8.33553 6.35258 8.33539 6.48906V7.75771C8.33539 7.87654 8.45294 7.95136 8.55126 7.90515L12.8088 4.67796C12.8233 4.66692 12.8383 4.65664 12.8537 4.64715C12.8769 4.63278 12.8962 4.61245 12.9095 4.58816C12.9229 4.56386 12.9299 4.53643 12.9299 4.50851C12.9299 4.4806 12.9229 4.45316 12.9095 4.42887C12.8962 4.40458 12.8769 4.38425 12.8537 4.36988C12.8382 4.36039 12.8233 4.35011 12.8088 4.33907L8.55126 1.11188ZM7.26673 7.02381C7.19406 7.02381 7.11391 7.02711 7.02842 7.03041C6.56462 7.05242 5.92342 7.12504 5.21169 7.32859C3.79464 7.7335 2.11684 8.65116 1.00115 10.7175C0.940817 10.8291 0.844683 10.9155 0.729224 10.9621C0.613765 11.0087 0.486168 11.0124 0.368304 10.9728C0.250441 10.9331 0.149648 10.8525 0.0831985 10.7447C0.0167484 10.6369 -0.011219 10.5086 0.0040884 10.3819C0.499949 6.29981 2.01959 4.15202 3.70167 3.05391C5.03215 2.18467 6.40218 2.01743 7.26673 1.98552V1.25932C7.26663 1.03273 7.32593 0.810317 7.43839 0.615545C7.55084 0.420773 7.71227 0.260866 7.90565 0.152696C8.09902 0.0445258 8.31717 -0.00789584 8.53707 0.000962485C8.75698 0.00982081 8.97048 0.0796305 9.15506 0.203025L13.4233 3.43792C13.5998 3.55133 13.7453 3.7091 13.8462 3.8964C13.9471 4.08369 14 4.29434 14 4.50851C14 4.72269 13.9471 4.93333 13.8462 5.12063C13.7453 5.30792 13.5998 5.4657 13.4233 5.57911L9.15506 8.814C8.97048 8.9374 8.75698 9.00721 8.53707 9.01607C8.31717 9.02492 8.09902 8.9725 7.90565 8.86433C7.71227 8.75616 7.55084 8.59626 7.43839 8.40148C7.32593 8.20671 7.26663 7.9843 7.26673 7.75771V7.02381Z"></path>
                                                        </svg>
                                                        {{translate('Reply')}}
                                                    </div>
                                                </div>
                                            </div>
                                            @if (count($reply->replies) > 0)
                                    <ul class="comment-replay">
                                    @foreach ($reply->replies as $reply2)
                                        <li>
                                            <div class="single-comment-area">
                                                <div class="author-img">
                                                @if (fileExists('uploads/users', $reply2?->users?->image) != false && $reply2?->users?->image != null)
                                                                            <img alt="image"
                                                                                src="{{ asset('uploads/users/' . $reply2->users->image) }}">
                                                                        @else
                                                                            <img alt="image"
                                                                                src="{{ asset('uploads/users/user.png') }}">
                                                                        @endif
                                                </div>
                                                <div class="comment-content">
                                                    <div class="author-name-deg">
                                                        <h6> @if ($reply2->users && $reply2->users->fname)
                                                                                    {{ $reply2->users->fname . ' ' . $reply2->users->lname }}
                                                                                @elseif($reply2->users && $reply2->users->username)
                                                                                    {{ $reply2->users->username }}
                                                                                @else
                                                                                    {{ $reply2->user_name }}
                                                                                @endif</h6>
                                                        <span>{{ $reply2->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p>{{ $reply2->comment }}</p>
                                                   
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                    @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            @endif
                            </ul>
                            <div class="inquiry-form mt-100">
                                <div class="title">
                                    <h4>{{ translate('Leave A Comment') }}:</h4>
                                </div>
                                <form action="{{ route('blog.comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog_details->id }}">
                                    <div class="row">
                                    @if (Auth::guest())
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>{{translate('Your Name')}} <span class="text-danger">*</span> :</label>
                                                <input type="text" name="user_name"
                                                placeholder="{{ translate('Your Name') }} :" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-30">
                                                <label>{{translate('Your Email')}} <span class="text-danger">*</span> :</label>
                                                <input type="email" name="user_email"
                                                placeholder="{{ translate('Your Email') }} :" required>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-inner mb-50">
                                                <label>{{translate('Your Message')}} <span class="text-danger">*</span> :</label>
                                                <textarea name="comment" placeholder="{{ translate('Your Comment') }} :" rows="6" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-inner">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            {{translate('Post Comment')}}
                                            <span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
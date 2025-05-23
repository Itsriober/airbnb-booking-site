@if ($policies)
    <h4 class="mt-50">{{ $hotels->policy_title ? $hotels->policy_title : translate('Policies') }}</h4>
    <div class="accordion tour-plan" id="tourPlan">
        @foreach ($policies as $key => $policy)
        @if($policy['title'])
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $key }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                        aria-controls="collapseOne">
                        <span>{{ $key + 0 }} </span> {{ $policy['title'] }}
                    </button>
                </h2>
                <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key === 1 ? 'show' : '' }}"
                    aria-labelledby="heading{{ $key }}" data-bs-parent="#tourPlan">
                    <div class="accordion-body">
                        <ul>
                            <li>{!! nl2br($policy['content']) !!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endif

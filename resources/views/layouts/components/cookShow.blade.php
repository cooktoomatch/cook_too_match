@if (count($cooks) > 0)
<div class="album py-5">
    <div class="row">
        @foreach ($cooks as $cook)
        <div class="col-6 col-md-4">
            <div class="card shadow-sm">
                <div class="thumbnail">
                    @if(count($cook->images) !== 0)
                    <img src="{{ asset('storage/cook_image/'.$cook->images->first()->image) }}" class="bd-placeholder-img card-img-top" width="100%">
                    @endif
                    <div class="overlay"></div>
                    <p class="price">¥ {{ number_format($cook->price) }}</p>
                </div>
                <div class="card-body">
                    <a class="title cook_name" href="/cooks/show/{{ $cook->id }}">{{ $cook->name }}</a>
                    <div>
                        <span class="distance-{{ $cook->id }}"></span>
                    </div>
                    <div>
                        <span class="duration-{{ $cook->id }}"></span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;">more</button>
                            </form>
                            <div class="goodBtnArea-{{ $cook->id }}">
                                @if (count( $cook->goods->where('user_id', Auth::id()) ) === 0)

                                <button type="submit" class="good-store good-store-{{ $cook->id }} btn btn-sm btn-default btn-outline-default btn-icon btn-round">
                                    <i class="far fa-thumbs-up"></i>
                                </button>

                                @else
                                <button type="submit" class="good-delete good-delete-{{ $cook->goods->where('user_id', Auth::id())->first()->id }} btn btn-sm btn-primary btn-outline-primary btn-icon btn-round">
                                    <i class="far fa-thumbs-up"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                        <small class="text-muted">{{ $cook->created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/good.js') }}"></script>
@endif
        @if (count($cooks) > 0)
        <div class="album py-5">
            <div class="row">
                @foreach ($cooks as $cook)
                <div class="col-6 col-md-4">
                    <div class="card shadow-sm">
                        <div class="thumbnail">
                            <img src="{{ asset('storage/cook_image/'.$cook->image) }}" class="bd-placeholder-img card-img-top" width="100%">
                            <div class="overlay"></div>
                            <p class="price">¥ {{ $cook->price }}</p>
                        </div>
                        <div class="card-body">
                            <a class="cook_name" href="/cooks/show/{{ $cook->id }}">{{ $cook->name }}</a>
                            <span class="buy">buy</span>
                            <!-- <p class="card-text">{{ $cook->description }}</p> -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;">more</button>
                                    </form>
                                    <div class="goodBtnArea">
                                        @if (count( $cook->goods->where('user_id', Auth::id()) ) === 0)
                                            <!-- <form action="{{ url('goods/store') }}" method="POST"> -->
                                                <!-- {{ csrf_field() }} -->
                                            <input class="cook_id" type="hidden" name="cook_id" value="{{ $cook->id }}">
                                            <button type="submit" class="good-store btn btn-sm btn-default btn-outline-default btn-icon btn-round btn-{{ $cook->id }} {{ $cook->good }}">
                                                <i class="far fa-thumbs-up"></i>
                                            </button>
                                            <!-- </form>                                         -->
                                        @else
                                            <!-- <form action="{{ url('good/'.$cook->goods->where('user_id', Auth::id())[0]->id) }}" method="POST"> -->
                                                <!-- {{ csrf_field() }}
                                                {{ method_field('DELETE') }}  -->
                                                
                                                <!-- <input type="hidden" name="cook_id" value="{{ $cook->id }}"> -->
                                            <input class="good_id" type="hidden" name="good_id" value="{{ $cook->goods->where('user_id', Auth::id())[0]->id }}">
                                            <button type="submit" class="good-delete btn btn-sm btn-primary btn-outline-primary btn-icon btn-round btn-{{ $cook->id }} {{ $cook->good }}">
                                                <i class="far fa-thumbs-up"></i>
                                            </button>
                                            <!-- </form> -->
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
        @endif
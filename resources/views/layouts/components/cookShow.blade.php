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
                            <!-- <p class="card-text">{{ $cook->description }}</p> -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ url('cooks/show/'.$cook->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-primary" style="margin-right: 8px;">more</button>
                                    </form>
                                    <!-- <form action="{{ url('cooks/edit/'.$cook->id) }}" method="GET">
                                        {{ csrf_field() }} -->
                                    <button type="submit" class="good btn btn-sm btn-default btn-outline-default btn-icon btn-round btn-{{ $cook->id }} {{ $cook->good }}">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                    <!-- </form> -->
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
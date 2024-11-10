
                        @forelse($products as $item)
                        <div class="col-lg-3 col-md-3">
                                    <img src="{{ asset('storage') }}/{{ $item->image ?? '' }}" alt="{{ $item->name }}"
                                        data-name="{{ $item->name }}" data-id="{{ $item->id }}"
                                        data-price="{{ $item->price }}">
                                    <p style="margin:0px; text-align:center; font-size: 12px;">{{$item->name}} - {{$item->price}}</p>
                                </div>
                        @empty
                       <center> <strong><span class="text-danger">No Product Find</span></strong>  </center>
                        @endforelse 









                            

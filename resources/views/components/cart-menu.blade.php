{{-- <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><x-cart-menu /></a>
    <div class="dropdown-menu m-0">
        <a href="team.html" class="dropdown-item">Our Team</a>
        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
        <a href="contact.html" class="dropdown-item">Contact</a>
    </div>
</div> --}}

<div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fas fa-shopping-cart"></i>
        <span class="total-items">{{ $items->count() }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="dropdown-menu m-0" style="width: 200px">
        <div class="dropdown-cart-header"> 
            <span>{{ $items->count() }} Items</span>
            <a href="{{ route('cart.index') }}">View Cart</a>
        </div>
        <ul class="dropdown-item" style="list-style-type: none;">
            @if($items->count() != 0)
                @foreach ($items as $item)

                    <li>
                        <div class="row">
                        @if($item)
                            <div class="content">
                                <h6><a href="{{ route('show.food',$item->food->slug) }}">{{ $item->food->name }}</a></h6>
                                <p class="quantity">{{ $item->quantity }}x - <span class="amount">${{ $item->food->{$item->options} }}</span></p>
                                <form method="POST" action="{{ route('cart.destroy',$item->id) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="selectedSize" value="{{ $item->options }}">
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fa fa-trash me-3"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                        </div>
                    </li>
                    <hr>
                @endforeach
            @endif

        </ul>
        <div class="cart-total">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">${{ $total }}</span>

                <a href="" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
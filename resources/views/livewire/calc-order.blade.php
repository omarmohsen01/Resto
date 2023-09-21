<div>
    <form class="list-group" action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="food_id" value="{{ $food->id }}">
        <div class="row">
                <div class="form-group">
                    <label class="title-label text-primary" for="size">Extras</label>
                    <div class="">
                        <input type="checkbox" name="" id="checkbox-1">
                        <label for="checkbox-1"><span>Fries</span></label>
                    </div>
                    <div class="">
                        <input type="checkbox" id="checkbox-2">
                        <label for="checkbox-2"><span>Cola</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="text-primary">Choose Size</label>
                    <select name="size" class="form-control" wire:model="selectedSize" wire:change="calculateTotal">
                        <option value="small">Small    ${{ $food->small }}</option>
                        <option value="medium">Medium   ${{ $food->medium }}</option>
                        <option value="large">Large     ${{ $food->large }}</option>
                    </select>
                </div>
            <div class="form-group quantity">
                <label for="color" class="text-primary">Quantity</label>
                <input type="number" name="quantity"  wire:model="quantity" wire:change="calculateTotal" class="form-control">
            </div>
        </div>
        <div class="bottom-content" style="margin-left: 305px;
        margin-top: 15px;">
            <h3 class="price text-primary">total: ${{ $total }}</h3>
                <button  class="btn btn-primary" type="submit" >Add to Cart</button>
        </div>
    </form>
</div>

<div>
    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
        @foreach ($categories as $category)
            <li class="nav-item" wire:click="showFoods({{ $category->id }})"
                class="{{ $activeCategoryId == $category->id ? 'active' : '' }}"
                style="{{ $activeCategoryId == $category->id ? ' background: var(--primary);
                border-color: var(--primary);': '' }}cursor: pointer;">
                <i class="fa fa-coffee fa-2x "></i>
                <div class="ps-3">
                    <h6 >{{ $category->name }}</h6>
                </div>
            </li>
        @endforeach
    </ul>

    @if ($selectedCategoryId)
        <h2>{{ $categories->find($selectedCategoryId)->name }}</h2>
            @foreach ($categories->find($selectedCategoryId)->foods->take($limit) as $food)
            <div class="tab-content" style="margin: 13px">
                <div id="" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('frontAssets/assets/img/menu-1.jpg')}}" alt="" style="width: 80px;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                    <li>{{ $food->name }}
                                    </li>
                                    @auth
                                        <a href="{{ route('show.food',$food->slug) }}">Add To Cart</a>
                                    @endauth
                                    </h5>
                                    <div class="d-flex justify-content-between border-bottom pb-2">
                                    <span class="text-primary">Small:${{ $food->small }}</span>
                                    <span class="text-primary">Medium:${{ $food->medium }}</span>
                                    <span class="text-primary">Large:${{ $food->large }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <input type="number" wire:model="limit"> --}}
    @endif
</div>

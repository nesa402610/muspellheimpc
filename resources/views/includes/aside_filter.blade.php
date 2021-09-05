<aside>
    <div class="sidequest">
        <div>
            <h4>
                Фильтр
            </h4>
        </div>
        <div class="filter">
            {{-- <div class="uCanBuyIt">
                <h4>
                    Наличие товара
                </h4>
                <ul>
                    <li>
                        <a href="">
                            Товар в наличии
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Под заказ
                        </a>
                    </li>
                </ul>
            </div> --}}
            <div class="category">
                <h4 style="margin-bottom: .2rem">
                    Категории
                </h4>
                <ul>
                    @foreach ($categories as $category)
                        @if ($category->visibility === 1)
                            @if (!request()->is('*'. '-' . $category->id . '-' . '*'))
                            <li>
                                <a href="{{ route('hardware_filter', $category->id . '-' . $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @else
                            <li>
                                <a style="color:white">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>

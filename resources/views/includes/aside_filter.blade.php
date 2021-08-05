<aside>
    <div class="sidequest">
        <div>
            <h4>
                Фильтр
            </h4>
        </div>
        <div class="filter">
            <div class="uCanBuyIt">
                <h5>
                    Наличие товара
                </h5>
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
            </div>
            <div class="category">
                <h5>
                    Категории
                </h5>
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('hardware_filter', $category->id . '-' . $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>

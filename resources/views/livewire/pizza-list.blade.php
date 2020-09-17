<section>
    <article class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach ($pizzas as $pizza)
            <livewire:pizza-card
                    :pizza="$pizza"
                    :key="$pizza->id">
        @endforeach
    </article>
    <footer class="row">
        {{ $pizzas->links() }}
    </footer>
</section>
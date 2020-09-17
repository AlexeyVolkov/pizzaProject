<tr>
    <th scope="row">
        {{ $pizza->name }}
        @if ($topping->id > 1)
            <span class="badge badge-secondary">
            <i class="fas fa-pepper-hot"></i>
            {{ $topping->name }}
        </span>
        @endif
        @if ($size->id > 1)
            <span class="badge badge-secondary">
            <i class="fas fa-ruler-combined"></i>
            {{ $size->name }}
        </span>
        @endif
        @if ($orderedPizza->quantity > 1)
            <span class="badge badge-light">
            <i class="fas fa-sort-numeric-up-alt"></i>
            {{ $orderedPizza->quantity }}
        </span>
        @endif
    </th>
    <td>
        <button
                wire:click="removePizza"
                type="button"
                class="btn btn-dark btn-sm"
                title="{{ __('Remove') }} {{ $pizza->name }} {{ __(' from basket') }}">
            <i class="fas fa-trash-alt"></i>
            {{ __('Remove') }}
        </button>
    </td>
</tr>
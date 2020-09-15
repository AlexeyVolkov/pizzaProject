<tr>
    <th scope="row">{{ $pizza->name }}</th>
    <td>{{ $topping->name }}</td>
    <td>{{ $size->name }}</td>
    <td>{{ $orderedPizza->quantity }}</td>
    <td>
        <button
                wire:click="removePizza"
                type="button"
                class="btn btn-dark btn-sm"
        >
            {{ __('Remove') }} {{ $pizza->name }} {{ __(' from basket') }}
            <i class="fas fa-times"></i>
        </button>
    </td>
</tr>
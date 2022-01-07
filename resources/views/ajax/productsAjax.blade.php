                        @foreach ($products as $product)
                        <tr>
                          <td>
                            {{ $product->name }}
                          </td>
                          <td>
                            {{ $product->reference }}
                          </td>
                          <td>
                            {{ $product->price }}
                          </td>
                          <td>
                            {{ $product->fournisseur }}
                          </td>
                          <td>
                          <label class="badge @if ($product->quantity > 100) badge-success @else badge-warning @endif">{{ $product->quantity }}</label>
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('locations.edit', ["id" => $product->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                        </tr>
                        @endforeach
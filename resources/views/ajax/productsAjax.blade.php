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
                        </tr>
                        @endforeach
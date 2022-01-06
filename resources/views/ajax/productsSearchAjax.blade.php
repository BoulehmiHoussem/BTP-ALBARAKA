                        <tr>
                          <td>
                            <input type="hidden" value='{{ $product->id }}' name='sub[{{$counter}}][products][]'>
                            {{ $product->name }}
                          </td>
                          <td>
                          <div class="product-quantity">
                           
                            <div class="product-quantity-subtract">
                            <i class="mdi mdi-arrow-left"></i>
                            </div>
                            <div>
                            <input type="text" @if(isset($quantity)) value='{{ $quantity }}' @endif name="sub[{{$counter}}][quantity][{{ $product->id }}]" id="product-quantity-input" placeholder="0" value="0" />
                            </div>
                            <div class="product-quantity-add">
                            <i class="mdi mdi-arrow-right"></i>
                            </div>
                        </div>
                          </td>
                        </tr>
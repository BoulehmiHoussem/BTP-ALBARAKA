                        <tr>
                          <td>
                            @if(isset($selectable))
                            <div class="form-check form-check-success">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                {{ $product->name }}
                              <i class="input-helper"></i></label>
                            </div>
                            @else
                            {{ $product->name }}
                            @endif
                            <input type="hidden" value='{{ $product->id }}' name='sub[{{$counter}}][products][]'>
                            
                          </td>
                          <td>
                          <div class="product-quantity">
                           
                            
                            <div>
                            <input type="text" @if(isset($quantity)) value='{{ $quantity }}' @endif name="sub[{{$counter}}][quantity][{{ $product->id }}]" id="product-quantity-input" placeholder="0" value="0" />
                            </div>
                            
                        </div>
                          </td>
                        </tr>
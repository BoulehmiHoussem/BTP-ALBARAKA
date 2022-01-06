<tr>
                          <td>
                            <input type="hidden" value='{{ $location->id }}' name='sub[{{$counter}}][location][]'>
                            {{ $location->name }}
                          </td>
                          <td>
                          <div class="product-quantity">

                            <div>
                                <input type="datetime-local" name="sub[{{$counter}}][from][{{ $location->id }}]" class="form-control col-md-6"> <input type="datetime-local" name="sub[{{$counter}}][to][{{ $location->id }}]" class="form-control col-md-5">
                            </div>
                            
                        </div>
                          </td>
                        </tr>
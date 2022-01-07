                        <tr>
                          <td>
                            <input type="hidden" value='{{ $location->id }}' name='sub[{{$counter}}][location][]'>
                            {{ $location->name }}
                          </td>
                          <td>
                          <div class="product-quantity">

                            <div>
                                <input @if(isset($from)) value="{{$from}}" @endif type="datetime-local" name="sub[{{$counter}}][from][{{ $location->id }}]" class="form-control col-md-6"> <input type="datetime-local" @if(isset($from)) value="{{$to}}" @endif name="sub[{{$counter}}][to][{{ $location->id }}]" class="form-control col-md-5">
                            </div>
                            
                        </div>
                          </td>
                        </tr>
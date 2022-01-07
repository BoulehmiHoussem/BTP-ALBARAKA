 <!-- Modal -->
 <div class="modal fade" id="productmodal-{{ $counter }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('layouts.components.toast.alert')
      @include('layouts.components.toast.success')
      <div class="col-lg-12 grid-margin stretch-card">
             
                  <div class="table-responsive">
                     
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Produit
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="text" class="form-control" id="product-{{ $counter }}">
                            </th>
                            <th>
                            <button type="button" class="btn btn-success btn-rounded btn-icon" onclick="clickToGet({{$counter}})" id="submitproduct">
                                <i class="mdi mdi-plus"></i>
                            </button>
                            </th>
                        </tr>
                      </thead>
                      <tbody id="tbodyproduct-{{ $counter }}">
                        @if(isset($products))
                          @foreach ($products as $count => $product)
                            @foreach($product->products as $key => $liveprod)
                              @include('ajax.productsSearchAjax' , ['product' => $liveprod , 'counter' => $key , 'quantity' => $products[$count]->product_quantity, 'selectable' => (isset($selectable) ? true : false)])
                            @endforeach
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
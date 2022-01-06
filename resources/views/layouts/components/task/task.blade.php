<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sous tâches</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Produits</th>
                          <th>Locations</th>
                        </tr>
                      </thead>
                      <tbody id="tachebody">
                        @if(isset($subtasks))
                          @foreach ($subtasks as $key => $subtask)
                          <tr>
                            <td> <input type="text" name="sub[{{$key}}][name]" class="form-control hiddenborder" value='{{ $subtask->name }}' />  </td>
                            <td><a class="badge badge-primary" data-toggle="modal" data-target="#productmodal-{{ $key }}"> <i class="mdi mdi-cart-plus"> </i> Produits</a></td>
                            <td><a class="badge badge-primary" data-toggle="modal" data-target="#locationmodal-{{ $key }}"> <i class="mdi mdi-car" ></i> Locations</label></td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div id="productsmodals">
              @if(isset($subtasks))
                @foreach ($subtasks as $key => $subtask)
                  @include('layouts.components.task.products', ['counter' => $key , 'products' => $subtask->subtaskproducts])
                @endforeach
              @endif
            </div>
            <div id="locationmodals">
              @if(isset($subtasks))
                @foreach ($subtasks as $key => $subtask)
                  @include('layouts.components.task.location', ['counter' => $key])
                @endforeach
              @endif
            </div>
            
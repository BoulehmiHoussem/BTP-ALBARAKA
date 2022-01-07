@extends('layouts.app')

@section('css')
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description , 'action' => route('products.create')])

    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <input class="form-control" placeholder='rechercher' id="search">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Produit
                          </th>
                          <th>
                            Référance
                          </th>
                          <th>
                            Prix
                          </th>
                          <th>
                            Fournisseur
                          </th>
                          <th>
                            Quanité
                          </th>
                          <th >
                            Actions
                          </th>
                        </tr>
                        
                      </thead>
                      <tbody id="tbody">
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
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      {{$products->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
@endsection
            

@section('js')

@endsection
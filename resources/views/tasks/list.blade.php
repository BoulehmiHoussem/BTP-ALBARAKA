@extends('layouts.app')

@section('css')
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description , 'action' => route('tasks.create')])

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">$description</h4>
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nom
                          </th>
                          <th style="text-align: right">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                          <td>
                            {{ $task->id }}
                          </td>
                          <td>
                            {{ $task->name }}
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('tasks.edit', ["id" => $task->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection
            

@section('js')

@endsection
                    @foreach ($employees as $employee)
                        <tr>
                          <td>
                            {{ $employee->id }}
                          </td>
                          <td>
                            {{ $employee->nom }}
                          </td>
                          <td>
                            {{ $employee->cin }}
                          </td>
                          <td>
                            {{ $employee->telphone}}
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('employee.edit', ["id" => $employee->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                        </tr>
                        @endforeach

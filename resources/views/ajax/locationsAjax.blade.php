@foreach ($locations as $location)
                        <tr>
                          <td>
                            {{ $location->id }}
                          </td>
                          <td>
                          {{ $location->name }}
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('locations.edit', ["id" => $location->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                        </tr>
                        @endforeach
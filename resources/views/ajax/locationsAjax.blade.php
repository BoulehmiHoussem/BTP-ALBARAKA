@foreach ($locations as $location)
                        <tr>
                          <td>
                            {{ $location->id }}
                          </td>
                          <td>
                          {{ $location->name }}
                          </td>
                        </tr>
                        @endforeach
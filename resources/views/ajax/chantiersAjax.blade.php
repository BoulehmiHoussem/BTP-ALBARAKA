                      @foreach ($chantiers as $chantier)
                        <tr>
                          <td>
                            {{ $chantier->id }}
                          </td>
                          <td>
                            {{ $chantier->nom }}
                          </td>
                          <td>
                            {{ $chantier->adresse }}
                          </td>
                          <td>
                            {{ $chantier->chef->name}}
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('chantiers.edit', ["id" => $chantier->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                        </tr>
                        @endforeach
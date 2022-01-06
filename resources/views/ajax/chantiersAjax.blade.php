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
                            {{ $chantier->chef_id}}
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                        @endforeach
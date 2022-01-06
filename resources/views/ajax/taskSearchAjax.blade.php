                @if(sizeof($tasks) != 0)
                    @foreach($tasks as $task)
                        <tr onclick="alert('eee')">
                          <td style="    font-size: 15px;padding: 0.25rem 0.9375rem; cursor: pointer">
                            <div class="badge badge-primary btn-rounded btn-icon" style="margin-right:20px;">
                                {{ $task->id }}
                            </div> {{ $task->name }}
                          </td>
                         
                        </tr>
                    @endforeach
                @else
                        <tr>
                          <td style="    font-size: 15px;padding: 0.25rem 0.9375rem; cursor: pointer">
                            <div class="badge badge-danger btn-rounded btn-icon" style="margin-right:20px;">
                                <i class="mdi mdi-close-octagon"> </i>
                            </div> Aucune donnée
                          </td>
                         
                        </tr>
                @endif
                      
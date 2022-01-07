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
                          <td>

                          </td>
                        </tr>
                        @endforeach

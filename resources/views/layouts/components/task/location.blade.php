 <!-- Modal -->
 <div class="modal fade" id="locationmodal-{{ $counter }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('layouts.components.toast.alert')
      @include('layouts.components.toast.success')
      <div class="col-lg-12 grid-margin stretch-card">
             
                  <div class="table-responsive">
                     
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Locations
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="text" class="form-control" id="location-{{ $counter }}">
                            </th>
                            <th>
                            <button type="button" class="btn btn-success btn-rounded btn-icon" onclick="clickToGetLocation({{$counter}})" id="submitproduct">
                                <i class="mdi mdi-plus"></i>
                            </button>
                            </th>
                        </tr>
                      </thead>
                      <tbody id="tbodylocation-{{ $counter }}">
                        @if(isset($locations))
                          @foreach ($locations as $count => $location)
                            @foreach($location->locations as $key => $liveprod)
                              @include('ajax.locationSearchAjax' , ['location' => $liveprod , 'counter' => $key , 'from' => $locations[$count]->location_from , 'to' => $locations[$count]->location_to,  'selectable' => (isset($selectable) ? true : false)])
                            @endforeach
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
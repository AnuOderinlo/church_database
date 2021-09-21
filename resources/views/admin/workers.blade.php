<x-admin-master>
    
    @section('content')
     {{-- <div class="container-fluid"> --}}

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Workers</h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @php
                  $num = 0;
                @endphp
                @foreach ($users as $user)
                    @php
                        $num++;
                    @endphp
                    <tr>
                      <td>{{ $num }}</td>
                      <td>{{ Str::ucfirst($user->firstname)  }}</td>
                      <td>{{ Str::ucfirst($user->lastname)  }}</td>
                      <td>
                        {{-- {{ dd($user->departments->name) }} --}}
                        <ul>
                          @foreach ($user->departments as $dept)

                          <li>{{Str::ucfirst($dept->name) }}</li>
                          {{-- {{dd($dept->name) }} --}}
                            
                          @endforeach
                        </ul>
                        
                      </td>
                      <td>
                        <form action="{{ route('worker.delete', $user) }}" method="post">
                            @csrf
                            @method("PUT")
                            {{-- <input type="hidden" name="id" value=""> --}}
                            {{-- <input type="hidden" name="worker" value="no"> --}}
                            
                            <button type="submit" title="delete" class="btn btn-sm  btn-danger"> <i class=" far fa-trash-alt"></i> Delete</button>
                        </form>
                      </td>
                      
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    {{-- </div> --}}
    @endsection

    @section('scripts') 
          <!-- Page level plugins -->
      <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

      <!-- Page level custom scripts -->
      <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection 
</x-admin-master>
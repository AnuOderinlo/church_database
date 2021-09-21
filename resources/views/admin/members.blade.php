<x-admin-master>
    
    @section('content')
     {{-- <div class="container-fluid"> --}}

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Members</h1>

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
                  <th>Email</th>
                  <th>Phone number</th>
                  <th>Worker</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Phone number</th>
                  <th>Worker</th>
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
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone_number }}</td>
                      <td>{{ Str::ucfirst($user->worker)  }}</td>
                      <td>
                          <a href="#" data-target="#deleteModal" data-toggle="modal" class="btn btn-sm  btn-danger"> <i class=" far fa-trash-alt"></i> Delete</a>
                      </td>
                      
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- User Delete Modal-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this member?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            {{-- <div class="modal-body"></div> --}}
            <div class="modal-footer">
              <button class="btn btn-secondary " type="button" data-dismiss="modal">No</button>
              <form action="{{ route('member.delete', $user->id) }}" method="post">
                @csrf
                @method("DELETE")
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button class="btn btn-danger" type="submit">Yes</button>
              </form>
            </div>
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
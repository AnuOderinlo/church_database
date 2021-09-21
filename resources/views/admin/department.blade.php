<x-admin-master>
    
    @section('content')
    <h1>Department page</h1>
    <div class="row">
            <div class="col-12">
                
            </div>
            <div class="col-md-4">
                <form action="{{ route('department.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Create Department</label>
                        <input type="text" name="department" class="form-control @error('department')
                            is-invalid
                        @enderror">
                        @error('department')
                           <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                
                    <button class="btn btn-primary btn-block"  type="submit">create</button>
                </form>
            </div>

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Name</th>
                                <th>No of Workers</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @php
                                 $sn=0;
                            @endphp
                            @foreach ($departments as $dept)
                                <tr>
                                    <td>
                                        {{ ++$sn }}
                                    </td>
                                    <td>
                                        <a href="">{{ Str::ucfirst($dept->name)  }}</a>
                                    </td>
                                    <td>
                                        {{$dept->users->count() }}
                                    </td>
                                    <td>
                                        <form action="{{ route('department.delete', $dept->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
  
    @endsection
</x-admin-master>
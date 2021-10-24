<x-admin-master>
    
    @section('content')
    <h1>Profile page  {{ $user->firstname }}</h1>

    <div class="">
        <div class="row">
            <div class="col-md-6">
                <form  action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <img class="img-profile rounded-circle " style="width: 3.5rem; height:3.5rem" src="{{ $user->user_image }}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="user_image" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="username">Firstname</label>
                        <input placeholder="Enter firstname" type="text" name="firstname" value="{{ $user->firstname }}" class="form-control @error('firstname') is-invalid @enderror" >
                        @error('firstname')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Lastname</label>
                        <input placeholder="Enter Lastname" type="text" value="{{ $user->lastname }}" name="lastname" class="form-control  @error('lastname') is-invalid @enderror">
                        @error('lastname')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                   

                    {{-- <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department_id" id="" class="form-control" >
                            @foreach ($departments as $dept)
                        
                                <option value="{{ $dept->id }}"  @if ($user->department_id === $dept->id)
                                    selected
                                @endif >{{ $dept->name }}</option>
                            @endforeach
                        
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input placeholder="Enter Password" type="password" name="password" class="form-control" id="password">

                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input placeholder="Enter Password" type="password"  name="password_confirmation" class="form-control" id="password">
                    </div>

                    <div class="form-group ">
                        <label class="">Are you a worker?</label>

                        {{-- <div class="col-md-6"> --}}
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="worker" @if ($user->worker == "yes")
                                        checked
                                    @endif value="yes">Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="worker" @if ($user->worker == "no")
                                        checked
                                    @endif value="no">No
                                </label>
                            </div>
                        {{-- </div> --}}
                    </div>

                    <div class="form-group">
                        <label for="address">Home address</label>
                        <textarea class="form-control  @error('address') is-invalid @enderror" name="address" id="address" rows="3">
                            {{ $user->address }}
                        </textarea>
                        @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
                @if ($user->worker == "yes")
                   <div class="mt-3">
                    <h3>Join a Department</h3>
                    <table class="table table-borderless table-sm w-50">
                        @foreach ($departments as $dept)
                            <tr>
                                <td>
                                    <input type="checkbox" name=""
                                    @foreach ($user->departments as $user_dept)
                                        @if ($user_dept->name === $dept->name)
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                    {{ $dept->name }}
                                </td>
                                <td>
                                    <form action="{{ route('department.join', $user) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="department" value="{{ $dept->id }}">
                                        <button type="submit" class="btn btn-primary" 
                                         @if ($user->departments->contains($dept))
                                                    disabled
                                                @endif
                                        >join</button>
                                    </form>
                                        
                                </td>
                                <td>
                                    <form action="{{ route('department.leave', $user) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="department" value="{{ $dept->id }}">
                                        <button type="submit" class="btn btn-danger" 
                                        @if (!$user->departments->contains($dept))
                                                    disabled
                                                @endif
                                        >Leave</button>
                                    </form>
                                </td>

                                
                            </tr>
                        @endforeach
                    </table>
                </div> 
                @endif
                
            </div>

            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img  class="img-profile img-thumbnail img-fluid h-100"  src="{{ auth()->user()->user_image }}" alt="profile image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ Auth::user()->lastname  }} {{ Auth::user()->firstname }}</h5>
                                <p><span>Phone number:</span> {{ Auth::user()->phone_number  }}</p>
                                <p><span>Email:</span> {{ Auth::user()->email  }}</p>
                                <p class="card-text"><span>Address:</span><br>  {{ Auth::user()->address  }}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>
    @endsection
</x-admin-master>
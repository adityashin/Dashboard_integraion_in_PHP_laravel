@extends('header')
@section('content')

 <!-- Bootstrap Dark Table -->
 <div class="container my-5">
 <div class="card">
                <h5 class="card-header">Table Team</h5>
                <div class="table-responsive text-nowrap my-3">
                  <table class="table table-dark my-3">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Role in Org.</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($team as $t)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$t->id}}</strong></td>
                        <td><img src="/images/team/{{$t->profile}}" height="100" width="100"></td>
                        <td>{{$t->name}}</td>
                        <td><span class="badge bg-label-primary me-1">{{$t->role}}</span></td>
                        <td>
                          <div class="">
                            <a href="{{route('team.edit',$t->id)}}" class="btn btn-primary text-light">Update</a>
                          </div>
                        </td>
                        <td>
                            <form method="post" action="{{route('team.destroy',$t->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" value="Delete">Delete</button>
</form>
                        </td>
                      </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
</div>
              <!--/ Boots
              trap Dark Table -->
@endsection
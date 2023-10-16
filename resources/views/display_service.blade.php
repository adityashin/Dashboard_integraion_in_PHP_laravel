@extends('header')
@section('content')

 <!-- Bootstrap Dark Table -->
 <div class="container my-5">
 <div class="card">
                <h5 class="card-header">Table Service</h5>
                <div class="table-responsive text-nowrap my-3">
                  <table class="table table-dark my-3">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($service as $p)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$p->id}}</strong></td>
                        <td><img src="/images/service/{{$p->logo}}" height="100" width="100"></td>
                        <td>{{$p->name}}</td>
                        <td><span class="">{{$p->description}}</span></td>
                        <td>
                          <div class="">
                            <a href="{{route('service.edit',$p->id)}}" class="btn btn-primary text-light">Update</a>
                          </div>
                        </td>
                        <td>
                            <form method="post" action="{{route('service.destroy',$p->id)}}">
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
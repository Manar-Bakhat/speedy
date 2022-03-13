@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-light text-dark border" >
      Dashboard
    </div>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>{{$dashCount['user']}}</h1>
                    <span>Users</span>
                </div>
                <div>
                    <span class="fas fa-users fa-4x"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>{{$dashCount['post']}}</h1>
                    <span>Services</span>
                </div>
                <div>
                    <span class="fas fa-building fa-4x"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>{{$dashCount['author']}}</h1>
                    <span>Jobbers</span>
                </div>
                <div>
                    <span class="fas fa-user-tie fa-4x"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1>{{$companyCategories->count()}}</h1>
                    <span>Categories</span>
                </div>
                <div>
                    <span class="fas fa-industry fa-4x"></span>
                </div>
            </div>





        </div>
    </main>

      <section class="dashboard-authors my-5">
        <div class="row my-4">
          <div class="col-lg-12 col-md-8 col-sm-12">
            <h4 class="card-title text-secondary">Manage Jobbers </h4>
            <div class="table-respons">
                <table class="table table-striped table-hover">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Jobber name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentAuthors as $author)
                        @if ($author->company)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{$author->name}}</td>
                            <td>{{$author->email}}</td>
                            <td>{{$author->company->title}}</td>
                            <td>
                            <a href="{{route('account.employer',['employer'=>$author->company])}}" class="btn primary-btnn">View Jobber</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn primary-outline-btn disabled">Total Number of Jobber registered ({{ $recentAuthors->total()}}) </button>

            <div class="d-flex justify-content-center mt-4 custom-pagination">
                {{ $recentAuthors->links() }}
              </div>
          </div>
        </div>
      <!--/row-->
      </section>
      <hr>

      <section class="dashboard-company">
          <h4 class="card-title text-secondaryy">Manage Roles and Categories</h4>
          <div class="row my-4">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#categories-tab" role="tab" data-toggle="tab">Company Category of service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roles-tab" role="tab" data-toggle="tab">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#permissions-tab" role="tab" data-toggle="tab">Permissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#role-have-permission-tab" role="tab" data-toggle="tab">Roles have permissions</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane active" id="categories-tab">
                        <div class="mb-3">
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <label for="">Add a new Category</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" placeholder="Company category name" name="category_name">
                                    <button class="btn secondary-btn">Add</button>
                                </div>
                                @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </form>
                        </div>

                        <div class="table-responsivee">
                            <table class="table table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Category name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companyCategories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td><a class="btn secondary-btn" href="{{route('category.edit',['category'=>$category])}}">Edit</a>
                                            <form action="{{route('category.destroy',['id'=>$category->id])}}" id="categoryDestroyForm" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button id="categoryDestroyBtn" class="btn danger-btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="roles-tab">
                        <div class="table-responsive">
                            <table class="tablee table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $index=>$role)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$role}}</td>
                                            <td><a class="btn secondary-btn" href="">Edit</a> <form action="" class="d-inline"><button type="submit" class="btn danger-btn">Delete</button></form></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="permissions-tab">
                        <div class="table-responsive">
                            <table class="tablee table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $index=>$permission)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$permission}}</td>
                                            <td><a class="btn secondary-btn" href="">Edit</a>
                                            <form action="" class="d-inline"><button type="submit" class="btn danger-btn">Delete</button></form></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="role-have-permission-tab">
                        <div class="table-responsive">
                            <table class="tablee table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rolesHavePermissions as $index=>$role)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>
                                                {{$role->name}}
                                            </td>
                                            <td>
                                                @if($role->permissions->count() == 0)
                                                    <span class="badge badge-primary">basic auth permissions</span>
                                                @else
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge badge-primary">{{$permission->name}}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
          </div>
      </section>
    </div>
  </div>
@endSection

@push('js')
<script>
     $(document).ready(function(){
        //delete category
        $('#categoryDestroyBtn').click(function(e){
            e.preventDefault();
            if(window.confirm('Are you sure you want delete the Category?')){
                $('#categoryDestroyForm').submit();
            }
        })
    })
</script>
@endpush

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Users</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          Show
          <a class="nav-link dropdown-toggle d-inline" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $users->perPage() }} 
            </a>
          items
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.users.index', ['perPage' => 5, 'word' => request('word') ?? '']) }}">5</a>
          <a class="dropdown-item" href="{{ route('admin.users.index', ['perPage' => 10, 'word' => request('word') ?? '']) }}">10</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('admin.users.index', ['perPage' => 20, 'word' => request('word') ?? '']) }}">20</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('admin.users.index') }}">
      <input class="form-control mr-sm-2" name="word" value="{{ request('word') ?? '' }}" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
@stop

@section('content')
  <table class="table table-hover">
    <caption>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}</caption>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name 
          @if (request()->has('sort') && request('sort') == 'desc-first_name')
            <a class="text-reset float-right" href="{{ route('admin.users.index', ['sort' => 'asc-first_name']) }}"><i class="fas fa-sort-amount-up-alt"></i></a>
          @else
            <a class="text-reset float-right" href="{{ route('admin.users.index', ['sort' => 'desc-first_name']) }}"><i class="fas fa-sort-amount-down-alt"></i></a>
          @endif
        </th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Created At 
          @if (request()->has('sort') && request('sort') == 'desc-created_at')
          <a class="text-reset float-right" href="{{ route('admin.users.index', ['sort' => 'asc-created_at']) }}"><i class="fas fa-sort-amount-up-alt"></i></a>
        @else
          <a class="text-reset float-right" href="{{ route('admin.users.index', ['sort' => 'desc-created_at']) }}"><i class="fas fa-sort-amount-down-alt"></i></a>
        @endif
        </th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                  <a class="text-reset" href="{{ route('admin.users.edit', ['user' => $user]) }}">
                    <span class="badge badge-success" title="Edit"><i class="fas fa-edit"></i></span>
                  </a>
                  <a class="text-reset" href="{{ route('admin.users.destroy', ['user' => $user]) }}">
                    <span class="badge badge-danger" title="Delete"><i class="fas fa-trash-alt"></i></span>
                  </a>
                  <a class="text-reset" href="{{ route('admin.users.show', ['user' => $user]) }}">
                    <span class="badge badge-primary" title="Show"><i class="fas fa-eye"></i></span>
                  </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{  $users->appends($_GET)->links()  }}
<hr>

<div>
  <canvas id="myChart"></canvas>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

  const data = {
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: @json($usersChart),
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
@stop
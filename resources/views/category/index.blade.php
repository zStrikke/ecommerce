@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ __('Name') }}</th>
      <th scope="col">{{ __('Description') }}</th>
      <th scope="col">{{ __('Actions') }}</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $cat)
      <tr>
        <th scope="row">{{ $cat->id }}</th>
        <td>{{ __($cat->name) }}</td>
        <td>{{ __($cat->short_desc) }}</td>
        <td>XXX</td>
      </tr>
    @empty
        <tr>
          <td colspan="4" style="text-align: center">{{ __('No categories yet') }}</td>
        </tr>
    @endforelse
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
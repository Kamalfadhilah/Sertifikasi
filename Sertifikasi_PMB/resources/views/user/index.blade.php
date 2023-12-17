@extends('layouts.layout')

@section('content')
  <section id="list">
    <div class="container">
      <h1>My Student List</h1>
      @if (count($students) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>ID Card Address</th>
                <th>Current Address</th>
                <th>District</th>
                <th>Regency</th>
                <th>Province</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Nationality Status</th>
                <th>Foreign Nationality</th>
                <th>Date Of Birth</th>
                <th>Birth Place</th>
                <th>Gender</th>
                <th>Marital Status</th>
                <th>Religion</th>
                <th>Registration Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $row)
                <tr>
                  <td>{{ $row->full_name }}</td>
                  <td>{{ $row->id_card_address }}</td>
                  <td>{{ $row->current_address }}</td>
                  <td>{{ $row->district }}</td>
                  <td>{{ $row->regency }}</td>
                  <td>{{ $row->province }}</td>
                  <td>{{ $row->phone_number }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->nationality_status }}</td>
                  <td>{{ $row->foreign_nationality }}</td>
                  <td>{{ $row->birth_date }}</td>
                  <td>{{ $row->birth_place }}</td>
                  <td>{{ $row->gender }}</td>
                  <td>{{ $row->marital_status }}</td>
                  <td>{{ $row->religion }}</td>
                  <td>{{ $row->registration_status }}</td>
                  <td>
                    <a href="{{ url('admin/students/' . $row->id) }}" class="btn btn-warning" style='border-radius: 100px; width:140px; height: 36px;'>Edit</a>
                    <form action='{{ route('admin.students.destroy', [$row->id]) }}' method='POST'>
                      @csrf
                      @method('DELETE')
                      <button type='submit' class='btn btn-danger' style='border-radius: 100px; width:140px; height: 36px;'>Delete</button>
                    </form>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p>No data in database.</p>
      @endif
    </div>
  </section>
@endsection

@if (session('success'))
  <script>
    alert(`{{ session('success') }}`)
  </script>
@endif

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">My tickets</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Title</th>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Level</th>
                                <th>status</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->tickets as $ticket)
                                    <tr>
                                        <td> <a href="{{ route('tickets.show', $ticket->uuid) }}">{{ $ticket->ref }}</a></td>
                                        <td> <a href="{{ route('tickets.show', $ticket->uuid) }}">{{ $ticket->title }}</a></td>
                                        <td>{{ $ticket->fullname }}</td>
                                        <td>{{ $ticket->email }}</td>
                                        <td>{{ $ticket->category }}</td>
                                        <td>{{ $ticket->level }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>{{ str_limit($ticket->description, 50) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@extends('layouts.app')

@section('custom_css')
<!-- Comment Styles -->
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card">
            <div class="card-header">Tickets #{{ $ticket->ref }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <th>REF</th>
                                    <td> {{ $ticket->ref }}</td>
                                </tr>   
                                <tr>
                                    <th>Title</th>
                                    <td> {{ $ticket->title }}</td>
                                </tr>   
                                <tr>
                                    <th>Fullname</th>
                                    <td> {{ $ticket->fullname }}</td>
                                </tr>   
                                <tr>
                                    <th>Email</th>
                                    <td> {{ $ticket->email }}</td>
                                </tr>   
                                <tr>
                                    <th>Category</th>
                                    <td> {{ $ticket->category }}</td>
                                </tr>   
                                <tr>
                                    <th>Level</th>
                                    @if($ticket->level === "Critical")
                                        <td>{{ $ticket->level }}</td>
                                    @else
                                        <td> {{ $ticket->level }}</td>
                                    @endif
                                </tr>   
                                <tr>
                                    <th>Status</th>
                                    <td> {{ $ticket->status }}</td>
                                </tr>   
                                <tr>
                                    <th>Description</th>
                                    <td> {{ $ticket->description }}</td>
                                </tr>   
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-warning">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">Comments</div>

                <div class="card-body">
                    @foreach($ticket->comments as $comment)
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>{{ $comment->user->name }}</b></a>
                                </div>
                                <h6 class="text-muted time">{{ $comment->created_at->diffForHumans() }}</h6>
                            </div>
                        </div> 
                        <div class="post-description"> 
                        <p>{{ $comment->body }}</p>
                            <div class="stats">
                                <a href="#" class="btn btn-warning stat-item">
                                    <i class="fa fa-edit icon"></i>
                                </a>
                                <a href="#" class="btn btn-danger stat-item">
                                    <i class="fa fa-trash-o icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

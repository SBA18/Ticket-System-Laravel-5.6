@extends('layouts.app')

@section('title', 'Open new ticket')


@section('content')

<div class="container" style="margin-top:20px;">

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Submit new ticket</h4>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptate dolorem earum voluptates a sint ea, soluta amet, fugiat voluptatem sed quisquam, quo distinctio dolore. Sequi nostrum neque quasi. Eius.</p>
        </div>
    </div>

<form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Ticket title" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Full name</label>
        <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}" required >
        </div>
        

        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" required >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Category</label>
            <select class="form-control" id="category" name="category" required>
            <option value="General">General</option>
            <option value="Hardware">Hardware</option>
            <option value="Software">Software</option>
            <option value="Feedback">Feedback</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect2">Level</label>
            <select class="form-control" id="level" name="level" required>
            <option value="Low">Low</option>
            <option value="Normal">Normal</option>
            <option value="Critical">Critical</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="submit" class="btn btn-default">Cancel</button>

    </form>
</div>

@endsection
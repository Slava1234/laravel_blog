@extends('main')

@section('title', 'Contacts')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact me</h1>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" name="email" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="Message">Message:</label>
                    <textarea name="Message" id="Message" class="form-control" placeholder="Your message here..."></textarea>
                </div>
                <input type="submit" value="Send message" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection

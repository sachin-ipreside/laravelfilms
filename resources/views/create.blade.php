@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">New Films
                    <a href="{{url('/')}}" class="btn btn-success pull-right">Show Films</a>
                </div>
                
                <div class="card-body">
                    <form method="POST" id="create_films">
                        @csrf

                        <div class="form-group row">
                            <label for="Films Name" class="col-md-4 col-form-label text-md-right">{{ __('Films Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Enter Films name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Realease Date" class="col-md-4 col-form-label text-md-right">{{ __('Realease Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="realease_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="rating" class="form-control" min="0" max="5" placeholder="Enter Rating">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Ticket Price" class="col-md-4 col-form-label text-md-right">{{ __('Ticket Price') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="ticket_price" class="form-control" placeholder="Enter Ticket Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="country" class="form-control" placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="genre" class="form-control" placeholder="Enter Genre" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Genre" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 text-md-right">
                                <input type="button" class="btn btn-success" id="create_films_submit" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Films</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row films-pad">
                        <div class="col-sm-12"><h2><a href="#">{{ ucwords($detail[0]->name) }}</a></h2></div>
                        <div class="col-sm-4"> 
                            <div><img src="{{ url($detail[0]->photo) }}"></div>
                        </div>
                        <div class="col-sm-8"> 
                            <p>Name : {{$detail[0]->name}}</p> 
                            <p>Realease Date : {{$detail[0]->realease_date}}</p> 
                            <p>Rating : {{$detail[0]->rating}}</p> 
                            <p>Ticket Price : {{$detail[0]->ticket_price}}</p>
                            <p>Country : {{$detail[0]->country}}</p> 
                            <p>Genre : {{$detail[0]->genre}}</p> 
                        </div> 
                        <div class="col-sm-12"><div class="description">{{$detail[0]->description}}</div></div> </div>
                </div>
                <hr/>

                <div class="card-body">
                    <h2>Post Comment</h2>
                    <form method="POST" id="create_comment">
                        @csrf
                        <input type="hidden" name="films_id" value="{{ $detail[0]->id }}">
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea name="comment" class="form-control" placeholder="Enter Comment"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 text-md-right">
                                @if(Auth::user())
                                <input type="button" class="btn btn-success" id="films_comment_submit" name="submit" value="Submit">
                                @else
                                <input type="button" class="btn btn-success" onclick="alert('Please login First!')" name="submit" value="Submit">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div id="comment-list">
                    @if(count($comment) > 0)

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Comments</h3>
                            </div>
                        </div>
                        @foreach($comment as $cmt)
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="thumbnail">
                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>{{ ucwords($cmt->name)}}</strong> 
                                    </div>
                                    <div class="panel-body">
                                        {{$cmt->comment}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

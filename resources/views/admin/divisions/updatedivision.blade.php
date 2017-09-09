@section ('dashboard')
    <h1></h1>
@endsection

@include('layouts.title', ['title'=>'Edit Division'])



@extends ('home')

@section ('content')
    {{--{!! dd($division); !!}--}}
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update New Division
                    <a href="{{route('divisions')}}">
                        <button type="submit" class="btn btn-default pull-right" id="addevent">
                            <i class="fa fa-backward" >  Back</i>
                        </button>
                    </a>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('updatedivision', urlencode($division->first()->name)) }}">
                        {{ csrf_field() }}
                        <input type="text" name="divisionid" hidden value="{{$division->first()->divisionid}}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="event" class="col-md-4 control-label">Division Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $division->first()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('agerange') ? ' has-error' : '' }}">
                            <label for="event" class="col-md-4 control-label">Age Range</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="agerange" value="{{ old('agerange', $division->first()->agerange) }}" >

                                @if ($errors->has('agerange'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agerange') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="event" class="col-md-4 control-label">Code</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code" value="{{ old('name', $division->first()->code) }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="event" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" required autofocus >{{ old('description', $division->first()->description) }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label class="col-md-4 control-label">Visible</label>
                                <div class="col-md-6">
                                    @if (!empty($division))
                                            <?php
                                            $status='';
                                            if ($division->first()->visible == 1) {
                                                $status = 'checked';
                                            }
                                        ?>
                                        <input type="checkbox" name="visible" {{$status}}>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                        Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

@endsection

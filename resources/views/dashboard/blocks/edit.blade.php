@extends('dashboard.layouts.app')
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.Cities')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.cities.index')}}">{{trans('dashboard.main.Cities')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.City.Edit City') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        @include('dashboard.partials._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  action="{{ route('dashboard.blocks.update', $block) }}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="name" class="form-control"
                                                            name="{{$key}}[name]"
                                                            value="{{ $block->translate($key)->name }}"/>
                                                    @include('dashboard.partials._errors', ['input' => 'name'])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="city_id">{{ trans('dashboard.Block.Add Block')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="city_id">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" @if($city->id == $block->city->id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('edit')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <script>
        $(document).ready(function () {

            $('#password, #password_confirmation').on('keyup', function () {
                if ($('#password').val() == $('#password_confirmation').val()) {
                    $('#message').html("{{trans('matching')}}").css('color', 'green');
                } else
                    $('#message').html("{{trans('not_matching')}}").css('color', 'red');
            });
        });
    </script>
@endsection

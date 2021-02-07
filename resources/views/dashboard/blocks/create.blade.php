@extends('dashboard.layouts.app')

@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.Blocks')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.blocks.index')}}">{{trans('dashboard.main.Blocks')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.Block.Add Block') }}</li>
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
                                  action="{{ route('dashboard.blocks.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="name" class="form-control"
                                                            placeholder="{{trans("dashboard.main.name")}}"
                                                            name="{{$key}}[name]" value="{{ old("$key.name") }}"/>
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
                                               for="city_id">{{ trans('dashboard.City.Block')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="city_id">
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.main.Create')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

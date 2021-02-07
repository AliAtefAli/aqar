@extends('dashboard.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.AdCategory.Edit Category')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.adCategories.index')}}">{{trans('dashboard.AdCategory.Categories')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.AdCategory.Edit Category') }}</li>
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
                                  action="{{ route('dashboard.features.update', $feature) }}"
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
                                                            placeholder="{{trans("dashboard.main.name")}}"
                                                            name="{{$key}}[name]"
                                                            value="{{ $feature->translate($key)->name }}"/>
                                                    @include('dashboard.partials._errors', ['input' => 'name'])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.description">{{ trans('dashboard.main.Description In ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.description" type="hidden"
                                                       name="{{$key}}[description]"
                                                       value="{{ $feature->translate($key)->description }}"/>
                                                <trix-editor input="{{$key}}.description"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'description'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="price">{{trans('dashboard.product.Price')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="float" id="price" class="form-control"
                                                   name="price"/>
                                            @include('dashboard.partials._errors', ['input' => 'price'])
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
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection

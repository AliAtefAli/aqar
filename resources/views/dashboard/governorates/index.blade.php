@extends('dashboard.layouts.app')
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.Governorates')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.Governorates')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        <div class="content-body">
            <!-- Description -->
            <section id="description" class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- HTML5 export buttons table -->
                        <section id="dom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a href="{{ route('dashboard.governorates.create') }}"
                                                           class="btn btn-success btn-sm mr-1"><i
                                                                class="ft-plus-circle"></i> {{trans('dashboard.main.Create')}}
                                                        </a>
                                                    </li>
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table class="table table-striped table-bordered dom-jQuery-events">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.AdCategory.Name')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($governorates as $governorate)
                                                        <tr>
                                                            <td>{{ $governorate->name }}</td>
                                                            <td>
                                                                <a href="">
                                                                    <a href="{{ route('dashboard.governorates.edit', $governorate) }}"
                                                                       class="btn btn-info btn-sm" title="">
                                                                        <i class="ft-edit"></i>
                                                                    </a>
                                                                </a>
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#delete-question-{{$governorate->id}}"
                                                                   class="btn btn-danger btn-sm" title="">
                                                                    <i class="ft-trash-2"></i>
                                                                </a>
                                                                <div class="modal fade  custom-imodal"
                                                                     id="delete-question-{{$governorate->id}}"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">{{ trans('dashboard.Governorate.Delete Governorate') }}</h5>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body custom-addpro">
                                                                                <div class="contact-page">
                                                                                    <form
                                                                                        action="{{ route('dashboard.governorates.destroy', $governorate) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <h2>  {{ trans('dashboard.Governorate.Do you want to delete this Governorate') }} </h2>

                                                                                        <div class="form-actions right">
                                                                                            <button type="submit"
                                                                                                    autofocus
                                                                                                    class="btn btn-danger">
                                                                                                {{trans('dashboard.main.delete')}}
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });
    </script>
@endsection

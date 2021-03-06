@extends('layouts.app', ['title' => __('Flight Schedules Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Flight Schedules') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('flight-schedule.create') }}" class="btn btn-sm btn-primary">{{ __('Add Schedule') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Tally Group') }}</th>
                                    <th scope="col">{{ __('Flight Number') }}</th>
                                    <th scope="col">{{ __('Origin') }}</th>
                                    <th scope="col">{{ __('Destination') }}</th>
                                    <th scope="col">{{ __('ETA') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($flight_schedules as $key => $value_no)
                                    <tr>
                                        <td>{{ $value_no->tail_no }}</td>
                                        <td>{{ $value_no->flight_no }}</td>
                                        <td>{{ $value_no->origin }}</td>
                                        <td>{{ $value_no->destination }}</td>
                                        <td>{{ $value_no->eta }}</td>
                                        <td>{{ $value_no->created_at }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('flight-schedule.destroy', $value_no) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <!-- <a class="dropdown-item" href="{{ route('flight-schedule.edit', $value_no) }}">{{ __('Edit') }}</a> -->
                                                        <button type="button" class="dropdown-item text-danger" onclick="confirm('{{ __("Are you sure you want to delete this Flight Schedule?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $flight_schedules->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection
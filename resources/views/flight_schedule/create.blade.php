@extends('layouts.app', ['title' => __('Flight Schedules Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Flight Schedule')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Flight Schedules Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('flight-schedule.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('flight-schedule.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Flight Schedule information') }}</h6>
                            <div class="pl-lg-4 mb-3">
                                <div class="form-group{{ $errors->has('flight_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-flight_number">{{ __('Flight Number') }}</label>
                                    <input type="number" name="flight_number" id="input-flight_number" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Flight Number') }}" value="{{ old('flight_number') }}" required autofocus>

                                    @if ($errors->has('flight_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('flight_number') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('tail_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tail_no">{{ __('Select Tail No') }}</label>
                                    <select name="tail_no" id="input-tail_no" class="form-control form-control-alternative{{ $errors->has('tail_no') ? ' is-invalid' : '' }}" required>
                                        <option disabled selected>{{ __('Select Option') }}</option>
                                        <option value="TS-ISA" @if (old('tail_no') == 'TS-ISA') selected @endif >{{ __('TS-ISA') }}</option>
                                        <option value="TS-ISB" @if (old('tail_no') == 'TS-ISB') selected @endif>{{ __('TS-ISB') }}</option>
                                        <option value="TS-ISC" @if (old('tail_no') == 'TS-ISC') selected @endif>{{ __('TS-ISc') }}</option>
                                    </select>
                                    @if ($errors->has('tail_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tail_no') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('origin') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-origin">{{ __('Select Origin') }}</label>
                                    <select name="origin" id="input-origin" class="form-control form-control-alternative{{ $errors->has('origin') ? ' is-invalid' : '' }}" required>
                                        <option disabled selected>{{ __('Select Option') }}</option>
                                        <option value="LOS" @if (old('origin') == 'LOS') selected @endif >{{ __('LOS') }}</option>
                                        <option value="ABJ" @if (old('origin') == 'ABJ') selected @endif>{{ __('ABJ') }}</option>
                                        <option value="PHC" @if (old('origin') == 'PHC') selected @endif>{{ __('PHC') }}</option>
                                        <option value="KAN" @if (old('origin') == 'KAN') selected @endif>{{ __('KAN') }}</option>
                                        <option value="KDU" @if (old('origin') == 'KDU') selected @endif>{{ __('KDU') }}</option>
                                        <option value="OWE" @if (old('origin') == 'OWE') selected @endif>{{ __('OWE') }}</option>
                                    </select>
                                    @if ($errors->has('origin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('origin') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('destination') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-destination">{{ __('Select Destination') }}</label>
                                    <select name="destination" id="input-destination" class="form-control form-control-alternative{{ $errors->has('destination') ? ' is-invalid' : '' }}" required>
                                        <option disabled selected>{{ __('Select Option') }}</option>
                                        <option value="LOS" @if (old('destination') == 'LOS') selected @endif >{{ __('LOS') }}</option>
                                        <option value="ABJ" @if (old('destination') == 'ABJ') selected @endif>{{ __('ABJ') }}</option>
                                        <option value="PHC" @if (old('destination') == 'PHC') selected @endif>{{ __('PHC') }}</option>
                                        <option value="KAN" @if (old('destination') == 'KAN') selected @endif>{{ __('KAN') }}</option>
                                        <option value="KDU" @if (old('destination') == 'KDU') selected @endif>{{ __('KDU') }}</option>
                                        <option value="OWE" @if (old('destination') == 'OWE') selected @endif>{{ __('OWE') }}</option>
                                    </select>
                                    @if ($errors->has('destination'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('destination') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h6 class="heading-small text-muted mb-4 mt-5">{{ __('Flight Time information') }}</h6>

                                <div class="form-group{{ $errors->has('eta') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-eta">{{ __('ETA') }}</label>
                                    <input type="text" name="eta" id="input-eta" class="form-control form-control-alternative{{ $errors->has('eta') ? ' is-invalid' : '' }}" placeholder="{{ __('ETA') }}" value="{{ old('eta') }}" required>

                                    @if ($errors->has('eta'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('eta') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('std') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-eta">{{ __('STD') }}</label>
                                    <input type="text" name="std" id="input-std" class="form-control form-control-alternative{{ $errors->has('std') ? ' is-invalid' : '' }}" placeholder="{{ __('STD') }}" value="{{ old('std') }}" required>

                                    @if ($errors->has('std'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('std') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('etd') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-eta">{{ __('ETD') }}</label>
                                    <input type="text" name="etd" id="input-etd" class="form-control form-control-alternative{{ $errors->has('etd') ? ' is-invalid' : '' }}" placeholder="{{ __('ETD') }}" value="{{ old('etd') }}">

                                    @if ($errors->has('etd'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('etd') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('atd') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-atd">{{ __('ATD') }}</label>
                                    <input type="text" name="atd" id="input-atd" class="form-control form-control-alternative{{ $errors->has('atd') ? ' is-invalid' : '' }}" placeholder="{{ __('ATD') }}" value="{{ old('atd') }}">

                                    @if ($errors->has('atd'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('atd') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('ata') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ata">{{ __('ATA') }}</label>
                                    <input type="text" name="ata" id="input-ata" class="form-control form-control-alternative{{ $errors->has('ata') ? ' is-invalid' : '' }}" placeholder="{{ __('ATA') }}" value="{{ old('ata') }}" autofocus>

                                    @if ($errors->has('ata'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ata') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
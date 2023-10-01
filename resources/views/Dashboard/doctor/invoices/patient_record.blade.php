@extends('Dashboard.layouts.master-doctor')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('doctor/Invoices.Patients') }}
                    </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('doctor/Invoices.Patient_record') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="vtimeline">
                        @foreach ($patient_records as $patient_record)
                            <div
                                class="timeline-wrapper {{ $loop->first ? '' : 'timeline-inverted' }} timeline-wrapper-primary">
                                <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <p> {{ trans('doctor/Invoices.Diagnosis_condition') }}</p>
                                        <h4> {{ $patient_record->diagnosislang }} </h4>
                                    </div>
                                    <div class="timeline-body">
                                        
                                    </div>
                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                        <i class="fas fa-user-md"></i>&nbsp;
                                        <span>{{ $patient_record->Doctor->namelang }}</span>
                                        <span class="mr-auto"><i
                                                class="fe fe-calendar text-muted mr-1"></i>{{ $patient_record->date }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection

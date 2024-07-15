@extends('dashboard.layouts.master')
@section('title', 'السحب')
@section('content')
{{-- @include('dashboard.balance.modals.add') --}}

    <div class="container-fluid">
        <div class="card bg-light shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">
                            السحب
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ url('home') }}">
                                        الرئيسيه
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    السحب
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12 text-start d-flex justify-content-md-start justify-content-center mt-3 mt-md-0">
                            <a data-bs-toggle="modal" data-bs-target="#addBalanceModal" id="btn-add-contact"
                                class="btn btn-primary d-flex align-items-center">
                                اضافة سحب
                            </a>
                        </div>
                        <div class="col-md-12">
                            @error('name')
                                <div class="alert alert-danger mx-3 text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('email')
                                <div class="alert alert-danger mx-3 text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('phone')
                                <div class="alert alert-danger mx-3 text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>
                                    ID
                                </th>
                                <th>
                                    UID المستخدم
                                </th>
                                <th>
                                    المبلغ المطلوب
                                </th>
                                <th>
                                    رصيد المستخدم
                                </th>
                                <th>
                                    الحاله
                                </th>
                                
                                <th></th>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @forelse($balance as $value)
                                    <tr>
                                        
                                        <td>
                                            {{$i}}
                                        </td>
                                        <td>
                                            {{$value->UID}}
                                        </td>
                                        <td>
                                            {{$value->amount}}
                                        </td>
                                        <td>
                                            {{$value->UID_balance}}
                                        </td>
                                        <td>
                                            <span class="badge bg-{{$value->status == 'complate' ? 'success' : 'danger'}}">{{$value->status}}</span>
                                        </td>
                                        <td>
                                            <div class="action-btn">
                                                <a style="cursor: pointer" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editBalanceModal_{{$value->ID}}">
                                                    <i class="ti ti-pencil-alt fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm delete ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    {{-- @include('dashboard.balance.modals.add', ['value' => $value]) --}}
                                @php($i++)
                                @empty
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                    لا يوجد
                                    </strong> 
                                    سحب حتى الآن
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

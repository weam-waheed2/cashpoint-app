@extends('dashboard.layouts.master')
@section('title', 'لوحة التحكم')
@section('content')

<div class="container-fluid">
    <div class="card bg-light shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">
                        لوحة التحكم
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{url('home')}}">
                                    الرئيسيه
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg col-sm-6">
            <div class="item">
                <div class="card">
                    <div class="text-bg-info p-4 rounded-3 rounded-bottom-0">
                        <div class="text-center text-white display-6">
                            <i class="ti ti-user"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3 class="fs-6">{{App\Models\User::where('type', '<>', 'admin')->count()}}</h3>
                                <h5 class="fs-4 fw-medium text-info mb-0">المستخدمين</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm-6">
            <div class="item">
                <div class="card">
                    <div class="text-bg-success p-4 rounded-3 rounded-bottom-0">
                        <div class="text-center text-white display-6">
                            <i class="ti ti-medall"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h3 class="fs-6">0</h3>
                                <h5 class="fs-4 fw-medium text-info mb-0">النقاط</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            
            <div class="card card-body">
                <div class="card-header mb-2">
                    <h5>
                        المستخدمين
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>
                                ID
                            </th>
                            <th>
                                الإسم
                            </th>
                            <th>
                                رقم الهاتف
                            </th>
                            <th>
                                النقاط
                            </th>
                            <th>
                                الرصيد
                            </th>
                            <th>
                                نوع العرض
                            </th>
                            <th>
                                تاريخ الاشتراك 
                            </th>
                            <th>
                                تاريخ الانتهاء 
                            </th>
                            <th>
                                الحاله
                            </th>
                            <th></th>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @forelse(App\Models\User::where('date','>=', Carbon\Carbon::now()->subDays(3))->take(10) as $value)
                                <tr>
                                
                                    <td>
                                        {{$i}}
                                    </td>
                                    <td>
                                        {{$value->name}}
                                    </td>
                                    <td>
                                        {{$value->phone}}
                                    </td>
                                    <td>
                                        {{$value->points}}
                                    </td>
                                    <td>
                                        {{$value->balance}}
                                    </td>
                                    <td>
                                        {{$value->type == 'free' ? 'مجاني' : 'مدفوع'}}
                                    </td>
                                    <td>
                                        {{$value->date_subscription}}
                                    </td>
                                    <td>
                                        {{$value->date_expiry}}
                                    </td>
                                    <td>
                                        <span class="badge bg-{{$user->status == 'active' ? 'success' : 'danger'}}">{{$user->status}}</span>
                                    </td>
                                    <td>
                                        <div class="action-btn">
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm edit">
                                                <i class="ti ti-pencil-alt fs-5"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete ms-2">
                                                <i class="ti ti-trash fs-5"></i>
                                            </a>
                                        </div>
                                    </td>
                                
                                </tr>
                            @php($i++)
                            @empty
                            <div class="alert alert-success" role="alert">
                                <strong>
                                لا يوجد
                                </strong> 
                                مستخدمين حتى الآن
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
@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
  {{-- alerts --}}
      @if (session()->has('success'))
          <div id="alertDiv" class="alert alert-success d-flex align-items-center" role="alert">
            <span class="alert-icon text-success me-2">
              <i class="ti ti-user ti-xs"></i>
            </span>
            {{session('success')}}
          </div>
      @endif

      @if (session()->has('error'))
          <div id="alertDiv" class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
              <i class="ti ti-user ti-xs"></i>
            </span>
            {{session('error')}}
          </div>
      @endif
  {{--  end of alerts --}}

<h4>Welcome {{auth()->user()->name}} to Bbox Express!😊 </h4>

@if (auth()->user()->role == 'Administrator')
<div class="row" >
    <div class="col-md">
        <div class="card mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-target text-danger display-6"></i>
                </h2>
                <h4>Deactivated</h4>
                <h5>{{$deactivated}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card drag-item mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-user text-info display-6"></i>
                </h2>
                <h4>Supplier</h4>
                <h5>{{$supplier}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card drag-item mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-user text-primary display-6"></i>
                </h2>
                <h4>Vendors</h4>
                <h5>{{$vendor}}</h5>
            </div>
        </div>
    </div>
</div>

<!-- information -->
@else
<div class="row mt-3">
    <div class="col-md">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" src="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/assets/img/elements/9.jpg" alt="Card image" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">
                the part of supply chain management that deals with the efficient forward and reverse flow of goods, services, and related information from the point of origin to the point of consumption according to the needs of customers.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">
                the overall process of managing how resources are acquired, stored, and transported to their final destination.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <img class="card-img card-img-right" src="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/assets/img/elements/12.jpg" alt="Card image" />
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
<script>
  const target = document.getElementById("alertDiv");
  window.onload = setInterval(() => target.style.opacity = '0', 3000)
</script>
@endsection
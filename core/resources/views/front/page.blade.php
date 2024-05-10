@extends('master.front')
@section('title')
  {{__('Page')}}
@endsection
@section('content')
<div class="page-title mb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="breadcrumbs">
          <li><a href="{{route('front.index')}}">{{__('Home')}}</a> </li>
          <li class="separator">&nbsp;</li>
          <li>{{$page->title}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="pt-5 pb-5">
  <div class="container cM-ContPageViewIn">
    <div class="row">
      <div class="col-lg-12 mb-4 mt-4">
        <div class="card">
          <div class="card-body px-4 py-5">
            <div class="d-page-content">
              <h4 class="d-block text-center cM-ContPageViewIn__c__cC__cTitle"><b>{{$page->title}}</b></h4>
              <div class="cM-ContPageViewIn__c__cC__cPage">
              {!! $page->details !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
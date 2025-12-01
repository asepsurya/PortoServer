@extends('layouts.app')
@section('title', 'Statistik')
@section('title', 'Dashboard')

@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-6">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
              <div>
                <p class="mb-1">Pengikut</p>
                <h4 class="mb-1">$5,345.43</h4>
                <p class="mb-0"><span class="me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
              </div>
              <span class="avatar me-sm-6">
                <span class="avatar-initial rounded"><i class="icon-base ti tabler-smart-home icon-28px text-heading"></i></span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none me-6">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
              <div>
                <p class="mb-1">Postingan</p>
                <h4 class="mb-1">$674,347.12</h4>
                <p class="mb-0"><span class="me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
              </div>
              <span class="avatar p-2 me-lg-6">
                <span class="avatar-initial rounded"><i class="icon-base ti tabler-device-laptop icon-28px text-heading"></i></span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none">
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
              <div>
                <p class="mb-1">Komentar</p>
                <h4 class="mb-1">$14,235.12</h4>
                <p class="mb-0">6k orders</p>
              </div>
              <span class="avatar p-2 me-sm-6">
                <span class="avatar-initial rounded"><i class="icon-base ti tabler-gift icon-28px text-heading"></i></span>
              </span>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <p class="mb-1">Jumlah Project</p>
                <h4 class="mb-1">$8,345.23</h4>
                <p class="mb-0"><span class="me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
              </div>
              <span class="avatar p-2">
                <span class="avatar-initial rounded"><i class="icon-base ti tabler-wallet icon-28px text-heading"></i></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
</div>
@endsection
